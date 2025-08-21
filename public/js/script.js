let deferredPrompt; // Variable to store the beforeinstallprompt event

document.addEventListener("DOMContentLoaded", () => {
    // --- PWA Elements ---
    const pwaInstallBanner = document.getElementById('pwa-install-banner');
    const installPwaButton = document.getElementById('install-pwa-button');
    const closePwaBanner = document.getElementById('close-pwa-banner');
    const androidInstructions = document.getElementById('pwa-android-instructions');
    const iosInstructions = document.getElementById('pwa-ios-instructions');

    // --- Back To Top Elements ---
    const backToTopBtn = document.getElementById('backToTopBtn');

    // --- Helper Functions for PWA ---
    const isIOS = () => {
        const userAgent = window.navigator.userAgent.toLowerCase();
        return /iphone|ipad|ipod/.test(userAgent);
    };

    const isStandalone = () => window.matchMedia('(display-mode: standalone)').matches;

    function showInstallBanner() {
        if (pwaInstallBanner) {
            pwaInstallBanner.classList.remove('hidden');
        }
    }

    function hideInstallBanner() {
        if (pwaInstallBanner) {
            pwaInstallBanner.classList.add('hidden');
            localStorage.setItem('pwaDismissed', 'true'); // Remember dismissal
        }
    }

    // Check if banner was previously dismissed
    if (localStorage.getItem('pwaDismissed') === 'true') {
        hideInstallBanner();
    }

    // --- PWA Close Button Listener ---
    if (closePwaBanner) {
        closePwaBanner.addEventListener('click', hideInstallBanner);
    }

    // --- PWA Logic: Detect OS and show appropriate banner ---
    if (isIOS() && !isStandalone()) {
        // iOS device and not already installed as PWA
        if (androidInstructions) androidInstructions.classList.add('hidden'); // Hide Android message
        if (installPwaButton) installPwaButton.classList.add('hidden'); // Hide install button
        if (iosInstructions) iosInstructions.classList.remove('hidden'); // Show iOS specific message
        showInstallBanner(); // Show the banner for iOS
    } else if ('beforeinstallprompt' in window) {
        // Android/Desktop browser that supports programmatic PWA installation
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault(); // Prevent the browser's default mini-infobar
            deferredPrompt = e; // Store the event for later use
            if (iosInstructions) iosInstructions.classList.add('hidden'); // Ensure iOS message is hidden
            if (androidInstructions) androidInstructions.classList.remove('hidden'); // Show Android message
            if (installPwaButton) installPwaButton.classList.remove('hidden'); // Show install button
            showInstallBanner(); // Show the custom banner
        });

        // Handle the custom install button click for Android/Desktop
        if (installPwaButton) {
            installPwaButton.addEventListener('click', async () => {
                if (deferredPrompt) {
                    hideInstallBanner(); // Hide banner immediately on click

                    deferredPrompt.prompt(); // Show the browser's install prompt
                    const { outcome } = await deferredPrompt.userChoice;
                    console.log(`User response to the install prompt: ${outcome}`);
                    deferredPrompt = null; // Clear the stored event
                }
            });
        }
    }

    // Hide the banner if the PWA is successfully installed (for Android/Desktop)
    window.addEventListener('appinstalled', () => {
        hideInstallBanner();
    });

    // --- Scroll To Top Logic ---
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Expose scrollToTop to global scope if it's called from inline HTML (like onclick)
    window.scrollToTop = scrollToTop;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            if (backToTopBtn) backToTopBtn.classList.remove('hidden');
        } else {
            if (backToTopBtn) backToTopBtn.classList.add('hidden');
        }
    });

    // --- Initialize AOS (Animations On Scroll) ---
    AOS.init({
        once: true, // Whether animation should only happen once - while scrolling down
        duration: 800 // Duration of animation
    });

    // --- Swiper Initialization for Testimonials ---
    if (document.querySelector('.testimonial-swiper')) {
        new Swiper('.testimonial-swiper', {
            loop: true,
            spaceBetween: 30,
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    }
});
