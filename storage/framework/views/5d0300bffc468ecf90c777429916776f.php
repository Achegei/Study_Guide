<?php $__env->startSection('content'); ?>
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">
            Canadian Citizenship Blog & Tips
        </h1>

        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-10 border-b pb-6">
            <h2 class="text-xl font-bold text-red-700"><?php echo e($blog->title); ?></h2>
            <p class="text-gray-600 mt-2"><?php echo e($blog->excerpt); ?></p>
            <a href="<?php echo e(route('blogs.show', $blog->slug)); ?>" class="inline-block mt-3 text-sm text-blue-600 hover:underline">
                Read Full Article →
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div class="mt-8"><?php echo e($blogs->links()); ?></div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/resources/views/pages/citizenship-info.blade.php ENDPATH**/ ?>