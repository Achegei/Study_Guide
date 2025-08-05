@extends('layouts.guest')

@section('content')
<!--Hero Section-->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 md:flex md:items-start md:gap-10">
        <!-- Left Side -->
        <div class="md:w-1/3 mb-10 md:mb-0 text-center bg-gradient-to-b from-red-50 via-white to-white rounded-lg shadow-lg p-6" data-aos="fade-right">
            <img src="{{ asset('image/application.png') }}" alt="Participant studying" class="mx-auto rounded-lg shadow mb-6">

            <div class="flex flex-col gap-4">
                <a href="#sample-questions" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-full transition text-sm">
                    🎯 Take Free Sample Questions
                </a>
                <a href="#testimonials" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-4 rounded-full transition text-sm">
                    🌟 Read Customer Testimonials
                </a>
                <a href="#simulation" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-full transition text-sm">
                    🧪 Take a Simulation Test for Free
                </a>
            </div>
        </div>

        <!-- Right Side -->
        <div class="md:w-2/3 grid md:grid-cols-2 gap-8">
            <!-- Program Features -->
            <div data-aos="fade-up">
                <h3 class="font-semibold text-xl mb-4 text-blue-600">Program Features</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li>✅ 600+ updated test questions</li>
                    <li>📩 1-year instant access after purchase</li>
                    <li>🔁 Unlimited Chapter & Simulation Tests</li>
                    <li>📱 Mobile-friendly and progress saving</li>
                    <li>🌍 AI translation in 63 languages</li>
                    <li>📖 Includes study guide text and audio</li>
                    <li>📊 Test history & performance review</li>
                </ul>
            </div>

            <!-- Why Choose Us -->
            <div data-aos="fade-up" data-aos-delay="150">
                <h3 class="font-semibold text-xl mb-4 text-green-600">Why Choose Us</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li>👥 Trusted by 350,000+ users since 2011</li>
                    <li>🇨🇦 100% Canadian owned and operated</li>
                    <li>💰 Money-back guarantee if you fail</li>
                    <li>🔒 Safe Stripe payment</li>
                    <li>🤝 Reliable customer service</li>
                </ul>
            </div>
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
            <img src="{{ asset('image/interac-logo.png') }}" alt="Interac e-Transfer" class="h-20 w-auto">
        </div>

        <!-- Payment Instructions -->
        <p class="text-gray-600 max-w-2xl mx-auto">
            We support Interac e-Transfer payments for Canadian customers. Simply send payment to 
            <strong>pay@citizenshipsupport.ca</strong> and include your email address in the message.
            Access details will be sent immediately.
        </p>

        <!-- Subscribe Button -->
        <a href="#manual-payment" class="inline-block bg-black hover:bg-red-600 text-white px-6 py-3 rounded-full font-semibold shadow transition">
            Subscribe Now
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
