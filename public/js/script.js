let deferredPrompt; // Variable to store the beforeinstallprompt event

// ✅ Handle beforeinstallprompt (Android/Chrome)
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;

    const installBanner = document.getElementById('pwa-install-banner');
    if (installBanner) {
        installBanner.classList.remove('hidden'); // Show banner
    }
});

// ✅ Handle Install button (Android only)
const installButton = document.getElementById('install-pwa-button');
if (installButton) {
    installButton.addEventListener('click', async () => {
        if (deferredPrompt) {
            const installBanner = document.getElementById('pwa-install-banner');
            if (installBanner) installBanner.classList.add('hidden');

            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            console.log(`User response to the install prompt: ${outcome}`);
            deferredPrompt = null;
        }
    });
}

// ✅ Handle Close button
const closeInstallBannerButton = document.getElementById('close-pwa-banner');
if (closeInstallBannerButton) {
    closeInstallBannerButton.addEventListener('click', () => {
        const installBanner = document.getElementById('pwa-install-banner');
        if (installBanner) {
            installBanner.classList.add('hidden');
        }
    });
}

// ✅ iOS Safari detection (no beforeinstallprompt)
document.addEventListener("DOMContentLoaded", () => {
    const installBanner = document.getElementById('pwa-install-banner');
    const installBtn = document.getElementById('install-pwa-button');

    const isIOS = /iphone|ipad|ipod/.test(window.navigator.userAgent.toLowerCase());
    const isInStandalone = ("standalone" in window.navigator) && window.navigator.standalone;

    if (isIOS && !isInStandalone) {
        if (installBanner) installBanner.classList.remove('hidden');
        if (installBtn) {
            installBtn.textContent = "Add via Safari"; // change text
            installBtn.disabled = true; // disable since prompt won’t work
        }
    }
});

// ✅ Scroll To Top
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

document.addEventListener('DOMContentLoaded', function () {
    const backToTopBtn = document.getElementById('backToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove('hidden');
        } else {
            backToTopBtn.classList.add('hidden');
        }
    });
});

// ✅ Initialize AOS
document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        once: true,
        duration: 800
    });
});

// ✅ Swiper Init
document.addEventListener('DOMContentLoaded', function () {
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
