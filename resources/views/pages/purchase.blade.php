@extends('layouts.guest')

@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <section class="relative py-20 md:py-24 text-center text-white rounded-b-3xl shadow-lg overflow-hidden"
             style="background: linear-gradient(to right, #bdb5b5ff, #524e4eff);">
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ asset('images/canadian-citizenship.png') }}" 
                alt="Canadian citizenship books with a red maple leaf theme" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-4">
            <p class="text-lg md:text-xl font-light max-w-2xl mx-auto opacity-90 animate-fade-in-delay">
                Prepare with our expert-designed, up-to-date practice tests and comprehensive study guides, trusted by thousands of new Canadians.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
            <div class="mt-8 flex flex-wrap justify-center gap-8">
            <a href="{{route('buy-now')}}" class="inline-block bg-red-700 text-white hover:bg-red-800 px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                {{ __('Access Full Course') }}
            </a>
            <a href="{{route('free-quiz.show')}}" class="inline-block bg-blue-700 text-white hover:bg-blue-800 px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
            {{ __('Start With Free Test') }}
            </a>

</div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Why Our Course is The Best</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-blue-600 mb-4">✍️</div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">5,000+ Canadian Citizenship Test practice Questions and answers</h3>
                        <h3 class="text-xl font-bold text-blue-800 mb-2">4000+ Canadian Driving Test practice Questions and answers</h3>
                    <p class="text-sm text-gray-600">
                        Master the official guide with a massive bank of questions designed to prepare you for anything.
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-green-600 mb-4">📚</div>
                    <h3 class="text-xl font-bold text-green-800 mb-2">Updated Discover Guide's Summaries</h3>
                    <p class="text-sm text-gray-600">
                      updated Discover Canada book summaries and Guides specific to your province
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-red-600 mb-4">🎧</div>
                    <h3 class="text-xl font-bold text-red-800 mb-2">Audio Lessons</h3>
                    <p class="text-sm text-gray-600">
                        Study on the go with the best audio versions of the test questions.
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-yellow-600 mb-4">✅</div>
                    <h3 class="text-xl font-bold text-yellow-800 mb-2">Proven Pass Rate</h3>
                    <p class="text-sm text-gray-600">
                        Our method has helped over 350,000 + users successfully pass their test.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Real Success Stories</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-6 rounded-xl shadow-lg">
                    <p class="italic text-gray-700 mb-4">"The practice tests were exactly like the real thing! I felt so confident on test day. Highly recommend this service."</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/person1.jpg') }}" alt="User 1" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <span class="font-semibold text-gray-800">Amina R.</span>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-xl shadow-lg">
                    <p class="italic text-gray-700 mb-4">"The summaries were a lifesaver. I was able to study in a fraction of the time and still learn everything I needed."</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/person2.jpg') }}" alt="User 2" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <span class="font-semibold text-gray-800">David C.</span>
                    </div>
                </div>
                <div class="bg-gray-100 p-6 rounded-xl shadow-lg">
                    <p class="italic text-gray-700 mb-4">"I passed on my first try! I'm so grateful for this platform. It's the best investment for anyone serious about their test."</p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/person3.jpg') }}" alt="User 3" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <span class="font-semibold text-gray-800">Maria S.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Pass Your Test?</h2>
            <p class="text-lg text-gray-600 mb-8">
                Start your preparation today and join the thousands of Canadians who have passed their test with our help.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-8">
                <a href="{{route('buy-now')}}" class="inline-block bg-red-700 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    {{ __('Access Full Course') }}
                </a>
                <a href="{{route('free-quiz.show')}}" class="inline-block bg-blue-700 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    {{ __('Start With Free Test') }}
                </a>
            </div>
        </div>
    </section>

@endsection