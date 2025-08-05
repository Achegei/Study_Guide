@extends('layouts.guest')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">
            Canadian Citizenship Blog & Tips
        </h1>

        @foreach ($blogs as $blog)
        <div class="mb-10 border-b pb-6">
            <h2 class="text-xl font-bold text-red-700">{{ $blog->title }}</h2>
            <p class="text-gray-600 mt-2">{{ $blog->excerpt }}</p>
            <a href="{{ route('blogs.show', $blog->slug) }}" class="inline-block mt-3 text-sm text-blue-600 hover:underline">
                Read Full Article →
            </a>
        </div>
    @endforeach


        <div class="mt-8">{{ $blogs->links() }}</div>
    </div>
</section>
@endsection
