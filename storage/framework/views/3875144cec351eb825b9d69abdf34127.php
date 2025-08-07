<?php $__env->startSection('content'); ?>
    <!--
        This redesigned page uses a modern, card-based layout with a clean aesthetic.
        - The verbose content has been condensed to focus on key benefits.
        - Two distinct, visually appealing cards represent the different test types.
        - Buttons are prominent and styled to match a professional, trustworthy brand.
        - The layout is fully responsive for mobile and desktop views.
    -->
    <section class="bg-gray-50 py-12 sm:py-20">
        <div class="max-w-6xl mx-auto px-4">
            <header class="text-center mb-12 sm:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                    Start Your Journey to Canadian Citizenship
                </h1>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                    Get a feel for the official test with our free practice exams. We've got you covered, whether you prefer to study chapter by chapter or jump right into a full simulation.
                </p>
            </header>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
                <!-- Card 1: Free Chapter Test -->
                <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-200 hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start mb-6">
                        <span class="text-4xl mr-4">📘</span>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Free Chapter Test</h2>
                            <p class="text-gray-500 text-sm">Targeted practice for focused study.</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Master the "Discover Canada" study guide one chapter at a time. This free test gives you 20 questions from Chapter One to help you memorize key facts and dates effectively.
                    </p>
                    <a href="#chapter-test" class="inline-block w-full text-center bg-black hover:bg-gray-800 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-colors duration-200">
                        Start Chapter Test
                    </a>
                </div>

                <!-- Card 2: Free Simulation Test -->
                <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-200 hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-1">
                    <div class="flex items-start mb-6">
                        <span class="text-4xl mr-4">⏳</span>
                        <div>
                            <h2 class="text-2xl font-bold text-blue-700">Free Simulation Test</h2>
                            <p class="text-gray-500 text-sm">Experience the real thing, timed.</p>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Our timed simulation tests replicate the official citizenship test format precisely. Try this free version to test your knowledge with questions drawn from all chapters of the study guide.
                    </p>
                    <a href="#simulation-test" class="inline-block w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-full font-semibold shadow-lg transition-colors duration-200">
                        Start Simulation
                    </a>
                </div>
            </div>

            <!-- Call to Action for Complete Program -->
            <div class="mt-16 text-center">
                <p class="text-lg text-gray-700 font-medium">
                    Ready for unlimited practice and full progress reports?
                </p>
                <a href="<?php echo e(route('purchase')); ?>" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-semibold underline text-lg transition-colors duration-200">
                    Explore Our Complete Online Training Program &rarr;
                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/resources/views/frontend/canadian-citizenship/free-test.blade.php ENDPATH**/ ?>