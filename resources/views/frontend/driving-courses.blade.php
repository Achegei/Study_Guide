<!-- resources/views/frontend/driving-courses.blade.php -->
@php
    // Use the new UserDrivingProgress model if you created one
    use App\Models\UserDrivingProgress;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
    // Fetch user driving progress specific to driving sections
    $userDrivingProgress = $user ? UserDrivingProgress::where('user_id', $user->id)->get()->keyBy('driving_section_id') : collect();
@endphp

<x-app-layout>
   <x-slot name="header">
        <!-- This container centers the header content on the page -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Select a Driving Course Region') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($sections as $section) {{-- $sections will be DrivingSection objects --}}
                @php
                    // Get progress from the new userDrivingProgress collection
                    $progress = $userDrivingProgress->get($section->id);
                    $questionsCount = $section->questions()->count();
                    // Ensure this route name matches your new driving course routes
                    $resumeLink = route('driving.show', ['id' => $section->id]);

                    if ($progress) {
                        // Ensure 'questions()' method is defined on DrivingSection and queries correctly
                        $questionsBefore = $section->questions()->where('id', '<=', $progress->last_question_id)->count();
                        $questionsPerPage = 10; // Make sure this matches controller logic
                        $startPage = (int) ceil($questionsBefore / $questionsPerPage);
                        if ($questionsBefore < $questionsCount) {
                            // Link to the correct page for resuming
                            $resumeLink = route('driving.show', ['id' => $section->id, 'page' => $startPage]);
                        }
                    }
                @endphp
                <a href="{{ $resumeLink }}" class="block">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex items-center space-x-5 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <div class="w-16 h-16 flex-shrink-0">
                            {{-- Assuming your DrivingSection model has a 'flag' or 'icon' attribute --}}
                            <img src="{{ asset($section->flag ?? 'images/default-driving-icon.png') }}" alt="Icon of {{ $section->title }}" class="w-full h-full object-cover rounded-full border border-gray-200">
                        </div>

                        <div>
                            <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                {{ $section->title }}
                            </h5>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ ucfirst($section->type ?? 'Driving Course') }} {{-- Adjust as per your DrivingSection properties --}}
                            </p>
                            @if ($progress && $questionsBefore < $questionsCount)
                                <span class="text-sm text-indigo-500 font-semibold mt-2 block">{{ __('Resume from Q') }} {{ $questionsBefore + 1 }}</span>
                            @elseif ($progress)
                                <span class="text-sm text-green-500 font-semibold mt-2 block">{{ __('Completed') }}</span>
                            @else
                                <span class="text-sm text-gray-400 font-semibold mt-2 block">{{ __('Start Quiz') }}</span>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
