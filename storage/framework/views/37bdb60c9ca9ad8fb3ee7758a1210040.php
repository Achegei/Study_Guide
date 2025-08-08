

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
    
    <div class="flex min-h-screen bg-gray-50" x-data="{ sidebarOpen: window.innerWidth >= 1024 }"> 

        
        <button @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden fixed top-4 left-4 z-50 p-3 bg-indigo-600 text-white rounded-full shadow-lg
                       transition-all duration-300 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        
        <aside x-show="sidebarOpen"
               x-transition:enter="transition ease-out duration-300 transform"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-300 transform"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               @click.away="sidebarOpen = window.innerWidth >= 1024 ? true : false" 
               class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-800 text-white shadow-lg
                      flex flex-col overflow-y-auto lg:relative lg:translate-x-0 lg:flex-shrink-0 lg:w-64">

            <div class="p-6 text-center border-b border-gray-700">
                <h3 class="text-2xl font-bold text-indigo-300"><?php echo e(__('Regions')); ?></h3>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                <?php $__currentLoopData = $allSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navSection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('courses.show', $navSection->id)); ?>"
                       class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200
                              <?php if($navSection->id == $section->id): ?> bg-indigo-700 text-white shadow-md <?php else: ?> text-gray-300 hover:bg-gray-700 hover:text-white <?php endif; ?>">
                        <img src="<?php echo e(asset($navSection->flag)); ?>" alt="<?php echo e($navSection->title); ?>" class="size-6 rounded-full mr-3 border border-gray-600">
                        <span class="font-medium"><?php echo e($navSection->title); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>

            <div class="p-6 border-t border-gray-700 space-y-3">
                <a href="#" class="block px-4 py-3 bg-indigo-600 text-white text-center font-semibold rounded-xl shadow-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                    <?php echo e(__('Discover Guide')); ?>

                </a>
                <a href="#" class="block px-4 py-3 bg-purple-600 text-white text-center font-semibold rounded-xl shadow-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">
                    <?php echo e(__('Summary')); ?>

                </a>
            </div>
        </aside>

        
        <main class="flex-1 p-6 lg:ml-0">
            <div class="max-w-2xl mx-auto"> 
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    <?php echo e(__('Questions for')); ?> <span class="text-indigo-600"><?php echo e($section->title); ?></span>
                </h1>

                <?php if(session('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative mb-4" role="alert">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                
                <?php if($section->summary_audio_url): ?>
                    <div class="mb-8 p-4 bg-white rounded-2xl shadow-xl border border-gray-200 text-center">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3"><?php echo e(__('Listen to the summary for')); ?> <?php echo e($section->title); ?></h4>
                        <audio controls class="w-full max-w-md mx-auto rounded-lg shadow-sm">
                            <source src="<?php echo e(asset($section->summary_audio_url)); ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                <?php endif; ?>

                <?php if($questions->isEmpty()): ?>
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <p class="text-gray-700 text-lg">No questions found for this section yet.</p>
                    </div>
                <?php else: ?>
                    <div class="space-y-10">
                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div id="question-<?php echo e($question->id); ?>" class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-200 relative">
                                <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white rounded-t-2xl p-4 -mx-8 -mt-8 mb-6">
                                    <h3 class="text-xl md:text-2xl font-bold">
                                        Question <?php echo e($loop->iteration + ($questions->currentPage() - 1) * $questions->perPage()); ?>:
                                    </h3>
                                </div>
                                <p class="text-gray-800 text-lg mb-6 leading-relaxed"><?php echo e($question->question); ?></p>

                                
                                <form class="quiz-form" data-question-id="<?php echo e($question->id); ?>" data-correct-answer="<?php echo e($question->correct_answer); ?>">
                                    <input type="hidden" name="question_id" value="<?php echo e($question->id); ?>">
                                    <div class="space-y-4">
                                        <?php $__currentLoopData = $question->choices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer
                                                          transition-all duration-300 ease-in-out bg-white shadow-sm hover:shadow-md
                                                          has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-500 has-[:checked]:ring-2 has-[:checked]:ring-indigo-500">
                                                <input type="radio" name="selected_answer" value="<?php echo e($choice); ?>" class="form-radio h-5 w-5 text-indigo-600 focus:ring-indigo-500">
                                                <span class="ml-4 text-gray-800 text-base md:text-lg font-medium"><?php echo e($choice); ?></span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    
                                    <div class="status-message mt-4 text-red-600 font-medium text-sm hidden"></div>

                                    <div class="flex flex-col md:flex-row gap-4 mt-8">
                                        
                                        <button type="submit" class="check-answer-btn w-full md:w-auto px-8 py-4 bg-gradient-to-r from-indigo-500 to-indigo-700 text-white font-bold rounded-xl shadow-lg
                                                                      hover:from-indigo-600 hover:to-indigo-800 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                            Check Answer
                                        </button>
                                        <button type="button" class="reset-question-btn w-full md:w-auto px-8 py-4 bg-gray-200 text-gray-800 font-bold rounded-xl shadow-md
                                                                      hover:bg-gray-300 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 hidden">
                                            Reset
                                        </button>
                                    </div>
                                </form>

                                
                                <div class="feedback-area mt-6 p-6 rounded-2xl border-2 transition-all duration-300 ease-in-out hidden flex items-start space-x-4">
                                    <div class="feedback-icon size-8 flex-shrink-0 flex items-center justify-center text-white rounded-full">
                                        <svg class="w-5 h-5 hidden correct-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <svg class="w-5 h-5 hidden incorrect-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="feedback-message font-extrabold text-lg md:text-xl mb-2"></p>
                                        <p class="correct-answer-display text-base md:text-lg font-medium hidden"></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="mt-10 flex justify-center">
                        <?php echo e($questions->links()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Alpine.js sidebar state management
            window.addEventListener('resize', () => {
                const mainDiv = document.querySelector('[x-data]');
                if (mainDiv && mainDiv.__x) {
                    mainDiv.__x.$data.sidebarOpen = window.innerWidth >= 1024;
                }
            });

            document.querySelectorAll('.quiz-form').forEach(form => {
                const questionCard = form.closest('.bg-white');
                const submitButton = form.querySelector('.check-answer-btn');
                const resetButton = form.querySelector('.reset-question-btn');
                const feedbackArea = questionCard.querySelector('.feedback-area');
                const feedbackMessage = feedbackArea.querySelector('.feedback-message');
                const feedbackIcon = feedbackArea.querySelector('.feedback-icon');
                const correctIcon = feedbackIcon.querySelector('.correct-icon');
                const incorrectIcon = feedbackIcon.querySelector('.incorrect-icon');
                const correctAnswerDisplay = feedbackArea.querySelector('.correct-answer-display');
                const statusMessageDiv = form.querySelector('.status-message');
                const radioInputs = form.querySelectorAll('input[type="radio"]');
                const allLabels = form.querySelectorAll('label');

                const resetFeedback = () => {
                    feedbackArea.classList.add('hidden');
                    feedbackArea.classList.remove('bg-green-100', 'border-green-400', 'text-green-700', 'bg-red-100', 'border-red-400', 'text-red-700');
                    correctIcon.classList.add('hidden');
                    incorrectIcon.classList.add('hidden');
                    feedbackIcon.classList.remove('bg-green-500', 'bg-red-500');
                    feedbackMessage.textContent = '';
                    correctAnswerDisplay.classList.add('hidden');
                    correctAnswerDisplay.textContent = '';
                    statusMessageDiv.classList.add('hidden');
                    statusMessageDiv.textContent = '';

                    allLabels.forEach(label => {
                        label.classList.remove('bg-green-100', 'border-green-500', 'bg-red-100', 'border-red-500');
                        label.classList.add('bg-white', 'border-gray-300');
                        // Reset hover styles by re-adding the class that enables them on the parent label.
                        label.classList.add('has-[:checked]:bg-indigo-50', 'has-[:checked]:border-indigo-500');
                        label.classList.add('hover:shadow-md');
                    });

                    radioInputs.forEach(radio => {
                        radio.disabled = false;
                        radio.checked = false;
                    });

                    submitButton.disabled = false;
                    submitButton.classList.remove('hidden');
                    resetButton.classList.add('hidden');
                };

                resetFeedback(); // Initial reset

                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const correctAnswer = this.dataset.correctAnswer;
                    const selectedAnswerInput = this.querySelector('input[name="selected_answer"]:checked');

                    statusMessageDiv.classList.add('hidden');

                    if (!selectedAnswerInput) {
                        statusMessageDiv.textContent = 'Please select an answer to check.';
                        statusMessageDiv.classList.remove('hidden');
                        return;
                    }

                    const selectedAnswer = selectedAnswerInput.value;
                    let isCorrect = (selectedAnswer === correctAnswer);

                    feedbackArea.classList.remove('hidden');
                    submitButton.disabled = true;
                    submitButton.classList.add('hidden');
                    resetButton.classList.remove('hidden');

                    radioInputs.forEach(radio => radio.disabled = true);

                    // Remove all hover/selected states on labels after submission
                    allLabels.forEach(label => {
                        label.classList.remove('hover:shadow-md', 'has-[:checked]:bg-indigo-50', 'has-[:checked]:border-indigo-500');
                    });

                    if (isCorrect) {
                        feedbackArea.classList.add('bg-green-100', 'border-green-400', 'text-green-700');
                        feedbackIcon.classList.add('bg-green-500');
                        correctIcon.classList.remove('hidden');
                        feedbackMessage.textContent = 'Correct! Well done.';
                        selectedAnswerInput.closest('label').classList.add('bg-green-100', 'border-green-500');
                    } else {
                        feedbackArea.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                        feedbackIcon.classList.add('bg-red-500');
                        incorrectIcon.classList.remove('hidden');
                        feedbackMessage.textContent = 'Incorrect. Take another look!';
                        selectedAnswerInput.closest('label').classList.add('bg-red-100', 'border-red-500');

                        correctAnswerDisplay.textContent = `The correct answer was: "${correctAnswer}"`;
                        correctAnswerDisplay.classList.remove('hidden');

                        allLabels.forEach(label => {
                            if (label.querySelector('input[name="selected_answer"]').value === correctAnswer) {
                                label.classList.add('bg-green-100', 'border-green-500');
                            }
                        });
                    }
                });

                resetButton.addEventListener('click', resetFeedback);
            });
        });
    </script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/resources/views/frontend/questions.blade.php ENDPATH**/ ?>