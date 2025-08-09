@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">Quiz Results</h1>

    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <p class="text-2xl font-semibold">Your Score: {{ $score }} / {{ $totalQuestions }}</p>
    </div>

    @foreach($results as $result)
        @php
            $isCorrect = $result['is_correct'];
            $questionText = $result['question'];
            $statusClass = $isCorrect ? 'bg-green-100 border-green-400' : 'bg-red-100 border-red-400';
            $statusText = $isCorrect ? 'Correct!' : 'Incorrect.';
        @endphp

        <div class="bg-white p-6 rounded-lg shadow-md mb-4 border-l-4 {{ $statusClass }}">
            <p class="text-lg font-bold mb-2">{{ $questionText }}</p>
            <p class="text-md font-semibold {{ $isCorrect ? 'text-green-600' : 'text-red-600' }}">
                {{ $statusText }}
            </p>
        </div>
    @endforeach

    <a href="{{ route('free-quiz.show') }}" class="inline-block bg-gray-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 mt-4">
        Try Again
    </a>
</div>
@endsection