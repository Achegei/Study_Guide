<!--
    This code has been updated to improve spacing and maintain mobile responsiveness.
    - Removed redundant Alpine.js script to prevent conflicts with Livewire.
    - Confirmed all other scripts and Livewire directives are in the correct order.
-->
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __('IQRA Canada Test Prep') }}</title>

    <!-- ✅ Use Vite for Tailwind + App Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        /* Custom scrollbar for the chat widget */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* ✅ New: Enlarge base font size for mobile devices */
        @media (max-width: 767px) { /* Targets screens smaller than Tailwind's 'md' breakpoint */
            body {
                font-size: 1.125rem; /* Equivalent to Tailwind's text-lg (18px) */
            }
            /* You might need to adjust specific elements if they have conflicting smaller font sizes */
            /* For example, to also enlarge small text in nav for mobile: */
            .md\:hidden .text-sm { /* targets mobile dropdown nav links */
                font-size: 1.125rem; /* Adjust if needed */
            }
        }
    </style>

    <!-- ✅ PWA: Web App Manifest Link -->
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- ✅ PWA: Apple Specific Meta Tags (for iOS "Add to Home Screen") -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="IQRA Test Prep">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/icons/apple-icon-180x180.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/images/icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('/images/icons/apple-icon-167x167.png') }}">

    <!-- ✅ Optional: Fallback -->
    <link rel="apple-touch-icon" href="{{ asset('/images/icons/apple-icon.png') }}">

    <!-- ✅ PWA: Theme color for browser UI (address bar/toolbar) -->
    <meta name="theme-color" content="#FCD34D">

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ✅ Combined Header & Navigation -->
    <nav class="bg-navy-blue text-white sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo section with added right margin for spacing -->
            <div class="flex items-center gap-3 mr-6">
                <img src="{{ asset('images/logo.png') }}" alt="{{ __('Logo') }}" class="h-10">
                <span class="text-xl font-bold text-bright-yellow hidden md:block">{{ __('IQRA Canada Test Prep') }}</span>
            </div>

            <!-- Navigation Links and Login Button (Desktop) -->
            <ul class="hidden md:flex items-center gap-6 font-semibold">
                <li><a href="/" class="hover:text-bright-yellow">{{ __('Home') }}</a></li>
                <li><a href="{{ route('purchase') }}" class="hover:text-bright-yellow">{{ __('Canadian Citizenship Test Prep') }}</a></li>
                <li><a href="{{ route('free-test') }}" class="hover:text-bright-yellow">{{ __('Canadian Driving Test Prep') }}</a></li>
                <li><a href="{{ route('buy-now') }}" class="hover:text-bright-yellow">{{ __('Buy Now') }}</a></li>
                <!--<li><a href="{{ route('blogs.index') }}" class="hover:text-bright-yellow">{{ __('Blogs') }}</a></li> -->
                <li><a href="{{ route('testimonials') }}" class="hover:text-bright-yellow">{{ __('Our Community') }}</a></li>
                <li><a href="{{ route('faqs') }}" class="hover:text-bright-yellow">{{ __('FAQ\'s') }}</a></li>
                
                <!-- Language Switcher (Desktop) -->
                <li>
                    <div class="relative inline-block text-left">
                        <select onchange="window.location.href = this.value"
                                class="block appearance-none bg-navy-blue border border-gray-700 text-white px-4 py-2 rounded-full shadow leading-tight focus:outline-none focus:border-bright-yellow focus:ring focus:ring-bright-yellow focus:ring-opacity-50 text-sm font-semibold">
                            <option value="">{{ strtoupper(App::getLocale()) }}</option> {{-- Display current locale --}}
                            <option value="{{ route('language.switch', 'en') }}" @if(App::getLocale() == 'en') selected @endif>{{ __('English') }}</option>
                            <option value="{{ route('language.switch', 'fr') }}" @if(App::getLocale() == 'fr') selected @endif>{{ __('Français') }}</option>
                            <option value="{{ route('language.switch', 'ar') }}" @if(App::getLocale() == 'ar') selected @endif>{{ __('العربية') }}</option>
                            <option value="{{ route('language.switch', 'so') }}" @if(App::getLocale() == 'so') selected @endif>{{ __('Soomaali') }}</option>
                            <option value="{{ route('language.switch', 'es') }}" @if(App::getLocale() == 'es') selected @endif>{{ __('Español') }}</option>
                            <option value="{{ route('language.switch', 'zh') }}" @if(App::getLocale() == 'zh') selected @endif>{{ __('简体中文 (Mandarin)') }}</option>
                            <option value="{{ route('language.switch', 'pa') }}" @if(App::getLocale() == 'pa') selected @endif>{{ __('ਪੰਜਾਬੀ (Punjabi)') }}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </li>

                <!-- AUTH LOGIC FOR DESKTOP NAV -->
                @auth
                    <li><a href="{{ route('courses.index') }}" class="hover:text-bright-yellow">{{ __('Dashboard') }}</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <button class="bg-bright-yellow hover:bg-yellow-400 text-navy-blue text-sm font-bold px-5 py-2 rounded-full transition">
                                    {{ __('Logout') }}
                                </button>
                            </a>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}">
                            <button class="bg-bright-yellow hover:bg-yellow-400 text-navy-blue text-sm font-bold px-5 py-2 rounded-full transition">
                                {{ __('Login') }}
                            </button>
                        </a>
                    </li>
                @endauth
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
            <!-- PWA Install Banner (New Addition - Place this inside the mobile dropdown div) -->
            <div id="pwa-install-banner" class="hidden bg-white text-navy-blue text-center p-3 md:p-4 shadow-md flex items-center justify-between flex-wrap gap-2">

                <!-- Instructions for Android/Desktop (visible by default) -->
                <div id="pwa-android-instructions" class="flex-grow text-sm md:text-base font-semibold">
                    {{ __('Add IQRA Canada to your home screen for quick access!') }}
                </div>

                <!-- Instructions for iOS (hidden by default, shown by JS) -->
                <div id="pwa-ios-instructions" class="hidden flex-grow text-sm md:text-base font-semibold">
                    {{ __('To install, tap the Share icon') }} <i class="fa-solid fa-arrow-up-from-bracket"></i> {{ __('below, then select "Add to Home Screen."') }}
                </div>

                <div class="flex items-center gap-3">
                    <!-- Button for Android/Desktop (hidden by default for iOS by JS) -->
                    <button id="install-pwa-button" class="bg-navy-blue text-white px-4 py-2 rounded-full text-sm font-semibold hover:bg-gray-700 transition duration-300">
                        {{ __('Install App') }}
                    </button>

                    <!-- Close button for both -->
                    <button id="close-pwa-banner" class="text-navy-blue hover:text-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
    <!-- ✅ End PWA Banner -->
            <ul class="space-y-2">
                <li><a href="/" class="block py-1">{{ __('Home') }}</a></li>
                <li><a href="{{ route('purchase') }}" class="block py-1">{{ __('Canadian Citizenship Test Prep') }}</a></li>
                <li><a href="{{ route('free-test') }}" class="block py-1">{{ __('Canadian Driving Test Prep') }}</a></li>
                <li><a href="{{ route('buy-now') }}" class="block py-1">{{ __('Buy Now') }}</a></li>
                <li><a href="{{ route('testimonials') }}" class="block py-1">{{ __('Our Community') }}</a></li>
                <li><a href="{{ route('faqs') }}" class="block py-1">{{ __('FAQ\'s') }}</a></li>
                

                <!-- Language Switcher (Mobile) -->
                <li>
                    <div class="relative inline-block w-full text-left">
                        <select onchange="window.location.href = this.value"
                                class="block appearance-none w-full bg-navy-blue border border-gray-700 text-white px-4 py-2 rounded-md shadow leading-tight focus:outline-none focus:border-bright-yellow focus:ring focus:ring-bright-yellow focus:ring-opacity-50 text-sm font-semibold">
                            <option value="">{{ strtoupper(App::getLocale()) }}</option> {{-- Display current locale --}}
                            <option value="{{ route('language.switch', 'en') }}" @if(App::getLocale() == 'en') selected @endif>{{ __('English') }}</option>
                            <option value="{{ route('language.switch', 'fr') }}" @if(App::getLocale() == 'fr') selected @endif>{{ __('Français') }}</option>
                            <option value="{{ route('language.switch', 'ar') }}" @if(App::getLocale() == 'ar') selected @endif>{{ __('العربية') }}</option>
                            <option value="{{ route('language.switch', 'so') }}" @if(App::getLocale() == 'so') selected @endif>{{ __('Soomaali') }}</option>
                            <option value="{{ route('language.switch', 'es') }}" @if(App::getLocale() == 'es') selected @endif>{{ __('Español') }}</option>
                            <option value="{{ route('language.switch', 'zh') }}" @if(App::getLocale() == 'zh') selected @endif>{{ __('简体中文 (Mandarin)') }}</option>
                            <option value="{{ route('language.switch', 'pa') }}" @if(App::getLocale() == 'pa') selected @endif>{{ __('ਪੰਜਾਬੀ (Punjabi)') }}</option>
                            <option value="{{ route('language.switch', 'more') }}">{{ __('More Languages...') }}</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </li>

                <!-- AUTH LOGIC FOR MOBILE NAV -->
                @auth
                    <li><a href="{{ route('courses.index') }}" class="block py-1">{{ __('Dashboard') }}</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block py-1">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="block py-1">{{ __('Login') }}</a></li>
                @endauth
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
                <a href="{{url('policy')}}" class="hover:underline">{{ __('Privacy') }}</a>
                <a href="{{url('cookie-policy')}}" class="hover:underline">{{ __('Cookie Policy') }}</a>
                <a href="{{url('terms-of-use')}}" class="hover:underline">{{ __('Terms') }}</a>
                <a href="{{url('disclaimer')}}" class="hover:underline">{{ __('Legal Disclaimer') }}</a>
                <a href="{{url('copyright')}}" class="hover:underline">{{ __('Copyright') }}</a>
                <a href="{{url('contactus')}}" class="hover:text-gray-300 transition">{{ __('Contact') }}</a>
                <a href="{{ route('about') }}" class="hover:underline">{{ __('About Us') }}</a>
            </div>
        </div>
    </footer>

    <!-- ✅ Footer Bottom -->
    <footer class="bg-gray-900 text-gray-400 text-xs py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            &copy;{{ now()->year }} <span class="text-white">{{ __('Iqra Canada Test Prep') }}</span>. {{ __('All Rights Reserved.') }}
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
    
    <!-- ⚡️ LIVEWIRE COMPONENT & SCRIPTS ⚡️ -->
    @livewire('test-prep')
    @livewireScripts

    <!-- ✅ PWA: Service Worker Registration -->
    <script>
    if ('serviceWorker' in navigator) {
        window.PRECACHE_ASSETS = [
            @json(\Illuminate\Support\Facades\Vite::asset('resources/css/app.css')),
            @json(\Illuminate\Support\Facades\Vite::asset('resources/js/app.js')),
            '/offline.html'
        ];

        navigator.serviceWorker.register('/service-worker.js')
            .then(reg => console.log("Service Worker Registered", reg))
            .catch(err => console.error("SW registration failed", err));
    }
</script>


</body>
</html>
