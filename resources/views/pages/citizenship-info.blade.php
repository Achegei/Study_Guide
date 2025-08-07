@extends('layouts.guest')

@section('content')
    <!--
        This page has been redesigned to be more modern and visually appealing.
        - Each blog post is now a card with a shadow and rounded corners.
        - Hover effects have been added to make the cards more interactive.
        - The typography is clean and well-spaced, focusing on readability.
        - The pagination links are styled to match the new look.
    -->
    <section class="bg-gray-50 py-12 sm:py-20">
        <div class="max-w-4xl mx-auto px-4">
            <header class="text-center mb-12 sm:mb-16">
                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight">
                    Canadian Citizenship Blog & Tips
                </h1>
                <p class="mt-3 text-lg text-gray-600 max-w-2xl mx-auto">
                    Stay informed and boost your knowledge with our latest articles on the citizenship test, Canadian history, and essential study tips.
                </p>
            </header>

            <div class="space-y-8">
                @foreach ($blogs as $blog)
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">
                            {{ $blog->title }}
                        </h2>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                        <a href="{{ route('citizenship-info.show', $blog->slug) }}" class="inline-flex items-center mt-4 text-blue-600 font-semibold hover:text-blue-800 transition-colors duration-200">
                            Read Full Article
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
@endsection
