<!-- resources/views/frontend/courses.blade.php -->
<?php
    use App\Models\UserProgress;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    $userProgress = $user ? UserProgress::where('user_id', $user->id)->get()->keyBy('course_section_id') : collect();
?>

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
        <!-- This container centers the header content on the page -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Select a Region')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $progress = $userProgress->get($section->id);
                    $resumeLink = route('courses.show', ['id' => $section->id]);
                    $questionsCount = $section->questions()->count();

                    if ($progress) {
                        $questionsBefore = $section->questions()->where('id', '<=', $progress->last_question_id)->count();
                        $startPage = (int) ceil($questionsBefore / 10);
                        $resumeLink = route('courses.show', ['id' => $section->id, 'page' => $startPage]);
                    }
                ?>
                <div class="relative group">
                    <a href="<?php echo e($resumeLink); ?>" class="block">
                        <!-- Refined card design with better spacing and hover effect -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex items-center space-x-5 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                            <!-- Slightly larger, rounded flag icon for more impact -->
                            <div class="w-16 h-16 flex-shrink-0">
                                <img src="<?php echo e(asset($section->flag)); ?>" alt="Flag of <?php echo e($section->title); ?>" class="w-full h-full object-cover rounded-full border border-gray-200">
                            </div>
                            
                            <!-- Text content with clearer hierarchy -->
                            <div>
                                <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                    <?php echo e($section->title); ?>

                                </h5>
                                <p class="text-sm text-gray-500 mt-1">
                                    <?php echo e(ucfirst($section->type)); ?> - <?php echo e($section->capital); ?>

                                </p>
                                <?php if($progress && $progress->last_question_id < $questionsCount): ?>
                                    <span class="text-sm text-indigo-500 font-semibold mt-2 block"><?php echo e(__('Resume from Q')); ?> <?php echo e($questionsBefore + 1); ?></span>
                                <?php elseif($progress): ?>
                                     <span class="text-sm text-green-500 font-semibold mt-2 block"><?php echo e(__('Completed')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>

                    <?php if($progress): ?>
                        <form action="<?php echo e(route('courses.reset-progress', $section->id)); ?>" method="POST" class="absolute top-2 right-2">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-gray-500 hover:text-red-500 transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.597 13.403-1.414 1.414L12 13.414l-3.183 3.183-1.414-1.414L10.586 12 7.403 8.817l1.414-1.414L12 10.586l3.183-3.183 1.414 1.414L13.414 12l3.183 3.183z" />
                                </svg>
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
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
<?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/frontend/courses.blade.php ENDPATH**/ ?>