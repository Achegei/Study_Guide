
<?php
    use App\Models\UserProgress;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    // Fetch user progress for citizenship courses.
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
                    $questionsCount = $section->questions()->count();
                    $quizLink = route('courses.show', ['id' => $section->id]);

                    if ($progress) {
                        $questionsBefore = $section->questions()->where('id', '<=', $progress->last_question_id)->count();
                        $startPage = (int) ceil($questionsBefore / 10);
                        if ($questionsBefore < $questionsCount) {
                            $quizLink = route('courses.show', ['id' => $section->id, 'page' => $startPage]);
                        }
                    }

                    // Define the reading resources link
                    $readingResourcesLink = route('courses.reading-resources', ['section' => $section->id]);
                ?>
                
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $section)): ?> 
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex flex-col justify-between transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <div class="flex items-center space-x-5 mb-4">
                        <div class="w-16 h-16 flex-shrink-0">
                            <img src="<?php echo e(asset($section->flag)); ?>" alt="Flag of <?php echo e($section->title); ?>" class="w-full h-full object-cover rounded-full border border-gray-200">
                        </div>
                        
                        <div>
                            <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                <?php echo e($section->title); ?>

                            </h5>
                            <p class="text-sm text-gray-500 mt-1">
                                <?php echo e(ucfirst($section->type)); ?> - <?php echo e($section->capital); ?>

                            </p>
                        </div>
                    </div>

                    
                    <?php if($progress && $questionsBefore < $questionsCount): ?>
                        <span class="text-sm text-indigo-500 font-semibold mb-4 block"><?php echo e(__('Resume from Q')); ?> <?php echo e($questionsBefore + 1); ?></span>
                    <?php elseif($progress): ?>
                        <span class="text-sm text-green-500 font-semibold mb-4 block"><?php echo e(__('Completed')); ?></span>
                    <?php else: ?>
                        <span class="text-sm text-gray-400 font-semibold mb-4 block"><?php echo e(__('Start Quiz')); ?></span>
                    <?php endif; ?>

                    <div class="mt-auto flex flex-col space-y-2">
                        <a href="<?php echo e($quizLink); ?>" class="w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200">
                            <?php echo e(__('Go to Quiz')); ?>

                        </a>
                        
                        <a href="<?php echo e($readingResourcesLink); ?>" class="w-full text-center px-4 py-2 border border-indigo-500 text-indigo-500 rounded-md hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200">
                            <?php echo e(__('Reading Resources')); ?>

                        </a>
                    </div>
                </div>
                <?php else: ?>
                    
                    <div class="bg-gray-200 rounded-xl shadow-md overflow-hidden p-5 flex flex-col items-center space-x-5 text-center cursor-not-allowed opacity-60">
                         <div class="w-16 h-16 flex-shrink-0 opacity-50">
                            <img src="<?php echo e(asset($section->flag)); ?>" alt="Flag of <?php echo e($section->title); ?>" class="w-full h-full object-cover rounded-full border border-gray-200 grayscale">
                        </div>
                        <div>
                            <h5 class="text-lg font-bold text-gray-600 leading-tight">
                                <?php echo e($section->title); ?>

                            </h5>
                            <p class="text-sm text-gray-400 mt-1">
                                <?php echo e(ucfirst($section->type)); ?> - <?php echo e($section->capital); ?>

                            </p>
                            <span class="text-sm text-red-500 font-semibold mt-2 block"><?php echo e(__('Access Denied')); ?></span>
                        </div>
                        <div class="mt-auto flex flex-col space-y-2 w-full">
                            <button disabled class="w-full text-center px-4 py-2 bg-gray-400 text-white rounded-md cursor-not-allowed">
                                <?php echo e(__('Go to Quiz (Locked)')); ?>

                            </button>
                            <button disabled class="w-full text-center px-4 py-2 border border-gray-400 text-gray-500 rounded-md cursor-not-allowed">
                                <?php echo e(__('Reading Resources (Locked)')); ?>

                            </button>
                        </div>
                    </div>
                <?php endif; ?>
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
<?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/frontend/canadian-citizenship/courses.blade.php ENDPATH**/ ?>