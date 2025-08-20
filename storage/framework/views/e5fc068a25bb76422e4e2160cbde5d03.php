<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="flex justify-center mb-4">
            
            <a href="/">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-12 mx-auto">
                <h2 class="text-2xl font-bold text-red-600 text-center mt-2">Iqra Canada Test Prep</h2>
            </a>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            <?php if(Auth::check() && Auth::user()->must_change_password): ?>
                <?php echo e(__('Your account has been set up with a temporary password. For security reasons, you must change your password before you can continue.')); ?>

            <?php else: ?>
                <?php echo e(__('You can change your password here.')); ?>

            <?php endif; ?>
        </div>

        <?php if($errors->any()): ?>
            <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-800 rounded shadow-sm">
                <ul class="list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if(session('warning')): ?>
            <div class="mb-4 font-medium text-sm text-yellow-600">
                <?php echo e(session('warning')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <form method="POST" action="<?php echo e(route('password.update.custom')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?> 

            <div class="mt-4">
                <label for="current_password" class="block font-medium text-sm text-gray-700">Current Password</label>
                <input id="current_password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" type="password" name="current_password" required autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">New Password</label>
                <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm New Password</label>
                <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <?php echo e(__('Change Password')); ?>

                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/auth/change-password.blade.php ENDPATH**/ ?>