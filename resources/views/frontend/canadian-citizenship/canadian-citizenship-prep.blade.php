@extends('layouts.guest')

@section('content')

    <!--
        This is a new Blade file dedicated to the Canadian Citizenship Test.
        It's designed to be a landing page with a professional and clean aesthetic,
        matching the style you requested.

        - A hero section welcomes the user with a strong headline and image.
        - A "What You'll Get" section lists key features.
        - Two prominent Call-to-Action buttons guide users to free questions or the full course.
        - The secure payment section is integrated at the bottom.
        - All styling is done using Tailwind CSS for a consistent and responsive design.
    -->

    <!-- 🌟 Hero Section -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="bg-white rounded-xl shadow-lg p-8 transform transition-all duration-300 hover:shadow-2xl">
                <img src="{{ asset('images/canadian-flag.png') }}" alt="Canadian flag" class="mx-auto h-24 mb-6">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Master Your Canadian Citizenship Test</h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Our comprehensive training program is your trusted companion on the journey to becoming a Canadian citizen. Get ready to ace your test with confidence!
                </p>
            </div>
        </div>
    </section>

    <!--
    ---
    -->

    <!-- ✨ Program Highlights and Features -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-right">
                    <img src="{{ asset('images/reading.png') }}" alt="Person studying on a laptop" class="rounded-xl shadow-2xl">
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6">What's Inside Our Training Program?</h2>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 text-2xl">✓</span>
                            <div>
                                <strong class="font-semibold text-lg">400+ Updated Questions:</strong>
                                Practice with a vast bank of multiple-choice and true/false questions that accurately reflect the official test.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 text-2xl">✓</span>
                            <div>
                                <strong class="font-semibold text-lg">In-Depth Study Guides:</strong>
                                Access text and audio guides for "Discover Canada," covering history, geography, government, and more.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 text-2xl">✓</span>
                            <div>
                                <strong class="font-semibold text-lg">Unlimited Practice Tests:</strong>
                                Take unlimited chapter and full-length simulation tests to perfect your knowledge and timing.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-3 text-2xl">✓</span>
                            <div>
                                <strong class="font-semibold text-lg">Mobile-Friendly Access:</strong>
                                Study on the go with a mobile-friendly platform that saves your progress across all devices.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--
    ---
    -->

    <!-- 🚀 Call-to-Action Buttons -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Ready to Pass Your Test?</h2>
            <div class="flex flex-col md:flex-row justify-center gap-6">
                <a href="#sample-questions" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 rounded-full shadow-lg transition-colors text-lg">
                    ✨ Get Free Prep Questions
                </a>
                <a href="#payment" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-8 rounded-full shadow-lg transition-colors text-lg">
                    💰 One-Time Payment for 400+ Questions
                </a>
            </div>
        </div>
    </section>

    <!--
    ---
    -->

    <!-- 💳 Secure Payment Section -->
    <section id="payment" class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center space-y-6">
            <h2 class="text-2xl font-bold text-gray-800">Secure Your Access Today</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Gain instant, unlimited access to our full program with a secure one-time payment.
            </p>
            <div class="bg-gray-100 p-8 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold mb-4 text-gray-700">$10 – Complete Online Training Program</h3>
                <h4 class="text-lg font-light text-gray-600">One-time Payment</h4>

                <!-- Interac Image -->
                <div class="flex justify-center my-6">
                    <img src="{{ asset('image/interac-logo.png') }}" alt="Interac e-Transfer" class="h-20 w-auto">
                </div>

                <!-- Payment Instructions -->
                <p class="text-gray-600 max-w-2xl mx-auto mb-6">
                    We support Interac e-Transfer payments for Canadian customers. Simply send payment to
                    <strong>pay@citizenshipsupport.ca</strong> and include your email address in the message.
                    Access details will be sent immediately.
                </p>

                <!-- Subscribe Button -->
                <a href="{{route('register.payment')}}" class="inline-block bg-black hover:bg-red-600 text-white px-8 py-3 rounded-full font-semibold shadow-md transition-colors text-lg">
                    Pay Now
                </a>
            </div>
        </div>
    </section>

@endsection
