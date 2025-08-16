{{--
    This view uses the <x-app-layout> Blade component to ensure
    it has the same base layout and styling as your questions page.
--}}
<x-app-layout>

    {{-- Main content area of the layout --}}
    <main class="flex-1 p-6 lg:ml-0">
        <div class="max-w-2xl mx-auto">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                {{ __('Free Quiz') }}
            </h1>

            <!--
                This is the new section to promote the paid question bank.
                It's a visually distinct card placed prominently at the top of the content.
            -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-8 rounded-3xl shadow-lg border border-blue-900 mb-8">
                <h2 class="text-2xl font-bold mb-4">
                    Ready for more?
                </h2>
                <p class="text-lg mb-6">
                    Unlock over 400+ additional practice questions to fully prepare for your citizenship test.
                    Get lifetime access for a one-time payment.
                </p>
                <a href="{{route('buy-now')}}" class="inline-block bg-white text-blue-700 px-8 py-4 rounded-full font-bold shadow-md
                                  hover:bg-gray-200 transition-colors duration-300 transform hover:scale-105">
                    Access Full Course
                </a>
            </div>

            @if ($freeQuizzes->isEmpty())
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <p class="text-gray-700 text-lg">No free quizzes found at this time.</p>
                </div>
            @else
                <div class="space-y-10">
                    @foreach ($freeQuizzes as $quiz)
                        {{--
                            Before rendering the form, we find the correct answer text.
                            This is needed because the JavaScript expects a simple string,
                            just like in your working questions.blade.php file.
                        --}}
                        @php
                            $correctAnswerText = '';
                            foreach ($quiz->options as $option) {
                                if ($option->is_correct) {
                                    $correctAnswerText = $option->option_text;
                                    break;
                                }
                            }
                        @endphp

                        {{-- This is a single quiz question card, styled to match your example --}}
                        <div id="question-{{ $quiz->id }}" class="bg-white rounded-3xl shadow-2xl p-8 border border-gray-200 relative">
                            <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white rounded-t-2xl p-4 -mx-8 -mt-8 mb-6">
                                <h3 class="text-xl md:text-2xl font-bold">
                                    Question {{ $loop->iteration }}:
                                </h3>
                            </div>
                            <p class="text-gray-800 text-lg mb-6 leading-relaxed">{{ $quiz->question }}</p>

                            {{--
                                The form now has a `data-correct-answer` attribute set
                                to the text of the correct option we found above.
                            --}}
                            <form class="quiz-form" data-question-id="{{ $quiz->id }}" data-correct-answer="{{ $correctAnswerText }}">
                                <input type="hidden" name="question_id" value="{{ $quiz->id }}">
                                <div class="space-y-4">
                                    @foreach ($quiz->options as $option)
                                        {{-- The radio button's value is now the option text itself --}}
                                        <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer
                                                      transition-all duration-300 ease-in-out bg-white shadow-sm hover:shadow-md
                                                      has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-500 has-[:checked]:ring-2 has-[:checked]:ring-indigo-500">
                                            <input type="radio" name="selected_answer" value="{{ $option->option_text }}" class="form-radio h-5 w-5 text-indigo-600 focus:ring-indigo-500">
                                            <span class="ml-4 text-gray-800 text-base md:text-lg font-medium">{{ $option->option_text }}</span>
                                        </label>
                                    @endforeach
                                </div>

                                <div class="status-message mt-4 text-red-600 font-medium text-sm hidden"></div>

                                <div class="flex flex-col md:flex-row gap-4 mt-8">
                                    <button type="submit" class="check-answer-btn w-full md:w-auto px-8 py-4 bg-gradient-to-r from-indigo-500 to-indigo-700 text-white font-bold rounded-xl shadow-lg
                                                                  hover:from-indigo-600 hover:to-indigo-800 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                        Check Answer
                                    </button>
                                    <button type="button" class="reset-question-btn w-full md:w-auto px-8 py-4 bg-gray-200 text-gray-800 font-bold rounded-xl shadow-md
                                                                  hover:bg-gray-300 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 hidden">
                                        Reset
                                    </button>
                                </div>
                            </form>

                            {{-- Feedback Area --}}
                            <div class="feedback-area mt-6 p-6 rounded-2xl border-2 transition-all duration-300 ease-in-out hidden flex items-start space-x-4">
                                <div class="feedback-icon size-8 flex-shrink-0 flex items-center justify-center text-white rounded-full">
                                    <svg class="w-5 h-5 hidden correct-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <svg class="w-5 h-5 hidden incorrect-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="feedback-message font-extrabold text-lg md:text-xl mb-2"></p>
                                    <p class="correct-answer-display text-base md:text-lg font-medium hidden"></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.quiz-form').forEach(form => {
                const questionCard = form.closest('.bg-white');
                const submitButton = form.querySelector('.check-answer-btn');
                const resetButton = form.querySelector('.reset-question-btn');
                const feedbackArea = questionCard.querySelector('.feedback-area');
                const feedbackMessage = feedbackArea.querySelector('.feedback-message');
                const feedbackIcon = feedbackArea.querySelector('.feedback-icon');
                const correctIcon = feedbackIcon.querySelector('.correct-icon');
                const incorrectIcon = feedbackIcon.querySelector('.incorrect-icon');
                const correctAnswerDisplay = feedbackArea.querySelector('.correct-answer-display');
                const statusMessageDiv = form.querySelector('.status-message');
                const radioInputs = form.querySelectorAll('input[type="radio"]');
                const allLabels = form.querySelectorAll('label');

                const resetFeedback = () => {
                    feedbackArea.classList.add('hidden');
                    feedbackArea.classList.remove('bg-green-100', 'border-green-400', 'text-green-700', 'bg-red-100', 'border-red-400', 'text-red-700');
                    correctIcon.classList.add('hidden');
                    incorrectIcon.classList.add('hidden');
                    feedbackIcon.classList.remove('bg-green-500', 'bg-red-500');
                    feedbackMessage.textContent = '';
                    correctAnswerDisplay.classList.add('hidden');
                    correctAnswerDisplay.textContent = '';
                    statusMessageDiv.classList.add('hidden');
                    statusMessageDiv.textContent = '';

                    allLabels.forEach(label => {
                        label.classList.remove('bg-green-100', 'border-green-500', 'bg-red-100', 'border-red-500');
                        label.classList.add('bg-white', 'border-gray-300');
                        // Reset hover styles by re-adding the class that enables them on the parent label.
                        label.classList.add('has-[:checked]:bg-indigo-50', 'has-[:checked]:border-indigo-500');
                        label.classList.add('hover:shadow-md');
                    });

                    radioInputs.forEach(radio => {
                        radio.disabled = false;
                        radio.checked = false;
                    });

                    submitButton.disabled = false;
                    submitButton.classList.remove('hidden');
                    resetButton.classList.add('hidden');
                };

                resetFeedback(); // Initial reset

                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const correctAnswer = this.dataset.correctAnswer;
                    const selectedAnswerInput = this.querySelector('input[name="selected_answer"]:checked');

                    statusMessageDiv.classList.add('hidden');

                    if (!selectedAnswerInput) {
                        statusMessageDiv.textContent = 'Please select an answer to check.';
                        statusMessageDiv.classList.remove('hidden');
                        return;
                    }

                    const selectedAnswer = selectedAnswerInput.value;
                    let isCorrect = (selectedAnswer === correctAnswer);

                    feedbackArea.classList.remove('hidden');
                    submitButton.disabled = true;
                    submitButton.classList.add('hidden');
                    resetButton.classList.remove('hidden');

                    radioInputs.forEach(radio => radio.disabled = true);

                    // Remove all hover/selected states on labels after submission
                    allLabels.forEach(label => {
                        label.classList.remove('hover:shadow-md', 'has-[:checked]:bg-indigo-50', 'has-[:checked]:border-indigo-500');
                    });

                    if (isCorrect) {
                        feedbackArea.classList.add('bg-green-100', 'border-green-400', 'text-green-700');
                        feedbackIcon.classList.add('bg-green-500');
                        correctIcon.classList.remove('hidden');
                        feedbackMessage.textContent = 'Correct! Well done.';
                        selectedAnswerInput.closest('label').classList.add('bg-green-100', 'border-green-500');
                    } else {
                        feedbackArea.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                        feedbackIcon.classList.add('bg-red-500');
                        incorrectIcon.classList.remove('hidden');
                        feedbackMessage.textContent = 'Incorrect. Take another look!';
                        selectedAnswerInput.closest('label').classList.add('bg-red-100', 'border-red-500');

                        // Find the correct answer text to display
                        const correctLabel = form.querySelector(`input[value="${correctAnswer}"]`).closest('label');
                        const correctText = correctLabel.querySelector('span').textContent;
                        correctAnswerDisplay.textContent = `The correct answer was: "${correctText}"`;
                        correctAnswerDisplay.classList.remove('hidden');

                        allLabels.forEach(label => {
                            if (label.querySelector('input[name="selected_answer"]').value === correctAnswer) {
                                label.classList.add('bg-green-100', 'border-green-500');
                            }
                        });
                    }
                });

                resetButton.addEventListener('click', resetFeedback);
            });
        });
    </script>
    @endpush
</x-app-layout>
