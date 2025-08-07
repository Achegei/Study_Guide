<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/vendor/filament/infolists/resources/views/components/group.blade.php ENDPATH**/ ?>