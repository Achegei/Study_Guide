<!-- resources/views/frontend/courses.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Select a Region') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($sections as $section)
                <a href="{{ route('courses.show', $section->id) }}" class="block">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300 h-full text-center">
                        <img src="{{ asset($section->flag_path) }}" alt="{{ $section->title }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h5 class="text-lg font-semibold mb-1">{{ $section->title }}</h5>
                            <p class="text-gray-600">{{ ucfirst($section->type) }} - {{ $section->capital }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
