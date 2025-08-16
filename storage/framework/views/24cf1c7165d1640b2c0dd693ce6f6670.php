<?php $__env->startSection('content'); ?>
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
                src="<?php echo e(asset('images/toronto-skyline.png')); ?>" 
                alt="Canadian landscape" 
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-900 opacity-70"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4">
                Pass Your Citizenship & Driving Tests – First Attempt
            </h1>
            <p class="text-xl sm:text-2xl font-light mb-8 max-w-3xl mx-auto opacity-90">
                Up-to-date questions, study guides, and practice exams for newcomers and drivers across Canada.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="<?php echo e(route('purchase')); ?>" class="inline-block bg-white text-red-800 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300">
                    Start Citizenship Prep
                </a>
                <a href="<?php echo e(route('free-test')); ?>" class="inline-block bg-white text-red-800 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 transform hover:scale-105 transition-all duration-300">
                    Start Driving Test Prep
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
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Trusted by Students</h3>
                    <p class="text-sm text-gray-600">High pass rates & real success stories.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-100 rounded-xl shadow-lg p-8 text-center">
                    <span class="text-6xl">🇨🇦</span>
                    <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-2">Citizenship Test Prep</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 text-left mx-auto max-w-xs">
                        <li>5000+ Questions & Answers</li>
                        <li>400+ Questions & Answers Per Province, territory and one general</li>
                        <li>Province-specific summaries</li>
                        <li>Trusted by 350,000+ Test takers</li>
                        <li>Audio versions of the Questions available</li>
                    </ul>
                    <a href="<?php echo e(route('buy-now')); ?>" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Access Full Course</a>
                     <a href="<?php echo e(route('free-quiz.show')); ?>" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Start With Free Test</a>
                </div>

                <div class="bg-gray-100 rounded-xl shadow-lg p-8 text-center">
                    <span class="text-6xl">🚗</span>
                    <h3 class="text-2xl font-bold text-gray-800 mt-4 mb-2">Driving Test Prep</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700 text-left mx-auto max-w-xs">
                        <li>4000+ Questions & Answers</li>
                        <li>Provincial learner’s test practice (400 Questions per region)</li>
                        <li>Road sign charts & explanations</li>
                        <li>Trusted by 350,000+ Test takers</li>
                        <li>Simulated exam mode</li>
                    </ul>
                    <a href="<?php echo e(route('buy-now')); ?>" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Acces Full Driving Test Course</a>
                    <a href="#" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-full mt-6 hover:bg-blue-700 transition">Start With Free Test</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-200 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Save when you get both courses – 20% off bundle price</h3>
            <a href="<?php echo e(route('buy-now')); ?>" class="inline-block bg-red-600 text-white font-bold px-8 py-4 rounded-full shadow-lg hover:bg-red-700 transition">Get Both & Save</a>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">Testimonials</h2>
            <div class="bg-gray-100 rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
                <p class="text-lg italic text-gray-700 mb-4">“I passed my citizenship test in 1 week thanks to this platform!”</p>
                <div class="flex items-center justify-center">
                    <img src="<?php echo e(asset('images/amina.jpg')); ?>" alt="Amina M." class="w-12 h-12 rounded-full mr-4 object-cover">
                    <span class="font-semibold text-gray-800">– Amina M.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-10">How It Works</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-blue-600 mb-4">1.</div>
                    <h3 class="font-bold text-gray-800 mb-2">Choose your course</h3>
                </div>
                <div class="flex flex-col items-center">
                    <div class="text-4xl text-green-600 mb-4">2.</div>
                    <h3 class="font-bold text-gray-800 mb-2">Pay securely via Interac e-Transfer or PayPal</h3>
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
        <div class="max-w-2xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Payment Instructions</h2>
            <p class="text-lg text-gray-700 mb-4">
                <strong>Interac e-Transfer:</strong> <a href="mailto:payments@YourSite.ca" class="text-blue-600 hover:underline">payments@YourSite.ca</a>
            </p>
            <p class="text-lg text-gray-700 mb-6">
                <strong>PayPal:</strong> <a href="https://paypal.me/YourLink" class="text-blue-600 hover:underline">paypal.me/YourLink</a>
            </p>
            <p class="text-sm italic text-gray-600">
                <strong>Note:</strong> Include your email & course choice in the payment note.
            </p>
        </div>
    </section>
    </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/welcome.blade.php ENDPATH**/ ?>