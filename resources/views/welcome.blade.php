@extends('layouts.guest')

@section('content')

<!-- ⭐ Top Message -->
<div class="bg-red-50 py-4 text-center">
    <p class="text-lg font-semibold text-red-700">
        We have helped over 350,000 people pass their Canadian Citizenship Test
    </p>
</div>

<!-- 🧠 Hero Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <!-- Left: Info -->
        <div class="space-y-6" data-aos="fade-right">
            <h1 class="text-3xl md:text-4xl font-extrabold text-red-700">CANADIAN CITIZENSHIP TEST</h1>
            <h2 class="text-xl font-semibold text-gray-700">Complete Online Training Program – Updated 2025</h2>
            <p class="text-lg text-gray-800">🇨🇦 CAD $10 – Online Practice Tests 2025 – Pass your Canadian Citizenship Test</p>
            <ul class="list-disc list-inside text-gray-700 text-base space-y-1">
                <li>✅ 400+ test questions based on the “Discover Canada” study guide</li>
                <li>🔁 Unlimited Chapter & Simulation Tests</li>
                <li>📱 Mobile-friendly, no app store needed</li>
                <li>📖 Includes study guide (text & audio)</li>
                <li>⏱ 1-year instant unlimited access</li>
                <li>💰 Money-back guarantee – pass or get your money back*</li>
            </ul>
            <a href="#payment" class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-full font-semibold shadow-lg transition inline-block">
                Learn More
            </a>
        </div>

        <!-- Right: Info Summary -->
        <div class="space-y-4 text-gray-800 text-base" data-aos="fade-left">
            <h3 class="text-lg font-bold text-center text-blue-700">Try our FREE Online Practice Tests</h3>
            <ul class="list-disc list-inside space-y-2">
                <li><a href="#chapter" class="text-blue-600 hover:underline">📘 Free Chapter Test</a></li>
                <li><a href="#simulation" class="text-blue-600 hover:underline">🧪 Free Simulation of the official test</a></li>
            </ul>
            <p>How will our training program help you?</p>
            <ul class="list-disc list-inside space-y-2">
                <li>All the essential, trusted tools you need to pass your test.</li>
                <li>Carefully and accurately designed to help you memorize the entire study guide information through focused chapter tests.</li>
                <li>Our simulation tests replicate the official format exactly. You will become fully familiar with how the real test looks and feels.</li>
                <li>You will become skilled at choosing the correct answer from a variety of similar responses, just like in the official test.</li>
                <li>Instant feedback and explanations keep you on track, so you study faster and pass with confidence.</li>
            </ul>
        </div>
    </div>
</section>

<!-- 💡 How it helps Section -->
<section class="py-16 bg-red-50" id="free-tests">
    <div class="max-w-6xl mx-auto px-4 space-y-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">How Will Our Training Program Help You?</h2>
        <p class="text-gray-600 max-w-3xl mx-auto">
            All the essential, trusted tools you need to pass your test. Carefully and accurately designed to help you memorize the entire study guide through focused chapter tests and simulation formats that exactly replicate the official test.
        </p>
        <div class="grid md:grid-cols-2 gap-6 text-left text-gray-700 text-sm">
            <ul class="space-y-2">
                <li>📖 Memorize key information chapter by chapter</li>
                <li>🧠 Learn to identify correct answers under pressure</li>
                <li>💬 Instant feedback and explanations</li>
            </ul>
            <ul class="space-y-2">
                <li>🎯 Get familiar with the real test format</li>
                <li>⚡ Study faster and smarter</li>
                <li>✅ Boost your confidence before test day</li>
            </ul>
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

        <!-- Secure Payment Information -->
        <div class="text-left text-gray-700 max-w-2xl mx-auto space-y-4 text-sm leading-relaxed">
            <h3 class="text-lg font-semibold text-center text-green-700">✅ Safe & Trusted Payments – Interac e-Transfer Only</h3>

            <p>
                Welcome to a secure, privacy-first learning platform. To protect your financial information and ensure complete transparency, we do not accept credit or debit cards on this website.
            </p>

            <p>
                Instead, we exclusively use <strong>Interac e-Transfer</strong> — a highly secure, trusted, and widely used payment method across Canada.
            </p>

            <hr class="my-2 border-gray-300">

            <h4 class="font-semibold text-gray-800">🔒 Why We Only Accept Interac e-Transfer</h4>
            <ul class="list-disc list-inside space-y-1">
                <li>No Card Required: Your credit or debit card details are never requested, collected, or stored.</li>
                <li>One-Time Payment: No subscriptions. Just a simple one-time payment.</li>
                <li>Direct & Transparent: You send payment directly to our verified Interac email. We manually confirm your payment and grant access.</li>
            </ul>

            <h4 class="mt-4 font-semibold text-gray-800">📘 How It Works</h4>
            <ol class="list-decimal list-inside space-y-1">
                <li>Send your one-time payment via Interac e-Transfer to: <strong>pay@citizenshipsupport.ca</strong></li>
                <li>Include your email address in the message field.</li>
                <li>Once payment is confirmed, access will be sent immediately via email or WhatsApp.</li>
            </ol>
        </div>

        <!-- Subscribe Button -->
        <a href="{{ route('interac.purchase.submit') }}" class="inline-block bg-black hover:bg-red-600 text-white px-6 py-3 rounded-full font-semibold shadow transition">
            Subscribe Now
        </a>
    </div>
