<!-- resources/views/frontend/courses.blade.php -->

<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Select a Region')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('courses.show', $section->id)); ?>" class="block">
                    <!-- Refined card design with better spacing and hover effect -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex items-center space-x-5 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <!-- Slightly larger, rounded flag icon for more impact -->
                        <div class="w-16 h-16 flex-shrink-0">
                            <img src="<?php echo e(asset($section->flag_path)); ?>" alt="Flag of <?php echo e($section->title); ?>" class="w-full h-full object-cover rounded-full border border-gray-200">
                        </div>
                        
                        <!-- Text content with clearer hierarchy -->
                        <div>
                            <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                <?php echo e($section->title); ?>

                            </h5>
                            <p class="text-sm text-gray-500 mt-1">
                                <?php echo e(ucfirst($section->type)); ?> - <?php echo e($section->capital); ?>

                            </p>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/resources/views/frontend/courses.blade.php ENDPATH**/ ?>