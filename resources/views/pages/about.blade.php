@extends('layouts.guest')

@section('content')

<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2" data-aos="fade-right">
            <img src="{{ asset('images/canadian-flag.png') }}" alt="Studying" class="rounded-xl shadow-xl w-full h-auto">
        </div>
        <div class="lg:w-1/2 space-y-5 text-center lg:text-left" data-aos="fade-left">
            <h2 class="text-4xl font-extrabold text-red-600">About Us</h2>
            <p class="text-gray-800 text-lg">We are an <strong>independent Canadian preparation platform</strong> dedicated to helping newcomers succeed in Canada.</p>
            <p class="text-gray-600">Our mission is to provide affordable, accessible, and easy-to-use practice tools for the Canadian Citizenship Test and Provincial Learner’s Driving Tests. We help newcomers gain confidence and achieve success by offering study materials in clear, simple language, available online.</p>
            <p class="text-gray-600">Please note: We are not affiliated with IRCC or any provincial governments. We provide independent preparation resources only.</p>
        </div>
    </div>
</section>

<section class="bg-red-50 py-20">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <div class="space-y-5" data-aos="fade-up">
            <h3 class="text-3xl font-bold text-red-700">Test Preparation You Can Trust</h3>
            <ul class="list-disc list-inside text-gray-700 text-base space-y-2">
                <li>Trusted by over <strong>350,000+</strong> people since 2011.</li>
                <li>Our materials are continuously improved based on client feedback.</li>
                <li>We accurately reflect the full <em>“Discover Canada”</em> study guide.</li>
                <li><strong>100% money-back guarantee</strong> (conditions apply)</li>
            </ul>
        </div>
        <div class="flex justify-center" data-aos="zoom-in">
            <img src="{{ asset('images/road-signs.png') }}" alt="Canadian Flag" class="w-44 h-auto">
        </div>
    </div>
</section>

<section class="bg-blue-50 py-20">
    <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
        <div class="flex justify-center" data-aos="zoom-in">
            <img src="{{ asset('images/ottawa.png') }}" alt="Proudly Canadian" class="w-44 h-auto">
        </div>
        <div class="space-y-5 text-center md:text-left" data-aos="fade-left">
            <h3 class="text-3xl font-bold text-blue-800">Proudly Canadian</h3>
            <p class="text-lg text-gray-800"><strong>100% Canadian Owned and Operated</strong></p>
        </div>
    </div>
</section>

<section class="bg-gray-400 py-16">
    <div class="max-w-6xl mx-auto px-4 text-center space-y-6" data-aos="fade-up">
        <h3 class="text-2xl font-semibold text-white">Connect with us</h3>
        <div class="flex justify-center gap-8">
            <a href="#" class="text-white hover:text-red-500 transition"><i class="fab fa-facebook fa-2x"></i></a>
            <a href="#" class="text-white hover:text-red-500 transition"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#" class="text-white hover:text-red-500 transition"><i class="fab fa-youtube fa-2x"></i></a>
        </div>
    </div>
</section>

@endsection