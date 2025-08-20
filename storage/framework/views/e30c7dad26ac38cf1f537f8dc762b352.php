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
    <title><?php echo e($title ?? __('IQRA Canada Test Prep')); ?></title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

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
    <link rel="manifest" href="<?php echo e(asset('/manifest.json')); ?>">

    <!-- ✅ PWA: Apple Specific Meta Tags (for iOS "Add to Home Screen") -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="IQRA Test Prep">
    <link rel="apple-touch-icon" href="<?php echo e(asset('/images/icons/icon-192x192.png')); ?>">
    <link rel="apple-touch-startup-image" href="<?php echo e(asset('/images/icons/icon-512x512.png')); ?>">

    <!-- ✅ PWA: Theme color for browser UI (address bar/toolbar) -->
    <meta name="theme-color" content="#FCD34D">

    <!-- Livewire Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="bg-gray-50 text-gray-800">

    <!-- ✅ Combined Header & Navigation -->
    <nav class="bg-navy-blue text-white sticky top-0 z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo section with added right margin for spacing -->
            <div class="flex items-center gap-3 mr-6">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="<?php echo e(__('Logo')); ?>" class="h-10">
                <span class="text-xl font-bold text-bright-yellow hidden md:block"><?php echo e(__('IQRA Canada Test Prep')); ?></span>
            </div>

            <!-- Navigation Links and Login Button (Desktop) -->
            <ul class="hidden md:flex items-center gap-6 font-semibold">
                <li><a href="/" class="hover:text-bright-yellow"><?php echo e(__('Home')); ?></a></li>
                <li><a href="<?php echo e(route('purchase')); ?>" class="hover:text-bright-yellow"><?php echo e(__('Citizenship Test Prep')); ?></a></li>
                <li><a href="<?php echo e(route('free-test')); ?>" class="hover:text-bright-yellow"><?php echo e(__('Driving Test Prep')); ?></a></li>
                <li><a href="<?php echo e(route('buy-now')); ?>" class="hover:text-bright-yellow"><?php echo e(__('Buy Now')); ?></a></li>
                <!--<li><a href="<?php echo e(route('blogs.index')); ?>" class="hover:text-bright-yellow"><?php echo e(__('Blogs')); ?></a></li> -->
                <li><a href="<?php echo e(route('testimonials')); ?>" class="hover:text-bright-yellow"><?php echo e(__('Our Community')); ?></a></li>
                <li><a href="<?php echo e(route('faqs')); ?>" class="hover:text-bright-yellow"><?php echo e(__('FAQ\'s')); ?></a></li>
                
                <!-- Language Switcher (Desktop) -->
                <li>
                    <div class="relative inline-block text-left">
                        <select onchange="window.location.href = this.value"
                                class="block appearance-none bg-navy-blue border border-gray-700 text-white px-4 py-2 rounded-full shadow leading-tight focus:outline-none focus:border-bright-yellow focus:ring focus:ring-bright-yellow focus:ring-opacity-50 text-sm font-semibold">
                            <option value=""><?php echo e(strtoupper(App::getLocale())); ?></option> 
                            <option value="<?php echo e(route('language.switch', 'en')); ?>" <?php if(App::getLocale() == 'en'): ?> selected <?php endif; ?>><?php echo e(__('English')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'fr')); ?>" <?php if(App::getLocale() == 'fr'): ?> selected <?php endif; ?>><?php echo e(__('Français')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'ar')); ?>" <?php if(App::getLocale() == 'ar'): ?> selected <?php endif; ?>><?php echo e(__('العربية')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'so')); ?>" <?php if(App::getLocale() == 'so'): ?> selected <?php endif; ?>><?php echo e(__('Soomaali')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'es')); ?>" <?php if(App::getLocale() == 'es'): ?> selected <?php endif; ?>><?php echo e(__('Español')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'zh')); ?>" <?php if(App::getLocale() == 'zh'): ?> selected <?php endif; ?>><?php echo e(__('简体中文 (Mandarin)')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'pa')); ?>" <?php if(App::getLocale() == 'pa'): ?> selected <?php endif; ?>><?php echo e(__('ਪੰਜਾਬੀ (Punjabi)')); ?></option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </li>

                <!-- AUTH LOGIC FOR DESKTOP NAV -->
                <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(route('courses.index')); ?>" class="hover:text-bright-yellow"><?php echo e(__('Dashboard')); ?></a></li>
                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                            <?php echo csrf_field(); ?>
                            <a href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();">
                                <button class="bg-bright-yellow hover:bg-yellow-400 text-navy-blue text-sm font-bold px-5 py-2 rounded-full transition">
                                    <?php echo e(__('Logout')); ?>

                                </button>
                            </a>
                        </form>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?php echo e(route('login')); ?>">
                            <button class="bg-bright-yellow hover:bg-yellow-400 text-navy-blue text-sm font-bold px-5 py-2 rounded-full transition">
                                <?php echo e(__('Login')); ?>

                            </button>
                        </a>
                    </li>
                <?php endif; ?>
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
                <li><a href="/" class="block py-1"><?php echo e(__('Home')); ?></a></li>
                <li><a href="<?php echo e(route('purchase')); ?>" class="block py-1"><?php echo e(__('Citizenship Test Prep')); ?></a></li>
                <li><a href="<?php echo e(route('free-test')); ?>" class="block py-1"><?php echo e(__('Driving Test Prep')); ?></a></li>
                <li><a href="<?php echo e(route('buy-now')); ?>" class="block py-1"><?php echo e(__('Buy Now')); ?></a></li>
                <li><a href="<?php echo e(route('testimonials')); ?>" class="block py-1"><?php echo e(__('Our Community')); ?></a></li>
                <li><a href="<?php echo e(route('faqs')); ?>" class="block py-1"><?php echo e(__('FAQ\'s')); ?></a></li>
                

                <!-- Language Switcher (Mobile) -->
                <li>
                    <div class="relative inline-block w-full text-left">
                        <select onchange="window.location.href = this.value"
                                class="block appearance-none w-full bg-navy-blue border border-gray-700 text-white px-4 py-2 rounded-md shadow leading-tight focus:outline-none focus:border-bright-yellow focus:ring focus:ring-bright-yellow focus:ring-opacity-50 text-sm font-semibold">
                            <option value=""><?php echo e(strtoupper(App::getLocale())); ?></option> 
                            <option value="<?php echo e(route('language.switch', 'en')); ?>" <?php if(App::getLocale() == 'en'): ?> selected <?php endif; ?>><?php echo e(__('English')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'fr')); ?>" <?php if(App::getLocale() == 'fr'): ?> selected <?php endif; ?>><?php echo e(__('Français')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'ar')); ?>" <?php if(App::getLocale() == 'ar'): ?> selected <?php endif; ?>><?php echo e(__('العربية')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'so')); ?>" <?php if(App::getLocale() == 'so'): ?> selected <?php endif; ?>><?php echo e(__('Soomaali')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'es')); ?>" <?php if(App::getLocale() == 'es'): ?> selected <?php endif; ?>><?php echo e(__('Español')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'zh')); ?>" <?php if(App::getLocale() == 'zh'): ?> selected <?php endif; ?>><?php echo e(__('简体中文 (Mandarin)')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'pa')); ?>" <?php if(App::getLocale() == 'pa'): ?> selected <?php endif; ?>><?php echo e(__('ਪੰਜਾਬੀ (Punjabi)')); ?></option>
                            <option value="<?php echo e(route('language.switch', 'more')); ?>"><?php echo e(__('More Languages...')); ?></option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </li>

                <!-- AUTH LOGIC FOR MOBILE NAV -->
                <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(route('courses.index')); ?>" class="block py-1"><?php echo e(__('Dashboard')); ?></a></li>
                    <li>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" x-data>
                            <?php echo csrf_field(); ?>
                            <a href="<?php echo e(route('logout')); ?>" @click.prevent="$root.submit();" class="block py-1">
                                <?php echo e(__('Logout')); ?>

                            </a>
                        </form>
                    </li>
                <?php else: ?>
                    <li><a href="<?php echo e(route('login')); ?>" class="block py-1"><?php echo e(__('Login')); ?></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- ✅ Main Page Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- ✅ Footer Top -->
    <footer class="bg-gray-800 text-white text-sm py-10">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between gap-6">
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo e(url('policy')); ?>" class="hover:underline"><?php echo e(__('Privacy')); ?></a>
                <a href="<?php echo e(url('cookie-policy')); ?>" class="hover:underline"><?php echo e(__('Cookie Policy')); ?></a>
                <a href="<?php echo e(url('terms-of-use')); ?>" class="hover:underline"><?php echo e(__('Terms')); ?></a>
                <a href="<?php echo e(url('disclaimer')); ?>" class="hover:underline"><?php echo e(__('Legal Disclaimer')); ?></a>
                <a href="<?php echo e(url('copyright')); ?>" class="hover:underline"><?php echo e(__('Copyright')); ?></a>
                <a href="<?php echo e(url('contactus')); ?>" class="hover:text-gray-300 transition"><?php echo e(__('Contact')); ?></a>
                <a href="<?php echo e(route('about')); ?>" class="hover:underline"><?php echo e(__('About Us')); ?></a>
            </div>
        </div>
    </footer>

    <!-- ✅ Footer Bottom -->
    <footer class="bg-gray-900 text-gray-400 text-xs py-6">
        <div class="max-w-7xl mx-auto px-4 text-center">
            &copy;<?php echo e(now()->year); ?> <span class="text-white"><?php echo e(__('Canadian Citizenship Prep')); ?></span>. <?php echo e(__('All Rights Reserved.')); ?>

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
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <!-- ⚡️ LIVEWIRE COMPONENT & SCRIPTS ⚡️ -->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('test-prep');

$__html = app('livewire')->mount($__name, $__params, 'lw-4114231079-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <!-- ✅ PWA: Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</body>
</html>
<?php /**PATH /Users/mohamudhassanmayow/Desktop/Study_Guide/resources/views/layouts/guest.blade.php ENDPATH**/ ?>