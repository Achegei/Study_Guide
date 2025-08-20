<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Quiz Results</h1>

    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <p class="text-2xl font-semibold">Your Score: <?php echo e($score); ?> / <?php echo e($totalQuestions); ?></p>
    </div>

    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $isCorrect = $result['is_correct'];
            $questionText = $result['question'];
            $statusClass = $isCorrect ? 'bg-green-100 border-green-400' : 'bg-red-100 border-red-400';
            $statusText = $isCorrect ? 'Correct!' : 'Incorrect.';
        ?>

        <div class="bg-white p-6 rounded-lg shadow-md mb-4 border-l-4 <?php echo e($statusClass); ?>">
            <p class="text-lg font-bold mb-2"><?php echo e($questionText); ?></p>
            <p class="text-md font-semibold <?php echo e($isCorrect ? 'text-green-600' : 'text-red-600'); ?>">
                <?php echo e($statusText); ?>

            </p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <a href="<?php echo e(route('free-quiz.show')); ?>" class="inline-block bg-gray-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 mt-4">
        Try Again
    </a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/frontend/free-quiz-results.blade.php ENDPATH**/ ?>