@extends('layouts.guest')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Course Payment & Access Request</h1>

    <p class="mb-4 text-gray-700">
        Thank you for your interest in our course! Please complete this form after sending your Interac e-Transfer payment. Once we confirm your payment, your course access will be delivered via email or WhatsApp.
    </p>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-800 rounded shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('interac.purchase.submit') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" id="name" required class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" required class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number (WhatsApp, optional)</label>
            <input type="text" name="phone" id="phone" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="course" class="block text-sm font-medium text-gray-700 mb-1">Course Selected</label>
            <select name="course" id="course" required class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Select Course --</option>
                <option value="Canadian Citizenship Test Preparation">Canadian Citizenship Test Preparation</option>
            </select>
        </div>

        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Amount Sent (CAD)</label>
            <input type="number" name="amount" id="amount" step="0.01" required class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="reference_number" class="block text-sm font-medium text-gray-700">Interac e-Transfer Reference Number</label>
            <input type="text" name="reference_number" id="reference_number" required class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label for="screenshot" class="block text-sm font-medium text-gray-700">Upload Screenshot of Payment (Optional)</label>
            <input type="file" name="screenshot" id="screenshot" class="mt-1 w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="flex items-start">
            <input type="checkbox" name="confirmation" id="confirmation" required class="mt-1 mr-2">
            <label for="confirmation" class="text-sm text-gray-700">
                I confirm I have sent payment via Interac e-Transfer to: <strong>youremail@example.com</strong>
            </label>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 mt-4">
            Submit Request
        </button>
    </form>
</div>
@endsection
