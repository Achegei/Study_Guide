<?php $__env->startSection('content'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>

    <section class="relative py-20 md:py-24 text-center rounded-b-3xl shadow-lg overflow-hidden"
               style="background: linear-gradient(to right, #f6f9faff, #edebebff);">
        <div class="absolute inset-0 z-0 bg-black/40">
            <img
                src="<?php echo e(asset('images/driving-hero.png')); ?>"
                alt="A steering wheel with road signs in the background"
                class="w-full h-full object-cover opacity-50"
            >
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-4">
            <!-- Changed text color to black for the heading -->
            <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fade-in text-white">
                Canadian Driving Knowledge Test Prep – All Provinces
            </h1>
            <!-- Changed text color to black for the paragraph -->
            <p class="text-lg md:text-xl font-light max-w-2xl mx-auto opacity-90 animate-fade-in-delay text-white">
                Prepare for your learner's permit with our province-specific practice tests, road sign charts, and realistic exam simulators.
            </p>
            <div class="mt-8">
                <div class="mt-8 flex flex-wrap justify-center gap-8">
                    <!-- These buttons already use text-gray-800, which is dark -->
                    <a href="<?php echo e(route('buy-now')); ?>" class="inline-block bg-red-700 text-white hover:bg-red-800 px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                        <?php echo e(__('Access Full Course')); ?>

                    </a>

                    <a href="<?php echo e(route('free-driver-quiz.show')); ?>" class="inline-block bg-blue-700 text-white hover:bg-blue-800 px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                        <?php echo e(__('Start With Free Test')); ?>

                    </a>

                </div>
            </div>
        </div>
    </section>


    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">What Our Program Includes</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-blue-600 mb-4">📍</div>
                    <h3 class="text-xl font-bold text-blue-800 mb-2">Province-Specific Questions</h3>
                    <p class="text-sm text-gray-600">
                        Practice questions tailored to the rules and regulations of your province or territory.
                    </p>
                </div>
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-green-600 mb-4">🚦</div>
                    <h3 class="text-xl font-bold text-green-800 mb-2">Road Sign Charts & Explanations</h3>
                    <p class="text-sm text-gray-600">
                        Easily learn and memorize all essential Canadian road signs with clear visuals and descriptions.
                    </p>
                </div>
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-red-600 mb-4">⏱️</div>
                    <h3 class="text-xl font-bold text-red-800 mb-2">Simulated Exam Mode</h3>
                    <p class="text-sm text-gray-600">
                        Experience the real test format and time limits before your official test day.
                    </p>
                </div>
                <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col items-center">
                    <div class="text-4xl text-yellow-600 mb-4">✅</div>
                    <h3 class="text-xl font-bold text-yellow-800 mb-2">Comprehensive Study Guide</h3>
                    <p class="text-sm text-gray-600">
                        Everything you need to know about the rules of the road and safe driving practices.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-10">Hear from Successful Drivers</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <p class="italic text-gray-700 mb-4">"I passed my G1 test in Ontario on my first attempt, all thanks to this app! The practice questions were spot on."</p>
                    <div class="flex items-center">
                        <img src="<?php echo e(asset('images/driver1.jpg')); ?>" alt="Alex P." class="w-12 h-12 rounded-full mr-4 object-cover">
                        <span class="font-semibold text-gray-800">Alex P.</span>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <p class="italic text-gray-700 mb-4">"I moved to Alberta and needed to study for the knowledge test. This platform was perfect, especially the road sign quiz!"</p>
                    <div class="flex items-center">
                        <img src="<?php echo e(asset('images/driver2.jpg')); ?>" alt="Sarah L." class="w-12 h-12 rounded-full mr-4 object-cover">
                        <span class="font-semibold text-gray-800">Sarah L.</span>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <p class="italic text-gray-700 mb-4">"The exam simulator felt just like the real thing. I finished my test with confidence and passed without any problems."</p>
                    <div class="flex items-center">
                        <img src="<?php echo e(asset('images/driver3.jpg')); ?>" alt="Mark D." class="w-12 h-12 rounded-full mr-4 object-cover">
                        <span class="font-semibold text-gray-800">Mark D.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Get Your License?</h2>
            <p class="text-lg text-gray-600 mb-8">
                Start your preparation today and take the first step towards getting your Canadian driver's license.
            </p>
           <div class="mt-8 flex flex-wrap justify-center gap-8">
                <a href="<?php echo e(route('buy-now')); ?>" class="inline-block bg-red-700 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    <?php echo e(__('Access Full Course')); ?>

                </a>
                <a href="<?php echo e(route('free-driver-quiz.show')); ?>" class="inline-block bg-blue-700 hover:bg-blue-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                    <?php echo e(__('Start With Free Test')); ?>

                </a>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/frontend/canadian-citizenship/free-test.blade.php ENDPATH**/ ?>