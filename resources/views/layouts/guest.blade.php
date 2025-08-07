<!--
    This code has been updated to improve spacing and maintain mobile responsiveness.
    - Added margin-right to the logo container to create space between it and the nav links.
    - Increased the gap between navigation links.
    - Confirmed that the mobile "pancake" collapse menu remains fully functional.
    - The professional navy blue and bright yellow color scheme is maintained.
-->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Prepify Canada' }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        /* Optional custom styles for better visual separation */
        .dropdown-menu {
            min-width: 12rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .submenu-menu {
            top: 0;
            left: 100%;
        }
        /* Custom colors to be used with Tailwind classes */
        .bg-navy-blue { background-color: #0A192F; }
        .text-navy-blue { color: #0A192F; }
        .bg-bright-yellow { background-color: #FCD34D; }
        .text-bright-yellow { color: #FCD34D; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ✅ Combined Header & Navigation -->
    <nav class="bg-navy-blue text-white sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo section with added right margin for spacing -->
            <div class="flex items-center gap-3 mr-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                <span class="text-xl font-bold text-bright-yellow hidden md:block">Prepify Canada</span>
            </div>

            <!-- Navigation Links and Login Button (Desktop) -->
            <ul class="hidden md:flex items-center gap-6 font-semibold">
                <li><a href="/" class="hover:text-bright-yellow">Home</a></li>
                
                <!-- START: Nested Dropdown Menu -->
                <li class="relative" x-data="{ open: false, openSub: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <a href="{{ route('purchase') }}" class="hover:text-bright-yellow inline-flex items-center">
                        Exams & Certifications
                        <svg class="w-4 h-4 ml-1 transform transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                    
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute top-full mt-2 w-56 bg-white rounded-md dropdown-menu z-10">
                        <ul class="py-2">
                            <li>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Canadian Citizenship Test
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Driving license
                                </a>
                            </li>
                            
                            <li class="relative" @mouseenter="openSub = true" @mouseleave="openSub = false">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 inline-flex justify-between items-center w-full">
                                    <span>Trade service Exams</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>

                                <div x-show="openSub"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute submenu-menu mt-2 bg-white rounded-md dropdown-menu z-20">
                                    <ul class="py-2">
                                        <li>
                                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                                Red Seal by Trade
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- END: Nested Dropdown Menu -->
                
                <li><a href="{{ route('free-test') }}" class="hover:text-bright-yellow">Prep Guides & Resources</a></li>
                <li><a href="{{ route('blogs.index') }}" class="hover:text-bright-yellow">News & Updates</a></li>
                <li><a href="{{ route('testimonials') }}" class="hover:text-bright-yellow">Our Community</a></li>
                <li>
                    <a href="{{ route('login') }}">
                        <button class="bg-bright-yellow hover:bg-yellow-400 text-navy-blue text-sm font-bold px-5 py-2 rounded-full transition">
                            Login
                        </button>
                    </a>
                </li>
            </ul>
            
            <!-- Mobile Menu Toggle Button -->
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
                <li><a href="{{ route('purchase') }}" class="block py-1">Exams & Certifications</a></li>
                <li><a href="{{ route('free-test') }}" class="block py-1">Prep Guides & Resources</a></li>
                <li><a href="{{ route('blogs.index') }}" class="block py-1">News & Updates</a></li>
                <li><a href="{{ route('testimonials') }}" class="block py-1">Our Community</a></li>
                <li><a href="{{ route('login') }}" class="block py-1">Login</a></li>
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
            &copy;{{ now()->year }} <span class="text-white">Prepify Canada</span>. All Rights Reserved.
        </div>
    </footer>

    <!-- ✅ Back to Top Button -->
    <div id="backToTopBtn" class="hidden">
        <button onclick="scrollToTop()" class="fixed bottom-5 right-5 z-50 bg-bright-yellow text-navy-blue p-3 rounded-full shadow-lg hover:bg-yellow-400 transition duration-300">
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
