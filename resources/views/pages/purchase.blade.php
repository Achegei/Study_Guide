@extends('layouts.guest')

@section('content')

    <!--
        This welcome page has been updated to remove the previous "Hero Section"
        and now starts with the "Popular Exams & Certifications" cards,
        giving the page a more direct and modern feel.
        - The three distinct cards for the main exam areas are now at the top.
        - The payment and "Why Us" sections follow below.
        - It continues to use Tailwind CSS for a responsive layout.
    -->

    <!-- 💡 Popular Exams & Certifications Cards -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">Popular Exams & Certifications</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1: Canadian Citizenship -->
                <a href="{{ route('canadian-citizenship-prep') }}" class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-4xl text-blue-600 mb-4">🇨🇦</div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Canadian Citizenship Test</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Prepare for the official test with updated questions and comprehensive study guides.
                    </p>
                </a>
                <!-- Card 2: Driving License -->
                <a href="#" class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-4xl text-green-600 mb-4">🚗</div>
                    <h3 class="text-xl font-bold text-green-800 mb-2">Driving license</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Master the rules of the road with province-specific practice tests and detailed explanations.
                    </p>
                </a>
                <!-- Card 3: Trade Exams -->
                <a href="#" class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="text-4xl text-red-600 mb-4">🛠️</div>
                    <h3 class="text-xl font-bold text-red-800 mb-2">Trade service Exams</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Prepare for your Red Seal and other trade certification exams with focused practice questions.
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- 💳 Payment Section -->
    <section id="payment" class="py-12 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4 text-center space-y-6">
            <h2 class="text-2xl font-bold">Pay Securely by Interac e-Transfer</h2>
            <h2 class="text-2xl font-bold">$10 – Complete Online Training Program</h2>
            <h2 class="text-2xl font-light">One-time Payment</h2>

            <!-- Interac Image -->
            <div class="flex justify-center">
                <img src="{{ asset('images/interac-logo.png') }}" alt="Interac e-Transfer" class="h-20 w-auto">
            </div>

            <!-- Payment Instructions -->
            <p class="text-gray-600 max-w-2xl mx-auto">
                We support Interac e-Transfer payments for Canadian customers. Simply send payment to
                <strong>pay@citizenshipsupport.ca</strong> and include your email address in the message.
                Access details will be sent immediately.
            </p>

            <!-- Subscribe Button -->
            <a href="{{route('register.payment')}}" class="inline-block bg-black hover:bg-red-600 text-white px-6 py-3 rounded-full font-semibold shadow transition">
                One Time Payment
            </a>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-6">Why is Our Training Service #1 in Canada?</h2>
            <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                <ul class="space-y-2 text-sm">
                    <li>Helps you pass your official test</li>
                    <li>Easy to use, modern interface</li>
                    <li>Accurate reflection of the official guide</li>
                    <li>Study guide timeline to memorize key dates</li>
                </ul>
                <ul class="space-y-2 text-sm">
                    <li>Over 350,000 successful users</li>
                    <li>We’ve taken the test ourselves!</li>
                    <li>Feedback-driven updates and improvements</li>
                    <li>Includes helpful tips and explanations</li>
                </ul>
            </div>
        </div>
    </section>

@endsection