</section>




<!-- 🌟 Testimonials Section -->
<section class="py-20 bg-white" id="testimonials">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Customer Testimonials</h2>

        <!-- 💬 Leave a Comment -->
<div class="max-w-xl mx-auto mb-10">
    <h3 class="text-xl font-semibold text-center text-gray-800 mb-4">Leave a Comment ↓</h3>

    <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required class="w-full border px-4 py-2 rounded" />
        <input type="text" name="location" placeholder="Your Location (optional)" class="w-full border px-4 py-2 rounded" />
        <textarea name="content" rows="5" placeholder="Your Testimonial" required class="w-full border px-4 py-2 rounded"></textarea>

        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full font-semibold">
            Submit Testimonial
        </button>
    </form>

    @if(session('success'))
        <p class="text-green-600 mt-3 text-center font-medium">{{ session('success') }}</p>
    @endif
</div>


        <!-- Swiper Container -->
        <div class="swiper testimonial-swiper" data-aos="fade-up">
    <div class="swiper-wrapper">
        @foreach($testimonials as $testimonial)
            <div class="swiper-slide bg-gray-50 p-6 rounded-xl shadow text-center">
                <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="mx-auto rounded-full w-20 h-20 mb-4 object-cover">
                <p class="italic text-gray-600 max-w-md mx-auto">"{{ $testimonial->content }}"</p>
                <span class="mt-3 block font-semibold text-gray-800">{{ $testimonial->name }}</span>
            </div>
        @endforeach
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-center gap-4 mt-6">
        <button class="swiper-button-prev bg-gray-200 hover:bg-gray-300 p-2 rounded-full">
            <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button class="swiper-button-next bg-gray-200 hover:bg-gray-300 p-2 rounded-full">
            <svg class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
    


        <!-- Read More Link -->
        <div class="text-center mt-8">
            <a href="{{ route('testimonials') }}" class="text-red-600 hover:underline font-semibold">Read More Testimonials →</a>
        </div>
    </div>
</section>


<!-- 📘 Learning Resources Cards Section -->
<section class="py-16 bg-blue-50">
    <div class="max-w-7xl mx-auto px-4 text-center space-y-6">
        <h2 class="text-2xl font-bold text-gray-800">Canadian Citizenship Test Information</h2>
        <div class="grid md:grid-cols-3 gap-6 text-left">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-2 text-red-600">Discover Canada Guide</h3>
                <p class="text-sm text-gray-600">Get the full guide in both text and audio formats.</p>
                <a href="{{ route('blogs.index') }}" class="text-sm text-blue-600 mt-3 inline-block hover:underline">Learn More</a>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-2 text-red-600">Free Chapter Tests</h3>
                <p class="text-sm text-gray-600">Test your knowledge chapter by chapter.</p>
                <a href="#chapter" class="text-sm text-blue-600 mt-3 inline-block hover:underline">Start Testing</a>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold text-lg mb-2 text-red-600">Simulation Tests</h3>
                <p class="text-sm text-gray-600">Experience the format of the official test.</p>
                <a href="#simulation" class="text-sm text-blue-600 mt-3 inline-block hover:underline">Try Simulation</a>
            </div>
        </div>
    </div>
</section>


<!-- 💵 Money Back Guarantee -->
<section class="py-6 bg-green-50">
    <div class="max-w-3xl mx-auto px-4 flex flex-col md:flex-row items-center gap-6">
        <div class="md:w-1/2" data-aos="zoom-in">
            <img src="{{ asset('image/money-back.png') }}" alt="Money Back Guarantee" class="w-full max-w-xs mx-auto"> <!-- was max-w-sm -->
        </div>
        <div class="md:w-1/2 space-y-2 text-center md:text-left" data-aos="fade-left">
            <h3 class="text-xl font-bold text-green-700">Money Back Guarantee</h3>
            <p class="text-sm text-gray-700">If you don't pass your Canadian Citizenship Test, we’ll refund your money. Simple and transparent.*</p>
            <a href="#payment" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full font-semibold shadow transition text-sm">
                Learn More
            </a>
        </div>
    </div>
</section>




@endsection
