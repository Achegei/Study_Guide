{{-- resources/views/frontend/questions.blade.php --}}
<x-app-layout>
    {{-- No header slot here, as the content will be managed by the main layout below --}}

    {{-- Main container for the layout, with Alpine.js for sidebar toggle --}}
    <div class="flex min-h-screen bg-gray-100" x-data="{ sidebarOpen: window.innerWidth >= 1024 }"> {{-- sidebarOpen true by default on large screens --}}

        {{-- Mobile Hamburger Button --}}
        <button @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden fixed top-4 left-4 z-50 p-3 bg-blue-600 text-white rounded-full shadow-lg
                       transition-all duration-300 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
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
               @click.away="sidebarOpen = window.innerWidth >= 1024 ? true : false" {{-- Close on click outside on mobile, keep open on desktop --}}
               class="fixed inset-y-0 left-0 z-40 w-64 bg-gray-800 text-white shadow-lg
                      flex flex-col overflow-y-auto lg:relative lg:translate-x-0 lg:flex-shrink-0 lg:w-64">

            <div class="p-6 text-center border-b border-gray-700">
                <h3 class="text-2xl font-bold text-blue-300">{{ __('Regions') }}</h3>
            </div>

            <nav class="flex-1 p-4 space-y-2">
                @foreach ($allSections as $navSection)
                    <a href="{{ route('courses.show', $navSection->id) }}"
                       class="flex items-center px-4 py-2 rounded-lg transition-colors duration-200
                              @if($navSection->id == $section->id) bg-blue-700 text-white shadow-md @else text-gray-300 hover:bg-gray-700 hover:text-white @endif">
                        <img src="{{ asset($navSection->flag) }}" alt="{{ $navSection->title }}" class="size-6 rounded-full mr-3 border border-gray-600">
                        <span class="font-medium">{{ $navSection->title }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="p-6 border-t border-gray-700 space-y-3">
                <a href="#" class="block px-4 py-2 bg-blue-600 text-white text-center font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-200">
                    {{ __('Discover Guide') }}
                </a>
                <a href="#" class="block px-4 py-2 bg-purple-600 text-white text-center font-semibold rounded-lg shadow-md hover:bg-purple-700 transition-colors duration-200">
                    {{ __('Summary') }}
                </a>
            </div>
        </aside>

        {{-- Main Content Area --}}
        <main class="flex-1 p-6 lg:ml-0">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    {{ __('Questions for') }} <span class="text-blue-600">{{ $section->title }}</span>
                </h1>

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- ✅ Section Summary Audio Player (Moved to top) --}}
                @if ($section->summary_audio_url)
                    <div class="mb-8 p-4 bg-gray-200 rounded-xl shadow-md border border-gray-300 text-center">
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
                            <div id="question-{{ $question->id }}" class="bg-white shadow-xl rounded-2xl p-8 border border-gray-200 relative">
                                <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6">
                                    Question {{ $loop->iteration + ($questions->currentPage() - 1) * $questions->perPage() }}:
                                </h3>
                                <p class="text-gray-700 text-lg mb-6">{{ $question->question }}</p>

                                {{-- Individual Audio Player Removed --}}
                                {{-- @if ($question->audio_url)
                                    <div class="mt-4 mb-6 p-2 bg-blue-50 rounded-xl shadow-sm border border-blue-200">
                                        <audio controls class="w-full">
                                            <source src="{{ asset($question->audio_url) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                @endif --}}

                                {{-- Quiz Options Form --}}
                                <form class="quiz-form" data-question-id="{{ $question->id }}" data-correct-answer="{{ $question->correct_answer }}">
                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    <div class="space-y-4">
                                        @foreach ($question->choices as $choice)
                                            <label class="flex items-center p-4 border border-gray-300 rounded-xl cursor-pointer transition-all duration-200 ease-in-out hover:bg-blue-50 hover:border-blue-400">
                                                <input type="radio" name="selected_answer" value="{{ $choice }}" class="form-radio h-5 w-5 text-blue-600 focus:ring-blue-500">
                                                <span class="ml-4 text-gray-800 text-base md:text-lg">{{ $choice }}</span>
                                            </label>
                                        @endforeach
                                    </div>

                                    {{-- Inline status message for "Please select an answer" --}}
                                    <div class="status-message mt-4 text-red-600 font-medium hidden"></div>

                                    <div class="flex flex-col md:flex-row gap-4 mt-8">
                                        {{-- Ensure this button HTML is present and not commented out --}}
                                        <button type="submit" class="check-answer-btn w-full md:w-auto px-8 py-4 bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold rounded-xl shadow-lg hover:from-blue-600 hover:to-blue-800 transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                            Check Answer
                                        </button>
                                        <button type="button" class="reset-question-btn w-full md:w-auto px-8 py-4 bg-gray-200 text-gray-800 font-bold rounded-xl shadow-md hover:bg-gray-300 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 hidden">
                                            Reset
                                        </button>
                                    </div>
                                </form>

                                {{-- Feedback Area --}}
                                <div class="feedback-area mt-6 p-6 rounded-xl border-2 transition-all duration-300 ease-in-out hidden">
                                    <p class="feedback-message font-extrabold text-lg md:text-xl mb-2"></p>
                                    <p class="correct-answer-display text-base md:text-lg font-medium hidden"></p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination Links --}}
                    <div class="mt-10 flex justify-center">
                        {{ $questions->links() }}
                    </div>
                @endif
            </div>
        </main>
    </div>

    @push('scripts')
    <script>
        console.log('questions.blade.php script is running!'); // Debugging log

        document.addEventListener('DOMContentLoaded', function () {
            // Alpine.js sidebar state management
            // Ensure Alpine.js is loaded and initialized for this to work.
            // The x-data="{ sidebarOpen: window.innerWidth >= 1024 }" on the div handles initial state.
            window.addEventListener('resize', () => {
                const mainDiv = document.querySelector('[x-data]');
                if (mainDiv && mainDiv.__alpine) { // Check if Alpine is initialized on the element
                    mainDiv.__alpine.sidebarOpen = window.innerWidth >= 1024;
                }
            });

            document.querySelectorAll('.quiz-form').forEach(form => {
                const submitButton = form.querySelector('.check-answer-btn');
                const resetButton = form.querySelector('.reset-question-btn');
                const feedbackArea = form.closest('.bg-white').querySelector('.feedback-area');
                const feedbackMessage = feedbackArea.querySelector('.feedback-message');
                const correctAnswerDisplay = feedbackArea.querySelector('.correct-answer-display');
                const statusMessageDiv = form.querySelector('.status-message');
                const radioInputs = form.querySelectorAll('input[type="radio"]');
                const allLabels = form.querySelectorAll('label');

                const resetFeedback = () => {
                    feedbackArea.classList.add('hidden');
                    feedbackArea.classList.remove('bg-green-100', 'border-green-400', 'text-green-700', 'bg-red-100', 'border-red-400', 'text-red-700');
                    feedbackMessage.textContent = '';
                    correctAnswerDisplay.classList.add('hidden');
                    correctAnswerDisplay.textContent = '';
                    statusMessageDiv.classList.add('hidden');
                    statusMessageDiv.textContent = '';

                    allLabels.forEach(label => {
                        label.classList.remove('border-green-500', 'bg-green-50', 'border-red-500', 'bg-red-50', 'border-blue-500', 'bg-blue-50');
                        label.classList.add('border-gray-300', 'hover:bg-blue-50', 'hover:border-blue-400');
                    });

                    radioInputs.forEach(radio => {
                        radio.disabled = false;
                        radio.checked = false;
                    });

                    submitButton.disabled = false;
                    submitButton.classList.remove('hidden'); // Ensure submit button is visible
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

                    allLabels.forEach(label => {
                        label.classList.remove('hover:bg-blue-50', 'hover:border-blue-400', 'border-gray-300');
                    });

                    if (isCorrect) {
                        feedbackArea.classList.add('bg-green-100', 'border-green-400', 'text-green-700');
                        feedbackMessage.textContent = 'Correct! Well done.';
                        selectedAnswerInput.closest('label').classList.add('border-green-500', 'bg-green-50');
                    } else {
                        feedbackArea.classList.add('bg-red-100', 'border-red-400', 'text-red-700');
                        feedbackMessage.textContent = 'Incorrect. Try again!';
                        selectedAnswerInput.closest('label').classList.add('border-red-500', 'bg-red-50');

                        correctAnswerDisplay.textContent = `The correct answer was: "${correctAnswer}"`;
                        correctAnswerDisplay.classList.remove('hidden');

                        allLabels.forEach(label => {
                            if (label.querySelector('input[name="selected_answer"]').value === correctAnswer) {
                                label.classList.add('border-green-500', 'bg-green-50');
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
