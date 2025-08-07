<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="flex justify-center mb-4">
            
            <a href="/">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" class="h-12 mx-auto">
                <h2 class="text-2xl font-bold text-red-600 text-center mt-2">Prepify Canada</h2>
            </a>
        </div>

        <?php if(session('status')): ?>
            <div class="mb-4 font-medium text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-800 rounded shadow-sm">
                <ul class="list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            <div>
                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600"><?php echo e(__('Remember me')); ?></span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <?php if(Route::has('password.request')): ?>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="<?php echo e(route('password.request')); ?>">
                        <?php echo e(__('Forgot your password?')); ?>

                    </a>
                <?php endif; ?>

                <button type="submit" class="ms-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    <?php echo e(__('Log in')); ?>

                </button>
            </div>

            
            <div class="mt-4 text-center text-sm text-gray-600">
                <?php echo e(__('Don\'t have an account yet?')); ?>

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="<?php echo e(route('register.payment')); ?>">
                    <?php echo e(__('Register & Pay Here')); ?>

                </a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/resources/views/auth/login.blade.php ENDPATH**/ ?>