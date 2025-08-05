<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Road to Citizenship Canada' }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ✅ Top Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center gap-2 md:gap-0">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                <span class="text-xl font-bold text-red-600">RoadToCitizenship.ca</span>
            </div>
            <p class="text-center md:text-left text-base md:text-lg font-bold text-gray-700">
                Your #1 Resource for the Canadian Citizenship Exam
            </p>
            <a href="{{ route('interac.purchase.submit') }}">
                <button class="bg-red-600 hover:bg-red-700 text-white text-sm px-5 py-2 rounded-full transition">
                    Subscribe
                </button>
            </a>
        </div>
    </header>

    <!-- ✅ Navigation -->
    <nav class="bg-red-600 text-white sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <ul class="hidden md:flex gap-6 font-semibold">
                <li><a href="/" class="hover:underline">Home</a></li>
                <li><a href="{{ route('purchase') }}" class="hover:underline">Get Access</a></li>
                <li><a href="{{ route('testimonials') }}" class="hover:underline">Learner Feedback</a></li>
                <li><a href="{{ route('free-test') }}" class="hover:underline">Free Practice Tests</a></li>
                <li><a href="{{ route('blogs.index') }}" class="hover:underline">Learn About Citizenship</a></li>
                <li><a href="{{ route('tips') }}" class="hover:underline">Study Tips</a></li>
                <li><a href="{{ route('about') }}" class="hover:underline">About Us</a></li>
            </ul>
            <button @click="open = !open" class="md:hidden focus:outline-none">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <!-- ✅ Mobile Dropdown -->
        <div x-show="open" x-transition class="md:hidden px-4 pb-4">
            <ul class="space-y-2">
                <li><a href="/" class="block py-1">Home</a></li>
                <li><a href="{{ route('purchase') }}" class="block py-1">Get Access</a></li>
                <li><a href="{{ route('testimonials') }}" class="block py-1">Learner Feedback</a></li>
                <li><a href="{{ route('free-test') }}" class="block py-1">Free Practice Tests</a></li>
                <li><a href="{{ route('blogs.index') }}" class="block py-1">Learn About Citizenship</a></li>
                <li><a href="{{ route('tips') }}" class="block py-1">Study Tips</a></li>
                <li><a href="{{ route('about') }}" class="block py-1">About Us</a></li>
            </ul>
        </div>
    </nav>

    <!-- ✅ Main Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- ✅ Footer Top -->
    <footer class="bg-gray-800 text-white text-sm py-10">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between gap-6">
            <div class="flex flex-wrap gap-4">
                <a href="#" class="hover:underline">Privacy</a>
                <a href="#" class="hover:underline">Cookie Policy</a>
                <a href="#" class="hover:underline">Terms</a>
                <a href="#" class="hover:underline">Copyright</a>
                <a href="#" class="hover:underline">Help</a>
                <a href="{{ route('about') }}" class="hover:underline">About Us</a>
            </div>
        </div>
    </footer>

    <!-- ✅ Footer Bottom -->
    <footer class="bg-gray-900 text-gray-400 text-xs py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            &copy; 2011–{{ now()->year }} <span class="text-white">RoadToCitizenship.ca</span>. All Rights Reserved.
        </div>
    </footer>

    <!-- ✅ Back to Top Button -->
    <div id="backToTopBtn" class="hidden">
        <button onclick="scrollToTop()" class="fixed bottom-5 right-5 z-50 bg-[#FF2D20] text-white p-3 rounded-full shadow-lg hover:bg-red-600 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="2" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
        </button>
    </div>

    <!-- ✅ Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>
