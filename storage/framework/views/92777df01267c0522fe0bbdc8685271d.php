<div>
    <div class="fixed bottom-16 right-5 md:bottom-5 md:right-5 z-50 cursor-pointer group">
    <div wire:click="toggleChat" class="relative">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#FCD34D" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0A192F" class="w-12 h-12 hover:scale-110 transition duration-300 ease-in-out">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 16.5a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zM17.25 16.5a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9h.008v.008H12z" />
        </svg>

        <span class="absolute -top-full left-1/2 -translate-x-1/2 mb-2 scale-0 transition-transform origin-bottom group-hover:scale-100 bg-gray-800 text-white text-sm rounded py-1 px-2 pointer-events-none">
            Your 24/7 Prep Assistant
        </span>
    </div>
</div>

    <!-- Chat Window -->
    <div x-show="$wire.isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="fixed bottom-28 right-5 md:bottom-20 md:right-5 z-50 w-80 h-96 bg-white rounded-lg shadow-lg flex flex-col overflow-hidden">
        
        <!-- Header -->
        <div class="bg-navy-blue text-bright-yellow p-4 flex items-center justify-between shadow-md">
            <h5 class="text-lg font-bold">24/7 Prep Assistant</h5>
            <button wire:click="toggleChat">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-bright-yellow" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Message container with custom scrollbar -->
        <div class="flex-1 p-4 overflow-y-auto custom-scrollbar flex flex-col space-y-4">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--[if BLOCK]><![endif]--><?php if($message['role'] === 'assistant'): ?>
                    <!-- Assistant Message -->
                    <div class="flex items-start space-x-2">
                        <img src="https://placehold.co/40x40/0A192F/FCD34D?text=AI" alt="AI" class="w-8 h-8 rounded-full">
                        <div class="bg-gray-200 text-gray-800 p-3 rounded-lg max-w-[80%]">
                            <p class="text-sm"><?php echo e($message['text']); ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- User Message -->
                    <div class="flex justify-end">
                        <div class="bg-bright-yellow text-navy-blue p-3 rounded-lg max-w-[80%]">
                            <p class="text-sm"><?php echo e($message['text']); ?></p>
                        </div>
                    </div>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

            <!-- Loading Indicator -->
            <div wire:loading wire:target="sendMessage">
                <div class="flex items-start space-x-2">
                    <img src="https://placehold.co/40x40/0A192F/FCD34D?text=AI" alt="AI" class="w-8 h-8 rounded-full">
                    <div class="bg-gray-200 text-gray-800 p-3 rounded-lg max-w-[80%] flex items-center space-x-2">
                        <div class="flex items-center space-x-1">
                            <div class="w-2 h-2 bg-navy-blue rounded-full animate-pulse"></div>
                            <div class="w-2 h-2 bg-navy-blue rounded-full animate-pulse delay-75"></div>
                            <div class="w-2 h-2 bg-navy-blue rounded-full animate-pulse delay-150"></div>
                        </div>
                        <p class="text-sm">Typing...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Box -->
        <div class="p-4 border-t border-gray-200">
            <form wire:submit.prevent="sendMessage">
                <div class="flex">
                    <input wire:model.live="messageText" type="text" placeholder="Type your question..." class="flex-1 px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-navy-blue transition">
                    <button type="submit" class="ml-2 bg-bright-yellow hover:bg-yellow-400 text-navy-blue p-2 rounded-full transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/livewire/test-prep.blade.php ENDPATH**/ ?>