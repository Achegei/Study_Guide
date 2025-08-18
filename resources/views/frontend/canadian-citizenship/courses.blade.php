{{-- resources/views/frontend/canadian-citizenship/courses.blade.php --}}
@php
    use App\Models\UserProgress;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    // Fetch user progress for citizenship courses.
    $userProgress = $user ? UserProgress::where('user_id', $user->id)->get()->keyBy('course_section_id') : collect();
@endphp

<x-app-layout>
   <x-slot name="header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Select a Region') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($sections as $section)
                @php
                    $progress = $userProgress->get($section->id);
                    $questionsCount = $section->questions()->count();
                    $quizLink = route('courses.show', ['id' => $section->id]);

                    if ($progress) {
                        $questionsBefore = $section->questions()->where('id', '<=', $progress->last_question_id)->count();
                        $startPage = (int) ceil($questionsBefore / 10);
                        if ($questionsBefore < $questionsCount) {
                            $quizLink = route('courses.show', ['id' => $section->id, 'page' => $startPage]);
                        }
                    }

                    // Define the reading resources link
                    $readingResourcesLink = route('courses.reading-resources', ['section' => $section->id]);
                @endphp
                
                {{-- Only display the active card if the user can view this specific section --}}
                @can('view', $section) {{-- ✅ Policy check for displaying the active card --}}
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex flex-col justify-between transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <div class="flex items-center space-x-5 mb-4">
                        <div class="w-16 h-16 flex-shrink-0">
                            <img src="{{ asset($section->flag) }}" alt="Flag of {{ $section->title }}" class="w-full h-full object-cover rounded-full border border-gray-200">
                        </div>
                        
                        <div>
                            <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                {{ $section->title }}
                            </h5>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ ucfirst($section->type) }} - {{ $section->capital }}
                            </p>
                        </div>
                    </div>

                    {{-- Progress Status --}}
                    @if ($progress && $questionsBefore < $questionsCount)
                        <span class="text-sm text-indigo-500 font-semibold mb-4 block">{{ __('Resume from Q') }} {{ $questionsBefore + 1 }}</span>
                    @elseif ($progress)
                        <span class="text-sm text-green-500 font-semibold mb-4 block">{{ __('Completed') }}</span>
                    @else
                        <span class="text-sm text-gray-400 font-semibold mb-4 block">{{ __('Start Quiz') }}</span>
                    @endif

                    <div class="mt-auto flex flex-col space-y-2">
                        <a href="{{ $quizLink }}" class="w-full text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors duration-200">
                            {{ __('Go to Quiz') }}
                        </a>
                        {{-- Conditionally display Reading Resources button (always active if card is active) --}}
                        <a href="{{ $readingResourcesLink }}" class="w-full text-center px-4 py-2 border border-indigo-500 text-indigo-500 rounded-md hover:bg-indigo-50 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 transition-colors duration-200">
                            {{ __('Reading Resources') }}
                        </a>
                    </div>
                </div>
                @else
                    {{-- Display a disabled, greyed-out card if the user has no access --}}
                    <div class="bg-gray-200 rounded-xl shadow-md overflow-hidden p-5 flex flex-col items-center space-x-5 text-center cursor-not-allowed opacity-60">
                         <div class="w-16 h-16 flex-shrink-0 opacity-50">
                            <img src="{{ asset($section->flag) }}" alt="Flag of {{ $section->title }}" class="w-full h-full object-cover rounded-full border border-gray-200 grayscale">
                        </div>
                        <div>
                            <h5 class="text-lg font-bold text-gray-600 leading-tight">
                                {{ $section->title }}
                            </h5>
                            <p class="text-sm text-gray-400 mt-1">
                                {{ ucfirst($section->type) }} - {{ $section->capital }}
                            </p>
                            <span class="text-sm text-red-500 font-semibold mt-2 block">{{ __('Access Denied') }}</span>
                        </div>
                        <div class="mt-auto flex flex-col space-y-2 w-full">
                            <button disabled class="w-full text-center px-4 py-2 bg-gray-400 text-white rounded-md cursor-not-allowed">
                                {{ __('Go to Quiz (Locked)') }}
                            </button>
                            <button disabled class="w-full text-center px-4 py-2 border border-gray-400 text-gray-500 rounded-md cursor-not-allowed">
                                {{ __('Reading Resources (Locked)') }}
                            </button>
                        </div>
                    </div>
                @endcan
            @endforeach
        </div>
    </div>
</x-app-layout>
