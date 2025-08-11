<!-- resources/views/frontend/driving-courses.blade.php -->
<?php
    // Use the new UserDrivingProgress model if you created one
    use App\Models\UserDrivingProgress;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    // Fetch user driving progress specific to driving sections
    $userDrivingProgress = $user ? UserDrivingProgress::where('user_id', $user->id)->get()->keyBy('driving_section_id') : collect();
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
                <?php echo e(__('Select a Driving Course Region')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                <?php
                    // Get progress from the new userDrivingProgress collection
                    $progress = $userDrivingProgress->get($section->id);
                    $questionsCount = $section->questions()->count();
                    // Ensure this route name matches your new driving course routes
                    $resumeLink = route('driving.show', ['id' => $section->id]);

                    if ($progress) {
                        // Ensure 'questions()' method is defined on DrivingSection and queries correctly
                        $questionsBefore = $section->questions()->where('id', '<=', $progress->last_question_id)->count();
                        $questionsPerPage = 10; // Make sure this matches controller logic
                        $startPage = (int) ceil($questionsBefore / $questionsPerPage);
                        if ($questionsBefore < $questionsCount) {
                            // Link to the correct page for resuming
                            $resumeLink = route('driving.show', ['id' => $section->id, 'page' => $startPage]);
                        }
                    }
                ?>
                <a href="<?php echo e($resumeLink); ?>" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex items-center space-x-5 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <div class="w-16 h-16 flex-shrink-0">
                            
                            <img src="<?php echo e(asset($section->flag ?? 'images/default-driving-icon.png')); ?>" alt="Icon of <?php echo e($section->title); ?>" class="w-full h-full object-cover rounded-full border border-gray-200">
                        </div>

                        <div>
                            <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                <?php echo e($section->title); ?>

                            </h5>
                            <p class="text-sm text-gray-500 mt-1">
                                <?php echo e(ucfirst($section->type ?? 'Driving Course')); ?> 
                            </p>
                            <?php if($progress && $questionsBefore < $questionsCount): ?>
                                <span class="text-sm text-indigo-500 font-semibold mt-2 block"><?php echo e(__('Resume from Q')); ?> <?php echo e($questionsBefore + 1); ?></span>
                            <?php elseif($progress): ?>
                                <span class="text-sm text-green-500 font-semibold mt-2 block"><?php echo e(__('Completed')); ?></span>
                            <?php else: ?>
                                <span class="text-sm text-gray-400 font-semibold mt-2 block"><?php echo e(__('Start Quiz')); ?></span>
                            <?php endif; ?>
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
<?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/frontend/driving-courses.blade.php ENDPATH**/ ?>