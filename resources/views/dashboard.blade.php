{{ __('Dashboard') }}
Available Courses
@if ($courses->isEmpty())
No courses are currently available. Please check back later!

@else
@foreach ($courses as $course)
{{ $course->title }}
{{ Str::limit($course->description, 100) }}

View Course
@endforeach
@endif