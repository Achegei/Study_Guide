<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Storage;

class PaymentRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'course' => 'required|string',
            'amount' => 'required|numeric',
            'reference_number' => 'required|string',
            'screenshot' => 'nullable|image|max:2048',
            'confirmation' => 'accepted',
        ]);

        if ($request->hasFile('screenshot')) {
            $data['screenshot'] = $request->file('screenshot')->store('screenshots', 'public');
        }

        PaymentRequest::create($data);

        return redirect()->back()->with('success', 'Your request has been submitted. We will contact you soon.');
    }
}
