<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CourseSection; // Import CourseSection model
use App\Models\DrivingSection; // Import DrivingSection model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Still needed for Auth::id() in logging etc.
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Google\Client;
use Google\Service\Sheets;
use Carbon\Carbon; // Import Carbon for date manipulation
use Illuminate\Support\Str; // Import Str for slugging

class PaymentRegisterController extends Controller
{
    /**
     * Show the custom payment registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $courseOptions = [
            'Canadian Citizenship Test Preparation' => 'Canadian Citizenship Test Prep',
            'Driving Test Preparation' => 'Driving Test Prep',
            'Both Citizenship and Driving Tests' => 'Citizenship Test Prep and Driving Test Prep',
        ];

        // Array of Canadian provinces and territories for the dropdown
        $provinces = [
            'Alberta',
            'British Columbia',
            'Manitoba',
            'New Brunswick',
            'Newfoundland and Labrador',
            'Nova Scotia',
            'Ontario',
            'Prince Edward Island',
            'Quebec',
            'Saskatchewan',
            'Northwest Territories',
            'Nunavut',
            'Yukon',
        ];

        return view('auth.register-payment', compact('courseOptions', 'provinces'));
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
            'phone_number' => ['nullable', 'string', 'max:20'],
            'course_selected' => ['required', 'string', 'in:Canadian Citizenship Test Preparation,Driving Test Preparation,Both Citizenship and Driving Tests'],
            'amount_sent' => ['required', 'numeric', 'min:0.01'],
            'interac_reference' => ['required', 'string', 'max:255'],
            'payment_screenshot' => ['nullable', 'image', 'max:2048'],
            'payment_confirmation' => ['accepted'],
            'registration_type' => ['required', 'string', 'in:citizenship,driving,both'],
            'province_of_choice' => ['required', 'string'],
        ], [
            'payment_confirmation.accepted' => 'You must confirm that you have sent the payment.',
            'province_of_choice.required' => 'Please select your Province/Territory of Choice.',
        ]);

        // Generate a random 8-character string and convert it to lowercase.
        $temporaryPassword = Str::upper(Str::random(4)); 
        $defaultRoleId = 2; // Default role for new users (e.g., 'regular user')

        $screenshotPath = null;
        if ($request->hasFile('payment_screenshot')) {
            $screenshotPath = $request->file('payment_screenshot')->store('payments', 'public');
        }

        // 2. Create the user in Laravel backend
        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($temporaryPassword), // Hash the temporary password
            'role_id' => $defaultRoleId,
            'must_change_password' => true, // Ensure this remains true to force password change
            'user_type' => $request->registration_type,
            'access_expires_at' => Carbon::now()->addYear(),
            'province_of_choice' => $request->province_of_choice, // Save province to user
        ]);

        // ✅ START ACCESS ASSIGNMENT LOGIC BASED ON REGISTRATION TYPE (unchanged)
        $chosenProvince = $request->province_of_choice;
        $registrationType = $request->registration_type;

        $nationalCitizenshipSection = CourseSection::where('title', 'Canada')->first();
        $territoriesCitizenshipSections = CourseSection::whereIn('title', ['Northwest Territories', 'Nunavut', 'Yukon'])->get();
        $chosenCitizenshipSection = CourseSection::where('title', $chosenProvince)->first();

        // SCENARIO 1: Citizenship Test Access Only OR Both Bundled
        if ($registrationType === 'citizenship' || $registrationType === 'both') {
            $citizenshipSectionsToAttach = collect();

            if ($chosenCitizenshipSection) {
                $citizenshipSectionsToAttach->push($chosenCitizenshipSection->id);
            } else {
                Log::warning("Citizenship section not found for chosen province: {$chosenProvince} for user {$user->email}.");
            }

            if ($nationalCitizenshipSection) {
                $citizenshipSectionsToAttach->push($nationalCitizenshipSection->id);
            } else {
                Log::warning("National/Country citizenship section not found for user {$user->email}. Please check its title in the database.");
            }

            if ($territoriesCitizenshipSections->isNotEmpty()) {
                foreach ($territoriesCitizenshipSections as $territorySection) {
                    $citizenshipSectionsToAttach->push($territorySection->id);
                }
            } else {
                Log::warning("Territories citizenship sections not found for user {$user->email}.");
            }

            if ($citizenshipSectionsToAttach->isNotEmpty()) {
                $user->citizenshipSections()->attach($citizenshipSectionsToAttach->unique()->all());
                Log::info("User {$user->email} granted citizenship access to sections: " . $citizenshipSectionsToAttach->unique()->implode(', '));
            } else {
                Log::warning("No citizenship sections found to attach for user {$user->email}.");
            }
        }

        // SCENARIO 2: Driving Test Access Only OR Both Bundled
        if ($registrationType === 'driving' || $registrationType === 'both') {
            $chosenDrivingSection = DrivingSection::where('title', $chosenProvince)->first();

            if ($chosenDrivingSection) {
                $user->drivingSections()->attach($chosenDrivingSection->id);
                Log::info("User {$user->email} granted driving access to section: " . $chosenDrivingSection->id);
            } else {
                Log::warning("Driving section not found for chosen province: {$chosenProvince} for user {$user->email}.");
            }
        }
        // ✅ END ACCESS ASSIGNMENT LOGIC

        // ✅ GOOGLE SHEETS API INTEGRATION START
        try {
            $client = new Client();
            $client->setAuthConfig(storage_path('app/google/google-service-account-key.json'));
            $client->setScopes([Sheets::SPREADSHEETS]);

            $service = new Sheets($client);

            $spreadsheetId = '1a1xXQ52pwrN-vetVV3tA6H6hVWcANmru9b_szxJZYBg';
            $range = 'Form Responses 1!A:Z';

            // Prepare the values to be appended as a new row, including the expiration date and the TEMPORARY PASSWORD
            $values = [
                [
                    now()->toDateTimeString(),
                    $request->full_name,
                    $request->email,
                    $request->phone_number,
                    $request->course_selected,
                    $request->amount_sent,
                    $request->interac_reference,
                    $screenshotPath ? asset('storage/' . $screenshotPath) : 'N/A',
                    $request->payment_confirmation ? 'Confirmed' : 'Not Confirmed',
                    $request->registration_type,
                    $user->access_expires_at ? $user->access_expires_at->toDateTimeString() : 'N/A',
                    $user->province_of_choice,
                    $temporaryPassword, // TEMPORARY PASSWORD ADDED TO GOOGLE SHEET
                ]
            ];

            $body = new Sheets\ValueRange([
                'values' => $values
            ]);

            $params = [
                'valueInputOption' => 'RAW'
            ];

            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

            Log::info('Data successfully appended to Google Sheet for user: ' . $user->email);
            Log::info('Google Sheets API response: ' . json_encode($result->toSimpleObject()));

        } catch (\Google\Exception $e) {
            Log::error('Google Sheets API error for user: ' . $user->email . ' - ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('General error during Google Sheets API call for user: ' . $e->getMessage());
        }
        // ✅ GOOGLE SHEETS API INTEGRATION END

        // Removed: Email sending logic, as it's handled by your Google workflow.

        // --- 4. IMPORTANT CHANGE: DO NOT LOG THE USER IN HERE ---
        // Auth::login($user); // <-- REMOVED THIS LINE

        // 5. Redirect the user to the LOGIN page
        return redirect()->route('login')->with('status', 'Your account has been created successfully! Please log in using your email and the temporary password (which will be sent to your email within 1 hr) to set your new password.');
    }
}
