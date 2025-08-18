<?php $__env->startSection('content'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        /* Custom styles for FAQ sections */
        .faq-item {
            border-bottom: 1px solid #e5e7eb; /* Light gray border for separation */
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }
        .faq-item:last-child {
            border-bottom: none; /* No border for the last item */
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .faq-question-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 0.75rem 0;
        }
        .faq-question {
            font-size: 1.25rem; /* text-xl */
            font-weight: 600;   /* font-semibold */
            color: #1f2937;     /* gray-900 */
            flex-grow: 1; /* Allows question text to take up available space */
            padding-right: 1rem; /* Space for the icon */
        }
        .faq-toggle-icon {
            width: 1.5rem; /* Equivalent to w-6 */
            height: 1.5rem; /* Equivalent to h-6 */
            color: #6b7280; /* gray-500 */
            transition: transform 0.2s ease-in-out;
        }
        .faq-toggle-icon.rotated {
            transform: rotate(180deg);
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
            color: #4b5563;     /* gray-600 */
            line-height: 1.6;
            padding-left: 1rem; /* Indent the answer slightly */
            padding-right: 1rem;
        }
        .faq-answer.expanded {
            max-height: 500px; /* Arbitrary large enough value for content */
            opacity: 1;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .faq-answer ul {
            list-style-type: disc;
            margin-left: 1.5rem;
            margin-top: 0.5rem;
        }
        .faq-answer li {
            margin-bottom: 0.25rem;
        }
    </style>

    <div class="py-12 sm:py-20">
        <div class="max-w-4xl mx-auto px-4">
            <header class="text-center mb-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                    Frequently Asked Questions
                </h1>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
                    Find answers to common questions about our test preparation courses.
                </p>
            </header>

            <div class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-200">
                <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-8">
                    All Questions
                </h2>
                <div class="space-y-4">
                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: How do I pay?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: We accept **Interac e-Transfer** and **Cheque**. It’s safe, simple, and trusted across Canada. No credit cards required. This ensures safe, fast, and secure payments.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: How long do I have access?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: You’ll have **1 full year of access** with a one-time payment. You get **12 months (1 year) of access** from the date of registration.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: Is this official?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: No. We are an **independent test prep platform** based on the official Discover Canada guide and provincial driver handbooks. We are an **independent education company**. Our content is 100% based on the official Discover Canada guide and provincial driver handbooks.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: Can I study on my phone?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: Yes. Our platform is **mobile-friendly** and works on any device. The platform is **mobile-friendly**, and you can also study on tablets or computers.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: What tests are covered?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A:
                            <ul>
                                <li>**Canadian Citizenship Test** (National + Province/Territory specific)</li>
                                <li>**Provincial Driving Knowledge Tests**</li>
                            </ul>
                        </p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: Do I get both citizenship and driving test prep together?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: You can buy them separately, or choose our **Bundle Package for best value**.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: What languages are available?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: English, French, Somali, Arabic, Spanish, Mandarin, Hindustani and Punjabi.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: Do I need internet to study?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: **Internet is required** to log in.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: How soon will I get access after paying?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: You will receive login details within **1 hour** after your payment is confirmed.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: Can I share my account with friends or family?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: **No**. Each account is for one user only to keep access affordable for everyone.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: What happens if I don’t pass my test?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: Most learners pass on their first try. If not, you still have **full-year access to keep practicing**.</p>
                    </div>

                    
                    <div class="faq-item">
                        <div class="faq-question-header">
                            <h3 class="faq-question">Q: Do you offer refunds?</h3>
                            <svg class="faq-toggle-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                        <p class="faq-answer">A: Yes, but if you got **access to the course - all sales will be final**.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqHeaders = document.querySelectorAll('.faq-question-header');

            faqHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const faqItem = this.closest('.faq-item');
                    const answer = faqItem.querySelector('.faq-answer');
                    const icon = this.querySelector('.faq-toggle-icon');

                    // Toggle the 'expanded' class on the answer
                    answer.classList.toggle('expanded');
                    // Toggle the 'rotated' class on the icon for visual rotation
                    icon.classList.toggle('rotated');
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/pages/faqs.blade.php ENDPATH**/ ?>