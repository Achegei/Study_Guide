<?php $__env->startSection('content'); ?>
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 space-y-6">

        <!-- 📰 Blog Content -->
        <h1 class="text-3xl font-bold text-red-700"><?php echo e($blog->title); ?></h1>
        <p class="text-sm text-gray-500">Published on <?php echo e($blog->created_at->format('F j, Y')); ?></p>
        <article class="prose max-w-none">
            <?php echo nl2br(e($blog->content)); ?>

        </article>

        <!-- 💬 Comments Section -->
        <div class="mt-10" x-data="{ replyForm: null }">
            <h2 class="text-xl font-bold text-gray-800">
                Comments (<?php echo e($blog->comments->count()); ?>)
            </h2>

            <?php
                function renderComments($comments, $level = 0) {
                    foreach ($comments as $comment) {
                        echo '<div class="mt-4 border-l pl-4" style="margin-left: '. ($level * 20) .'px">';
                        echo '<p class="font-semibold text-gray-700">'. e($comment->name) .'</p>';
                        echo '<p class="text-gray-600 text-sm">'. $comment->created_at->format('F j, Y') .'</p>';
                        echo '<p class="mt-1 text-gray-800">'. e($comment->comment) .'</p>';

                        // Reply toggle
                        echo '<button @click="replyForm = '. $comment->id .'" class="text-blue-600 text-sm mt-2">Reply</button>';

                        // Reply form (shown when replyForm === this comment ID)
                        echo '<div x-show="replyForm === '. $comment->id .'" class="mt-2" x-cloak>';
                        echo '<form method="POST" action="'. route('citizenship-info.comment', $comment->blog_id) .'" class="space-y-2 mt-2">';
                        echo csrf_field();
                        echo '<input type="hidden" name="parent_id" value="'. $comment->id .'">';
                        echo '<input type="text" name="name" placeholder="Your Name" required class="w-full border px-3 py-1 rounded">';
                        echo '<input type="email" name="email" placeholder="Your Email" required class="w-full border px-3 py-1 rounded">';
                        echo '<textarea name="comment" placeholder="Write your reply..." rows="3" required class="w-full border px-3 py-1 rounded"></textarea>';
                        echo '<button class="bg-gray-800 text-white px-4 py-1 rounded hover:bg-red-600">Submit Reply</button>';
                        echo '</form>';
                        echo '</div>';

                        // Recursive replies
                        if ($comment->replies->count()) {
                            renderComments($comment->replies, $level + 1);
                        }

                        echo '</div>';
                    }
                }
            ?>

            <?php
                renderComments($blog->comments->whereNull('parent_id'));
            ?>
        </div>

        <!-- ✍️ Leave a Reply -->
        <div class="mt-10">
            <h3 class="text-lg font-semibold mb-3">Leave a Reply</h3>
            <form method="POST" action="<?php echo e(route('citizenship-info.comment', $blog)); ?>" class="space-y-4">
                <?php echo csrf_field(); ?>
                <input type="text" name="name" placeholder="Your Name" required class="w-full border px-4 py-2 rounded">
                <input type="email" name="email" placeholder="Your Email" required class="w-full border px-4 py-2 rounded">
                <textarea name="comment" placeholder="Write your comment..." rows="5" required class="w-full border px-4 py-2 rounded"></textarea>
                <button class="bg-black text-white px-6 py-2 rounded-full font-semibold hover:bg-red-700">
                    Submit Comment
                </button>
            </form>

            <?php if(session('success')): ?>
                <p class="text-green-600 mt-3"><?php echo e(session('success')); ?></p>
            <?php endif; ?>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/citizenship-prep/resources/views/pages/blog-single.blade.php ENDPATH**/ ?>