<?php $__env->startSection('content'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    <!--
        This welcome page has been completely redesigned to focus solely on the Canadian Citizenship Test.
        - The previous multi-exam card section has been removed entirely.
        - A new "Our Features" section now highlights the specific benefits of the citizenship test prep service.
        - The hero section's messaging is now more targeted.
        - The "Proven Success" and final CTA sections remain to build trust and guide the user.
    -->

    <!-- 🚀 Hero Section: Specific & Clear Value Proposition -->
    <section class="py-20 md:py-24 text-center bg-white rounded-b-3xl shadow-lg">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4 animate-fade-in">
                Pass Your Canadian Citizenship Test with Confidence
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto opacity-90 animate-fade-in-delay">
                Prepare with our expert-designed, up-to-date practice tests and comprehensive study guides, trusted by thousands of new Canadians.
            </p>
            <div class="mt-8">
                <a href="<?php echo e(route('canadian-citizenship-prep')); ?>" class="inline-block bg-blue-700 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    Start Your Prep Now
                </a>
            </div>
        </div>
    </section>

    <!-- 💡 Our Features Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Why Choose Our Training Service?</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform transition-all hover:scale-105 duration-300">
                    <div class="text-4xl text-blue-600 mb-4">📖</div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Comprehensive Study Guides</h3>
                    <p class="text-sm text-gray-600">
                        Get access to all the information you need, structured for easy learning and retention.
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform transition-all hover:scale-105 duration-300">
                    <div class="text-4xl text-green-600 mb-4">✅</div>
                    <h3 class="text-xl font-bold text-green-800 mb-2">Accurate Practice Tests</h3>
                    <p class="text-sm text-gray-600">
                        Our questions are updated to accurately reflect the official test and guide.
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform transition-all hover:scale-105 duration-300">
                    <div class="text-4xl text-red-600 mb-4">🏆</div>
                    <h3 class="text-xl font-bold text-red-800 mb-2">Proven Success</h3>
                    <p class="text-sm text-gray-600">
                        Join over 350,000 successful users who have passed their test with our help.
                    </p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transform transition-all hover:scale-105 duration-300">
                    <div class="text-4xl text-yellow-600 mb-4">⏱️</div>
                    <h3 class="text-xl font-bold text-yellow-800 mb-2">Flexible Learning</h3>
                    <p class="text-sm text-gray-600">
                        Study on your own schedule with 24/7 access to our online platform.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 🏆 Proven Success Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Trusted by Thousands of Canadians</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="space-y-2">
                    <div class="text-5xl font-bold text-blue-700">350k+</div>
                    <p class="text-sm font-semibold text-gray-700">Successful Users</p>
                </div>
                <div class="space-y-2">
                    <div class="text-5xl font-bold text-blue-700">98%</div>
                    <p class="text-sm font-semibold text-gray-700">Pass Rate</p>
                </div>
                <div class="space-y-2">
                    <div class="text-5xl font-bold text-blue-700">10+</div>
                    <p class="text-sm font-semibold text-gray-700">Years of Experience</p>
                </div>
                <div class="space-y-2">
                    <div class="text-5xl font-bold text-blue-700">24/7</div>
                    <p class="text-sm font-semibold text-gray-700">Access to Content</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 🚀 Final CTA -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Become a Canadian Citizen?</h2>
            <p class="text-lg text-gray-600 mb-8">
                Start your preparation today and take the first step towards your new life in Canada.
            </p>
            <a href="<?php echo e(route('canadian-citizenship-prep')); ?>" class="inline-block bg-blue-700 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                Begin Your Journey Now
            </a>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/pages/purchase.blade.php ENDPATH**/ ?>