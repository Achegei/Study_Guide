@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>

    <section class="py-12 sm:py-20">
        <div class="max-w-4xl mx-auto px-4">
            <header class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                    Get Started in Minutes
                </h1>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                    Choose your course or get the bundle for a discounted price.
                </p>
            </header>

            <div class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    
                    <div class="flex flex-col items-center p-6 border rounded-xl transition-transform transform hover:scale-105">
                        <h3 class="text-2xl font-bold text-gray-800">Citizenship Prep</h3>
                        <p class="mt-2 text-4xl font-extrabold text-blue-600">$30 CAD</p>
                        <p class="mt-2 text-2xl font-extrabold text-blue-400">(One Year, One-Time Payment)</p>
                        <ul class="mt-4 text-sm text-gray-600 list-disc list-inside text-left">
                            <li>5000+ Questions and answers( Each province, Territories and National/Common has 400+ Questions and answers).</li>
                            <li>Study Guide Summaries per Province</li>
                            <li>Audio Lessons</li>
                            <li>Login Credentials (1-2 hrs) after submitting Interac payment reference</li>
                        </ul>
                        <a href="{{route('register.payment')}}" class="mt-6 w-full bg-blue-600 text-white font-bold py-3 rounded-full hover:bg-blue-700 transition">
                            Buy Now
                        </a>
                    </div>
                    
                    <div class="flex flex-col items-center p-6 border rounded-xl transition-transform transform hover:scale-105">
                        <h3 class="text-2xl font-bold text-gray-800">Driving Prep</h3>
                        <p class="mt-2 text-4xl font-extrabold text-blue-600">$30 CAD</p>
                         <p class="mt-2 text-2xl font-extrabold text-blue-400">(One Year, One-Time Payment)</p>
                        <ul class="mt-4 text-sm text-gray-600 list-disc list-inside text-left">
                            <li>5000+ Questions and answers( Each province, Territories and National/Common has 400+ Questions and answers).</li>
                            <li>Road Sign Charts</li>
                            <li>Exam Simulator</li>
                            <li>Login Credentials (1-2 hrs) after submitting Interac payment reference</li>
                        </ul>
                        <a href="{{route('register.payment')}}" class="mt-6 w-full bg-blue-600 text-white font-bold py-3 rounded-full hover:bg-blue-700 transition">
                            Buy Now
                        </a>
                    </div>
                    
                    <div class="flex flex-col items-center p-6 border-4 border-red-500 rounded-xl transition-transform transform hover:scale-105 relative">
                        <span class="absolute top-0 right-0 -mt-4 -mr-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">Save 20%</span>
                        <h3 class="text-2xl font-bold text-gray-800">Citizenship Test prep and Driving Test prep</h3>
                        <p class="mt-2 text-4xl font-extrabold text-red-600">$50 CAD</p>
                        <p class="text-sm line-through text-gray-400 mt-1">$60 CAD value</p>
                        <ul class="mt-4 text-sm text-gray-600 list-disc list-inside text-left">
                            <li>All Citizenship Prep content</li>
                            <li>All Driving Prep content</li>
                            <li>Both courses in one purchase</li>
                            <li>Best Value!</li>
                            <li>Login Credentials (1-2 hrs) after submitting Interac payment reference</li>
                        </ul>
                        <a href="{{route('register.payment')}}" class="mt-6 w-full bg-red-600 text-white font-bold py-3 rounded-full hover:bg-red-700 transition">
                            Get the Bundle & Save
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-16 bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-200">
    <div class="flex justify-center mb-8">
        <img src="{{asset('/images/logo.png')}}" alt="IQRA Canada Test Prep Logo" class="h-20">
    </div>

    <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-6">
        Pass Your Citizenship. Pass Your Driving. Succeed in Canada.
    </h2>
    <div class="max-w-2xl mx-auto space-y-8">
        <div class="border-b border-gray-200 pb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                Payment Instructions – One-Time Yearly Access
            </h3>
            <p class="text-gray-600">
                We accept **ONLY** Canadian Interac e-Transfer for all payments.
                <br>
                <span class="text-sm text-gray-500 italic">(We do not accept bank cards, Visa, or credit card details.)</span>
            </p>
        </div>

        <div class="space-y-4">
            <h4 class="text-lg font-bold text-gray-800">Step 1 – Send Payment</h4>
            <ul class="list-disc list-inside space-y-2 text-gray-600">
                <li>
                    <strong>Amount:</strong>
                    <ul class="list-none pl-4 text-sm mt-1 space-y-1">
                        <li>- Canadian Citizenship Test – 30 CAD (One Year, One-Time Payment)</li>
                        <li>- Canadian Driving Test – 30 CAD (One Year, One-Time Payment)</li>
                        <li>- Access to Both (Citizenship + Driving Test) – 50 CAD (One Year, One-Time Payment)</li>
                    </ul>
                </li>
                <li>
                    <strong>Send to Email:</strong>
                    <code class="bg-gray-100 text-gray-800 px-2 py-1 rounded">payment@qracanadatestprep.ca</code>
                </li>
            </ul>
        </div>
        
        <div class="space-y-4">
            <h4 class="text-lg font-bold text-gray-800">Step 2 – Security Answer</h4>
            <ul class="list-disc list-inside space-y-2 text-gray-600">
                <li>Please set the Security Answer as: **IQRA** (ALL CAPITAL LETTERS).</li>
                <li><span class="text-sm italic">(Optional) You may also write IQRA in the message section of the e-Transfer page for faster processing.</span></li>
            </ul>
        </div>
        
        <div class="space-y-4">
            <h4 class="text-lg font-bold text-gray-800">Step 3 – Confirmation & Access</h4>
            <ul class="list-disc list-inside space-y-2 text-gray-600">
                <li>Once we receive your payment, you will receive your login details by email within one hour.</li>
                <li>
                    <strong>Login Details:</strong>
                    <ul class="list-none pl-4 text-sm mt-1 space-y-1">
                        <li>- Username: Your email address</li>
                        <li>- Temporary password: We will provide this (you can later change it to your preferred password).</li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="space-y-4 pt-6 border-t border-gray-200">
            <h4 class="text-lg font-bold text-gray-800">Important Notes</h4>
            <ul class="list-disc list-inside space-y-2 text-gray-600">
                <li>This is a **one-time yearly payment**.</li>
                <li>Access will remain active for **12 months** from the day you receive your login.</li>
                <li>Please make sure you use the same email for both your payment and login access.</li>
            </ul>
        </div>
    </div>
</div>
       
    </section>

@endsection