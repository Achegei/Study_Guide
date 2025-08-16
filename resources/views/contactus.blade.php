@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
           
            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                <h2>✅ Contact Us</h2>
                <p>If you have any questions about payments, access, or technical support, please contact us:</p>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:support@IQRACANADATESTPREP.CA">support@iqracanadatestprep.ca</a></li>
                </ul>
                <p class="mt-4 text-gray-600">We respond to all inquiries within one hour.</p>
            </div>
        </div>
    </div>
@endsection