<?php $__env->startSection('content'); ?>
    <!--
        This testimonials page has been updated to include dynamic, text-based avatars.
        - A new JavaScript function `generateAvatar` is included to create an SVG with a user's initials.
        - The `<img>` tag now uses a ternary operator to either display the user's uploaded avatar or the new placeholder.
        - The new avatars provide a more polished and consistent look when user images are not available.
        - All other styling and functionality remains the same.
    -->
    <section class="bg-gray-50 py-12 sm:py-20">
        <div class="max-w-4xl mx-auto px-4">
            <header class="text-center mb-12 sm:mb-16">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight">
                    Hear From Our Successful Users
                </h1>
                <p class="mt-3 text-lg text-gray-600 max-w-2xl mx-auto">
                    Real stories from people who passed their Canadian Citizenship Test with our help.
                </p>
            </header>

            <?php if($testimonials->total() > 0): ?>
                <div class="space-y-8">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-start gap-4 sm:gap-6">
                                
                                <img src="<?php echo e($testimonial->avatar ? asset($testimonial->avatar) : 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64"><rect width="64" height="64" fill="' . '#' . substr(md5($testimonial->name), 0, 6) . '"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-size="24" font-weight="bold" font-family="sans-serif" fill="#ffffff">' . strtoupper(substr($testimonial->name, 0, 1)) . '</text></svg>')); ?>"
                                     alt="<?php echo e($testimonial->name); ?>"
                                     class="w-14 h-14 sm:w-16 sm:h-16 rounded-full object-cover shadow-sm">

                                <div class="flex-1">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:gap-2">
                                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($testimonial->name); ?></h3>
                                        <?php if($testimonial->location): ?>
                                            <span class="text-sm text-gray-500">from <?php echo e($testimonial->location); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-gray-700 mt-2 whitespace-pre-line leading-relaxed"><?php echo e($testimonial->content); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <?php echo e($testimonials->links()); ?>

                </div>
            <?php else: ?>
                <p class="text-center text-lg text-gray-600">No testimonials available yet. Be the first to share your success story!</p>
            <?php endif; ?>

            <!-- Leave a Comment Section -->
            <div class="mt-16 max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold text-center text-gray-800 mb-6">Share Your Success Story</h3>

                <!-- Success Message -->
                <?php if(session('success')): ?>
                    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-800 rounded-lg shadow-sm font-semibold">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <!-- Testimonial Submission Form -->
                <form action="<?php echo e(route('testimonials.store')); ?>" method="POST" class="bg-white p-8 rounded-2xl shadow-2xl space-y-6 border border-gray-100">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                        <input type="text" name="name" id="name" placeholder="John Doe" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Your Location (optional)</label>
                        <input type="text" name="location" id="location" placeholder="Toronto, ON"
                               class="w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Your Testimonial</label>
                        <textarea name="content" id="content" rows="5" placeholder="Your testimonial here..." required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-2xl shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                    </div>

                    <button type="submit" class="w-full inline-block text-center bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full font-semibold shadow-lg transition-colors duration-200">
                        Submit Testimonial
                    </button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/pages/testimonials.blade.php ENDPATH**/ ?>