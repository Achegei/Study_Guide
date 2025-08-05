@extends('layouts.guest')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4">
                <!-- 💬 Leave a Comment -->
<!--<div class="max-w-xl mx-auto mb-10">
    <h3 class="text-xl font-semibold text-center text-gray-800 mb-4">Leave a Comment ↓</h3>

    <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required class="w-full border px-4 py-2 rounded" />
        <input type="text" name="location" placeholder="Your Location (optional)" class="w-full border px-4 py-2 rounded" />
        <textarea name="content" rows="5" placeholder="Your Testimonial" required class="w-full border px-4 py-2 rounded"></textarea>

        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full font-semibold">
            Submit Testimonial
        </button>
    </form>

    @if(session('success'))
        <p class="text-green-600 mt-3 text-center font-medium">{{ session('success') }}</p>
    @endif
</div> -->

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-10">Customer Testimonials</h1>

    @if ($testimonials->total() > 0)
            <div class="space-y-8">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-gray-50 p-6 rounded-lg shadow">
                        <div class="flex items-start gap-4">
                            <img src="{{ asset($testimonial->avatar ?? 'image/default-avatar.png') }}"
                                 alt="{{ $testimonial->name }}"
                                 class="w-16 h-16 rounded-full object-cover">
                            
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $testimonial->name }}</h3>
                                    @if ($testimonial->location)
                                        <span class="text-sm text-gray-500">from {{ $testimonial->location }}</span>
                                    @endif
                                </div>
                                <p class="text-gray-700 mt-2 whitespace-pre-line">{{ $testimonial->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $testimonials->links() }}
            </div>
        @else
            <p class="text-center text-gray-600">No testimonials available yet.</p>
        @endif
    </div>
            <!-- 💬 Leave a Comment -->
<div class="max-w-xl mx-auto mb-10">
    <h3 class="text-xl font-semibold text-center text-gray-800 mb-4">Leave a Comment ↓</h3>

    <form action="{{ route('testimonials.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required class="w-full border px-4 py-2 rounded" />
        <input type="text" name="location" placeholder="Your Location (optional)" class="w-full border px-4 py-2 rounded" />
        <textarea name="content" rows="5" placeholder="Your Testimonial" required class="w-full border px-4 py-2 rounded"></textarea>

        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-full font-semibold">
            Submit Testimonial
        </button>
    </form>

    @if(session('success'))
        <p class="text-green-600 mt-3 text-center font-medium">{{ session('success') }}</p>
    @endif
</div>

</section>
@endsection
