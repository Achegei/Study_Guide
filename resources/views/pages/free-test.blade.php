@extends('layouts.guest')

@section('content')
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-10">
            Free Canadian Citizenship Test Practice
        </h1>

        <!-- Rectangle 1: Free Chapter Test -->
        <div class="bg-red-50 p-6 rounded-xl shadow-md space-y-4 text-left mb-10">
            <h2 class="text-xl font-bold text-gray-900">📘 Free Chapter Test</h2>
            <p class="text-gray-700">
                The official test study guide “Discover Canada” has ten chapters and contains a lot of facts and dates.
                According to the federal government, you can be tested on any section of the study guide, so you must memorize all the chapters.
            </p>
            <p class="text-gray-700">
                We find that the best way to memorize the Canadian citizenship test study guide is one chapter at a time.
                So we offer what we call “Chapter Tests.” A Chapter Test is similar to the real official citizenship test,
                but specific to a chapter. You read the chapter first, then you take the corresponding Chapter Tests,
                as much as you need, until you get a perfect score. You repeat the process for the next chapters.
            </p>
            <p class="text-gray-700">
                Here you can take for free one of our Chapter Tests. Our
                <a href="#payment" class="text-blue-600 hover:underline font-semibold">Complete Online Training Program</a>
                will train you on all chapters, at your own pace, with full test scores, detailed explanations, and Chapter Tests progress report.
            </p>
            <p class="text-gray-800 font-medium">
                This Free Chapter Test enables you to try 20 questions from Chapter One of the Study Guide.
            </p>
            <div class="mt-4">
                <a href="#chapter-test" class="inline-block bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-full font-semibold shadow transition">
                    Start Now
                </a>
            </div>
        </div>

        <!-- Rectangle 2: Free Simulation Test -->
        <div class="bg-blue-50 p-6 rounded-xl shadow-md space-y-4 text-left">
            <h2 class="text-xl font-bold text-blue-700">🧪 Free Simulation Test</h2>
            <p class="text-gray-700">
                Our Simulation Tests replicate precisely the format of the real official citizenship test.
                They randomly draw questions from every chapter, and they are timed.
            </p>
            <p class="text-gray-700">
                Here you can take for free one of our Simulation Tests. Our
                <a href="#payment" class="text-blue-600 hover:underline font-semibold">Complete Online Training Program</a>
                offers unlimited Simulation Tests, with full test scores, detailed explanations, and Simulation Tests progress report.
            </p>
            <p class="text-gray-800 font-medium">
                This is a simulation of the official Canadian Citizenship Test. Exact same format as the official test.
            </p>
            <div class="mt-4 flex flex-col sm:flex-row gap-4">
                <a href="#simulation-test" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold shadow transition">
                    Start Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
