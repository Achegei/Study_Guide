<?php echo e(__('Dashboard')); ?>

Available Courses
<?php if($courses->isEmpty()): ?>
No courses are currently available. Please check back later!

<?php else: ?>
<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($course->title); ?>

<?php echo e(Str::limit($course->description, 100)); ?>


View Course
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/dashboard.blade.php ENDPATH**/ ?>