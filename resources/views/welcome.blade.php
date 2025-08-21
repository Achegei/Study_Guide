@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <section class="relative text-white py-20 md:py-32 rounded-b-3xl shadow-xl overflow-hidden"
             style="background: linear-gradient(to right, #e53e3e, #fbd38d);">
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ asset('images/canadian-citizenship.png') }}" 
                alt="Canadian landscape" 
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-900 opacity-70"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4">
                Pass Your Citizenship. Pass Your Driving. Succeed in Canada.
            </h1>
            <p class="text-xl sm:text-2xl font-light mb-8 max-w-3xl mx-auto opacity-90">
                Up-to-date questions, study guides, and practice exams for newcomers and drivers across Canada.
            </p>
            <p class="text-xl sm:text-2xl font-light mb-8 max-w-3xl mx-auto opacity-90">
                Below get citizenship test preparation and driving test preparation tailored specifically for your province.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="{{route('purchase')}}" class="inline-block bg-white text-red-800 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300">
                    Start Canadian Citizenship Test Prep
                </a>
                <a href="{{route('free-test')}}" class="inline-block bg-blue-700 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:bg-blue-800 transform hover:scale-105 transition-all duration-300">
                    Start Canadian Driving Test Prep
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-12">Why Choose Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-blue-600 mb-4">📚</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Study Guides</h3>
                    <p class="text-sm text-gray-600">Covering every province & territory.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-green-600 mb-4">⏱</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Learn Anytime</h3>
                    <p class="text-sm text-gray-600">24/7 access on mobile, tablet, or desktop.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-yellow-600 mb-4">✅</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Trusted by Newcomers</h3>
                    <p class="text-sm text-gray-600">High pass rates & real success stories.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-100 rounded-xl shadow-lg p-8 text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="mx-auto h-24 w-auto object-contain mb-4">
                    <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-2">Canadian Citizenship Test Prep</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 text-left mx-auto max-w-xs">
                        <li>5000+ Questions & Answers</li>
                        <li>400+ Questions & Answers Per Province, territory and Common test</li>
                        <li>Province-specific summaries</li>
                        <li>Trusted by 350,000+ Test takers</li>
                        <li>Audio versions of the Questions available</li>
                    </ul>
                    <a href="{{route('buy-now')}}" class="inline-block bg-red-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Access Full Course</a>
                     <a href="{{route('free-quiz.show')}}" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Start With Free Test</a>
                </div>

                <div class="bg-gray-100 rounded-xl shadow-lg p-8 text-center">
                     <img src="{{ asset('images/car.png') }}" alt="{{ __('Car icon') }}" class="w-20 h-20 object-contain mx-auto mb-4">
                    <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-2">Canadian Driving Test Prep</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 text-left mx-auto max-w-xs">
                        <li>4000+ Questions & Answers</li>
                        <li>Provincial learner’s test practice (400 Questions per region)</li>
                        <li>Road sign charts & explanations</li>
                        <li>Trusted by 350,000+ Test takers</li>
                        <li>Simulated exam mode</li>
                    </ul>
                    <a href="{{route('buy-now')}}" class="inline-block bg-red-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Acces Full Driving Test Course</a>
                    <a href="{{route('free-driver-quiz.show')}}" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Start With Free Test</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-200 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Save when you get both courses – 20% off bundle price</h3>
            <a href="{{route('buy-now')}}" class="inline-block bg-red-600 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:bg-red-700 transition">Get Both & Save</a>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">Testimonials</h2>
            <div class="bg-gray-100 rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
                <p class="text-lg italic text-gray-700 mb-4">“I passed my citizenship test in 1 week thanks to this platform!”</p>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/amina.jpg') }}" alt="Amina M." class="w-12 h-12 rounded-full mr-4 object-cover">
                    <span class="font-semibold text-gray-800">– Amina M.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50 mt-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">How It Works</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-blue-600 mb-4">1.</div>
                    <h3 class="font-bold text-gray-800 mb-2">Choose your course</h3>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-green-600 mb-4">2.</div>
                    <h3 class="font-bold text-gray-800 mb-2">Pay securely via Interac e-Transfer or Cheque</h3>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-yellow-600 mb-4">3.</div>
                    <h3 class="font-bold text-gray-800 mb-2">Get instant email access</h3>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-red-600 mb-4">4.</div>
                    <h3 class="font-bold text-gray-800 mb-2">Study & pass with confidence</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
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
                ✅ Payment Instructions – One-Time Yearly Access
            </h3>
            <p class="text-gray-600">
                We accept payments by **Canadian Interac e-Transfer** or **cheque only**.
            </p>
            <div class="mt-4">
                <p class="text-gray-600">
                    Make cheques payable to: <span class="font-bold">IQRA Canada Test Prep</span>
                </p>
                <div class="mt-2 space-y-1">
                    <p class="text-gray-600 font-semibold">Mailing Address:</p>
                    <address class="text-gray-600 not-italic">
                        P.O. Box 661, Station Main<br>
                        Edmonton, Alberta<br>
                        T5J 2K8<br>
                        Canada
                    </address>
                </div>
            </div>
            <p class="mt-4 text-red-500 font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.309 1.09-.309 2.296 0 3.386A8.04 8.04 0 0012 21.75a8.04 8.04 0 009.303-3.374c.309-1.09.309-2.296 0-3.386-1.125-3.52-4.467-6.101-8.303-6.101S4.128 12.856 3.75 16.299zM12 15.75h.008v.008H12z" />
                </svg>
                We do not accept bank cards, Visa, or credit card payments.
            </p>
        </div>
        
        <div class="space-y-4">
            <h4 class="text-lg font-bold text-gray-800">Step 1 – Send Payment</h4>
            <ul class="list-disc list-inside space-y-2 text-gray-600">
                <li>
                    <strong>Amount:</strong>
                    <ul class="list-none pl-4 text-sm mt-1 space-y-1">
                        <li>- Canadian Citizenship Test – 25 CAD (One Year, One-Time Payment)</li>
                        <li>- Canadian Driving Test – 25 CAD (One Year, One-Time Payment)</li>
                        <li>- Access to Both (Citizenship + Driving Test) – 40 CAD (One Year, One-Time Payment)</li>
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
    </footer>
@endsection