<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?> <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('navigation-menu');

$__html = app('livewire')->mount($__name, $__params, 'lw-1141408649-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?> <?php if(isset($header)): ?>
<?php echo e($header); ?>

<?php endif; ?>
<?php echo e($slot); ?>

<?php echo $__env->yieldPushContent('modals'); ?> <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?> <?php echo $__env->yieldPushContent('scripts'); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/layouts/app.blade.php ENDPATH**/ ?>