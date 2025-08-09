<!-- resources/views/frontend/courses.blade.php -->

<x-app-layout>
   <x-slot name="header">
        <!-- This container centers the header content on the page -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Select a Region') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($sections as $section)
                <a href="{{ route('courses.show', $section->id) }}" class="block">
                    <!-- Refined card design with better spacing and hover effect -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-5 flex items-center space-x-5 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <!-- Slightly larger, rounded flag icon for more impact -->
                        <div class="w-16 h-16 flex-shrink-0">
                            <img src="{{ asset($section->flag_path) }}" alt="Flag of {{ $section->title }}" class="w-full h-full object-cover rounded-full border border-gray-200">
                        </div>
                        
                        <!-- Text content with clearer hierarchy -->
                        <div>
                            <h5 class="text-lg font-bold text-gray-900 leading-tight">
                                {{ $section->title }}
                            </h5>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ ucfirst($section->type) }} - {{ $section->capital }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
