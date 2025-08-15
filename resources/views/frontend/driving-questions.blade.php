{{-- resources/views/frontend/driving-questions.blade.php --}}
{{-- This view is specifically for Driving Course Questions --}}
@php
    // The $progress and $user variables are expected to be passed from the controller.
    // Explicit 'use' statements for models within Blade are generally not needed if passed from controller.
@endphp

<x-app-layout>
    {{-- Main container for the layout, with Alpine.js for sidebar toggle --}}
    <div class="flex min-h-screen bg-gray-50" x-data="{ sidebarOpen: window.innerWidth >= 1024, showResetModal: false }">

        {{-- Custom Confirmation Modal --}}
        <div x-show="showResetModal" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div @click.away="showResetModal = false"
                 class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-sm m-4 text-center transform transition-all duration-300">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ __('Are you sure?') }}</h3>
                <p class="text-gray-700 mb-6">{{ __('This will permanently reset your progress for this driving region. You will start from question 1.') }}</p>
                <div class="flex justify-center gap-4">
                    <button @click="showResetModal = false"
                            class="px-6 py-3 bg-gray-200 text-gray-800 font-semibold rounded-xl hover:bg-gray-300 transition-colors">
                        {{ __('Cancel') }}
                    </button>
                    {{-- IMPORTANT: Update route to driving.reset-progress --}}
                    <form action="{{ route('driving.reset-progress', $section->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-6 py-3 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition-colors">
                            {{ __('Reset Progress') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Mobile Hamburger Button --}}
        <button @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden fixed top-4 left-4 z-50 p-3 bg-indigo-600 text-white rounded-full shadow-lg
                       transition-all duration-300 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        {{-- Sidebar --}}
        <aside x-show="sidebarOpen"
               x-transition:enter="transition ease-out duration-300 transform"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-300 transform"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               @click.away="sidebarOpen = window.innerWidth >= 1024 ? true : false"
               class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-800 text-white shadow-lg
                      flex flex-col overflow-y-auto lg:relative lg:translate-x-0 lg:flex-shrink-0 lg:w-64">

            <div class="p-6 text-center border-b border-gray-700">
                <h3 class="text-2xl font-bold text-indigo-300">{{ __('Driving Regions') }}</h3>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                @foreach ($allSections as $navSection)
                    {{-- IMPORTANT: Update route to driving.show --}}
                    <a href="{{ route('driving.show', $navSection->id) }}"
                       class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200
                              @if($navSection->id == $section->id) bg-indigo-700 text-white shadow-md @else text-gray-300 hover:bg-gray-700 hover:text-white @endif">
                        <img src="{{ asset($navSection->flag ?? 'images/default-driving-icon.png') }}" alt="{{ $navSection->title }}" class="size-6 rounded-full mr-3 border border-gray-600">
                        <span class="font-medium">{{ $navSection->title }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="p-6 border-t border-gray-700 space-y-3">
                <a href="#" class="block px-4 py-3 bg-indigo-600 text-white text-center font-semibold rounded-xl shadow-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                    {{ __('Driving Guide') }}
                </a>
                <a href="#" class="block px-4 py-3 bg-purple-600 text-white text-center font-semibold rounded-xl shadow-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105">
                    {{ __('Driving Summary') }}
                </a>
            </div>
        </aside>

        {{-- Main Content Area --}}
        <main class="flex-1 p-6 lg:ml-0">
            <div class="max-w-2xl mx-auto">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-900 text-center">
                        {{ __('Questions for') }} <span class="text-indigo-600">{{ $section->title }}</span>
                    </h1>
                    @if ($progress)
                        <button @click="showResetModal = true" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-xl shadow-md hover:bg-red-600 transition-colors">
                            {{ __('Reset Progress') }}
                        </button>
                    @endif
                </div>

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl relative mb-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative mb-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Section Summary Audio Player --}}
                @if ($section->summary_audio_url)
                    <div class="mb-8 p-4 bg-white rounded-2xl shadow-xl border border-gray-200 text-center">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">{{ __('Listen to the summary for') }} {{ $section->title }}</h4>
                        <audio controls class="w-full max-w-md mx-auto rounded-lg shadow-sm">
                            <source src="{{ asset($section->summary_audio_url) }}" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                @endif

                @if ($questions->isEmpty())
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <p class="text-gray-700 text-lg">No questions found for this section yet.</p>
                    </div>
                @else
                    <div class="space-y-10">
                        @foreach ($questions as $question)
                            @php
                                $isCompleted = $progress && $question->id <= $progress->last_question_id;
                                $cardClasses = $isCompleted ? 'bg-gray-100 opacity-70 pointer-events-none' : 'bg-white shadow-2xl';
                            @endphp
                            <div id="question-{{ $question->id }}" class="rounded-3xl p-8 border border-gray-200 relative {{ $cardClasses }}">
                                <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white rounded-t-2xl p-4 -mx-8 -mt-8 mb-6">
                                    <h3 class="text-xl md:text-2xl font-bold">
                                        Question <span class="question-number">{{ $loop->iteration + ($questions->currentPage() - 1) * $questions->perPage() }}</span>:
                                    </h3>
                                </div>
                                <p class="text-gray-800 text-lg mb-6 leading-relaxed">{{ $question->question }}</p>

                                {{-- Quiz Options Form --}}
                                <form class="quiz-form" data-question-id="{{ $question->id }}" data-correct-answer="{{ $question->correct_answer }}">
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    <div class="space-y-4">
                                        @foreach ($question->choices as $choice)
                                            <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer
                                                          transition-all duration-300 ease-in-out bg-white shadow-sm hover:shadow-md
                                                          has-[:checked]:bg-indigo-50 has-[:checked]:border-indigo-500 has-[:checked]:ring-2 has-[:checked]:ring-indigo-500">
                                                <input type="radio" name="selected_answer" value="{{ $choice }}" class="form-radio h-5 w-5 text-indigo-600 focus:ring-indigo-500" {{ $isCompleted ? 'disabled' : '' }}>
                                                <span class="ml-4 text-gray-800 text-base md:text-lg font-medium">{{ $choice }}</span>
                                            </label>
                                        @endforeach
                                    </div>

                                    {{-- Inline status message for "Please select an answer" --}}
                                    <div class="status-message mt-4 text-red-600 font-medium text-sm hidden"></div>

                                    <div class="flex flex-col md:flex-row gap-4 mt-8">
                                        @if ($isCompleted)
                                            <button type="button" class="w-full md:w-auto px-8 py-4 bg-green-500 text-white font-bold rounded-xl shadow-lg
                                                                          pointer-events-none">
                                                Completed!
                                            </button>
                                        @else
                                            <button type="submit" class="check-answer-btn w-full md:w-auto px-8 py-4 bg-gradient-to-r from-indigo-500 to-indigo-700 text-white font-bold rounded-xl shadow-lg
                                                                          hover:from-indigo-600 hover:to-indigo-800 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                                Check Answer
                                            </button>
                                            <button type="button" class="reset-question-btn w-full md:w-auto px-8 py-4 bg-gray-200 text-gray-800 font-bold rounded-xl shadow-md
                                                                          hover:bg-gray-300 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 hidden">
                                                Reset
                                            </button>
                                        @endif
                                    </div>
                                </form>

                                {{-- Feedback Area --}}
                                <div class="feedback-area mt-6 p-6 rounded-2xl border-2 transition-all duration-300 ease-in-out hidden flex items-start space-x-4">
                                    <div class="feedback-icon size-8 flex-shrink-0 flex items-center justify-center text-white rounded-full">
                                        <svg class="w-5 h-5 hidden correct-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <svg class="w-5 h-5 hidden incorrect-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="[http://www.w3.org/2000/svg](http://www.w3.org/2000/svg)">
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

                    {{-- Pagination Links (Now using default) --}}
                    <div class="mt-10 flex justify-center">
                        {{ $questions->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Alpine.js sidebar state management
            window.addEventListener('resize', () => {
                const mainDiv = document.querySelector('[x-data]');
                if (mainDiv && mainDiv.__x) {
                    mainDiv.__x.$data.sidebarOpen = window.innerWidth >= 1024;
                }
            });

            document.querySelectorAll('.quiz-form').forEach(form => {
                const questionCard = form.closest('.bg-white, .bg-gray-100');
                const submitButton = form.querySelector('.check-answer-btn');
                const resetButton = form.querySelector('.reset-question-btn');
                const feedbackArea = questionCard.querySelector('.feedback-area');
                const feedbackMessage = feedbackArea.querySelector('.feedback-message');
                const feedbackIcon = feedbackArea.querySelector('.feedback-icon');
                const correctIcon = feedbackIcon.querySelector('.correct-icon');
                // CORRECTED: Ensure incorrectIcon is properly queried and then hidden
                const incorrectIcon = feedbackIcon.querySelector('.incorrect-icon');
                incorrectIcon.classList.add('hidden'); // Initially hide it

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

                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.classList.remove('hidden');
                    }
                    if (resetButton) {
                        resetButton.classList.add('hidden');
                    }
                };

                // Check if the form is disabled on page load and adjust accordingly
                const isFormDisabled = form.querySelector('input[type="radio"]').disabled;
                if (!isFormDisabled) {
                    resetFeedback();
                }

                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const correctAnswer = this.dataset.correctAnswer;
                    const selectedAnswerInput = this.querySelector('input[name="selected_answer"]:checked');
                    const questionId = this.dataset.questionId;
                    const sectionId = {{ Js::from($section->id) }};

                    statusMessageDiv.classList.add('hidden');

                    if (!selectedAnswerInput) {
                        statusMessageDiv.textContent = 'Please select an answer to check.';
                        statusMessageDiv.classList.remove('hidden');
                        return;
                    }

                    const selectedAnswer = selectedAnswerInput.value;
                    let isCorrect = (selectedAnswer === correctAnswer);

                    feedbackArea.classList.remove('hidden');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.classList.add('hidden');
                    }
                    if (resetButton) {
                        resetButton.classList.remove('hidden');
                    }
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

                        // IMPORTANT: Update fetch URL to driving.save-progress
                        fetch('/driving-courses/save-progress', { // Corrected URL
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                section_id: sectionId,
                                question_id: questionId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log(data.success);
                            }
                        })
                        .catch(error => console.error('Error saving progress:', error));
                    } else {
                        feedbackArea.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                        feedbackIcon.classList.add('bg-red-500');
                        incorrectIcon.classList.remove('hidden');
                        feedbackMessage.textContent = 'Incorrect. Take another look!';
                        selectedAnswerInput.closest('label').classList.add('bg-red-100', 'border-red-500');

                        correctAnswerDisplay.textContent = `The correct answer was: "${correctAnswer}"`;
                        correctAnswerDisplay.classList.remove('hidden');

                        allLabels.forEach(label => {
                            if (label.querySelector('input[name="selected_answer"]').value === correctAnswer) {
                                label.classList.add('bg-green-100', 'border-green-500');
                            }
                        });
                    }
                });

                if (resetButton) {
                    resetButton.addEventListener('click', resetFeedback);
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
{{-- End of resources/views/frontend/driving-questions.blade.php --}}
