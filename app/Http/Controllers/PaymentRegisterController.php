<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http; // This is for Http client, not directly used for Google Sheets API in this version
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // For logging errors
use Illuminate\Validation\ValidationException; // For custom validation errors
use Google\Client; // Required for direct Google Sheets API interaction
use Google\Service\Sheets; // Required for direct Google Sheets API interaction

class PaymentRegisterController extends Controller
{
    /**
     * Show the custom payment registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // You can pass course options here if they come from DB
        $courseOptions = [
            'Canadian Citizenship Test Preparation' => 'Canadian Citizenship Test Preparation',
            'Driving Test Preparation' => 'Driving Test Preparation', // Add driving option for selection
            'Both Citizenship and Driving Tests' => 'Both Citizenship and Driving Tests', // Option for both
        ];
        return view('auth.register-payment', compact('courseOptions'));
    }

    /**
     * Handle a custom payment registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // 1. Validate incoming request data
        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['nullable', 'string', 'max:20'], // Optional phone number
            // Updated validation for course_selected to include new options
            'course_selected' => ['required', 'string', 'in:Canadian Citizenship Test Preparation,Driving Test Preparation,Both Citizenship and Driving Tests'],
            'amount_sent' => ['required', 'numeric', 'min:0.01'],
            'interac_reference' => ['required', 'string', 'max:255'],
            'payment_screenshot' => ['nullable', 'image', 'max:2048'], // Max 2MB image
            'payment_confirmation' => ['accepted'], // Checkbox must be checked
            // NEW: Validate the 'registration_type' received from the form
            // This is the direct mapping for the user's access type
            'registration_type' => ['required', 'string', 'in:citizenship,driving,both'], // <-- Introduced
        ], [
            'payment_confirmation.accepted' => 'You must confirm that you have sent the payment.',
        ]);

        // Define the common password and role_id
        $commonPassword = 'password'; // IMPORTANT: Set a strong, temporary default password
        $defaultRoleId = 2; // Default role for new users (e.g., 'regular user')

        // Handle screenshot upload (if provided)
        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            // Store in storage/app/public/payments and link via storage:link
            $screenshotPath = $request->file('payment_screenshot')->store('payments', 'public');
        }

        // 2. Create the user in Laravel backend
        $user = User::create([
            'name' => $request->full_name, // Use full_name for user's name
            'email' => $request->email,
            'password' => Hash::make($commonPassword),
            'role_id' => $defaultRoleId,
            'must_change_password' => true, // ✅ Flag for forced password change
            'user_type' => $request->registration_type, // <-- Introduced: Set user_type based on form input
        ]);

        // ✅ GOOGLE SHEETS API INTEGRATION START
        try {
            $client = new Client();
            // Path to your service account key file
            // Make sure google-service-account-key.json is in storage/app/google/
            $client->setAuthConfig(storage_path('app/google/google-service-account-key.json'));
            $client->setScopes([Sheets::SPREADSHEETS]); // Set the scope for Sheets API

            $service = new Sheets($client);

            // ✅ Confirmed Spreadsheet ID and Sheet Name from previous debugging
            $spreadsheetId = '1ZQr2ZO-pdb_Ric3s0Rx6acz6_6-1sU6CqxSmtyFAbYU';
            $range = 'Form Responses 1!A:Z'; // The exact sheet tab name from your Google Sheet

            // Prepare the values to be appended as a new row
            // The order here MUST match the column order in your Google Sheet:
            // Timestamp | Full Name | Email Address | Phone Number | Course Selected | Amount Sent (CAD) | Interac e-Transfer Reference Number | Upload Screenshot of Payment | I confirm I have sent payment... | User Type (NEW)
            $values = [
                [
                    now()->toDateTimeString(), // Timestamp
                    $request->full_name,
                    $request->email,
                    $request->phone_number,
                    $request->course_selected,
                    $request->amount_sent,
                    $request->interac_reference,
                    $screenshotPath ? asset('storage/' . $screenshotPath) : 'N/A', // Public URL of screenshot
                    $request->payment_confirmation ? 'Confirmed' : 'Not Confirmed', // Checkbox value
                    $request->registration_type, // <-- NEW: Include user type in Google Sheet
                ]
            ];

            $body = new Sheets\ValueRange([
                'values' => $values
            ]);

            $params = [
                'valueInputOption' => 'RAW' // RAW means Google won't try to parse values (e.g., numbers as dates)
            ];

            // Append the row to the spreadsheet
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

            Log::info('Data successfully appended to Google Sheet for user: ' . $user->email);
            Log::info('Google Sheets API response: ' . json_encode($result->toSimpleObject()));

        } catch (\Google\Exception $e) {
            Log::error('Google Sheets API error for user: ' . $user->email . ' - ' . $e->getMessage());
            // You might want to show a user-friendly error message or notify an admin
        } catch (\Exception $e) {
            Log::error('General error during Google Sheets API call for user: ' . $user->email . ' - ' . $e->getMessage());
        }
        // ✅ GOOGLE SHEETS API INTEGRATION END

        // 4. Log the user in
        Auth::login($user);

        // 5. Redirect the user to the password change form as per your existing flow.
        // The check.test.access middleware will then take over after the password change.
        return redirect()->route('password.change.form')->with('success', 'Registration and payment details submitted! Please change your password to continue.');
    }
}
