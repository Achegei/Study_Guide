<?php $__env->startSection('content'); ?>
    <!--
        This Blade file has been professionally redesigned for a cleaner, more modern look.
        - It uses a central, card-like container for the form.
        - Form fields are well-spaced and clearly labeled.
        - The confirmation and submit button are visually distinct.
        - It maintains all original functionality for form submission and error display.
    -->
    <div class="max-w-4xl mx-auto px-4 py-12">
        <h1 class="text-3xl sm:text-4xl font-bold mb-4 text-center text-gray-800">Course Payment & Access Request</h1>
        <p class="mb-8 text-gray-600 text-center max-w-2xl mx-auto">
            Thank you for your interest in our course! Please complete this form after sending your Interac e-Transfer payment. Once we confirm your payment, your course access will be delivered via email or WhatsApp.
        </p>

        <!-- Status Messages -->
        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-800 rounded-lg shadow-sm font-semibold">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-800 rounded-lg shadow-sm font-semibold">
                <h3 class="font-bold text-lg mb-2">Oops! There were some errors.</h3>
                <ul class="list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Payment Form -->
        <form method="POST" action="<?php echo e(route('register.payment')); ?>" enctype="multipart/form-data" class="bg-white p-8 sm:p-10 rounded-3xl shadow-2xl space-y-8 border border-gray-100">
            <?php echo csrf_field(); ?>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="full_name" id="full_name" value="<?php echo e(old('full_name')); ?>" required autofocus
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- Phone Number (WhatsApp, optional) -->
                <div>
                    <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone Number (WhatsApp, optional)</label>
                    <input type="text" name="phone_number" id="phone_number" value="<?php echo e(old('phone_number')); ?>"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>

                <!-- Course Selected (Displayed to user for their choice of course name) -->
                <div>
                    <label for="course_selected" class="block text-sm font-medium text-gray-700 mb-1">Course Selected</label>
                    <select name="course_selected" id="course_selected" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors bg-white">
                        <option value="">Select a Course</option>
                        <?php $__currentLoopData = $courseOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>" <?php echo e(old('course_selected') == $value ? 'selected' : ''); ?>>
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 gap-6">
                <!-- NEW: Registration Type (Maps to user_type for access control) -->
                <div>
                    <label for="registration_type" class="block text-sm font-medium text-gray-700 mb-1">Access Type</label>
                    <select name="registration_type" id="registration_type" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors bg-white">
                        <option value="">Select how you'll use the platform</option>
                        <option value="citizenship" <?php echo e(old('registration_type') == 'citizenship' ? 'selected' : ''); ?>>Citizenship Test Access Only</option>
                        <option value="driving" <?php echo e(old('registration_type') == 'driving' ? 'selected' : ''); ?>>Driving Test Access Only</option>
                        <option value="both" <?php echo e(old('registration_type') == 'both' ? 'selected' : ''); ?>>Access Both Test Types</option>
                    </select>
                    <?php $__errorArgs = ['registration_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Amount Sent (CAD) -->
                <div>
                    <label for="amount_sent" class="block text-sm font-medium text-gray-700 mb-1">Amount Sent (CAD)</label>
                    <input type="number" name="amount_sent" id="amount_sent" step="0.01" value="<?php echo e(old('amount_sent')); ?>" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                </div>
            </div>

            <!-- Interac e-Transfer Reference Number -->
            <div>
                <label for="interac_reference" class="block text-sm font-medium text-gray-700 mb-1">Interac e-Transfer Reference Number</label>
                <input type="text" name="interac_reference" id="interac_reference" value="<?php echo e(old('interac_reference')); ?>" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-full shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
            </div>

            <!-- Upload Screenshot of Payment (Optional) -->
            <div>
                <label for="payment_screenshot" class="block text-sm font-medium text-gray-700 mb-1">Upload Screenshot of Payment (Optional)</label>
                <input type="file" name="payment_screenshot" id="payment_screenshot" accept="image/*"
                       class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-full cursor-pointer bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors">
                <p class="mt-2 text-xs text-gray-500">Max 2MB. PNG, JPG, JPEG.</p>
            </div>

            <!-- Payment Confirmation Checkbox -->
            <div class="flex items-start">
                <input type="checkbox" name="payment_confirmation" id="payment_confirmation" required
                       class="mt-1 mr-2 rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 h-4 w-4">
                <label for="payment_confirmation" class="text-sm text-gray-700">
                    I confirm I have sent payment via Interac e-Transfer to: <strong class="text-blue-600">youremail@example.com</strong>
                </label>
            </div>

            <div class="flex flex-col sm:flex-row-reverse sm:items-center sm:justify-between mt-8 pt-4 border-t border-gray-100">
                <button type="submit" class="inline-flex items-center justify-center w-full sm:w-auto px-8 py-3 bg-blue-600 border border-transparent rounded-full font-semibold text-white tracking-wide shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Submit Payment & Register
                </button>
                <a class="mt-4 sm:mt-0 text-center sm:text-left underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="<?php echo e(route('login')); ?>">
                    Already have an account?
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/auth/register-payment.blade.php ENDPATH**/ ?>