// public/js/script.js

let deferredPrompt; // Variable to store the beforeinstallprompt event

// Listen for the beforeinstallprompt event
window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent the mini-infobar from appearing on mobile
    e.preventDefault();
    // Stash the event so it can be triggered later.
    deferredPrompt = e;
    // Update UI to notify the user they can add to home screen
    const installBanner = document.getElementById('pwa-install-banner');
    if (installBanner) {
        installBanner.classList.remove('hidden'); // Show the custom install banner
    }
});

// Get the install button from the banner
const installButton = document.getElementById('install-pwa-button');
if (installButton) {
    installButton.addEventListener('click', async () => {
        if (deferredPrompt) {
            // Hide the custom install banner
            const installBanner = document.getElementById('pwa-install-banner');
            if (installBanner) {
                installBanner.classList.add('hidden');
            }

            // Show the native install prompt
            deferredPrompt.prompt();
            // Wait for the user to respond to the prompt
            const { outcome } = await deferredPrompt.userChoice;
            // Optionally, send analytics event with outcome of user choice
            console.log(`User response to the install prompt: ${outcome}`);
            // We've used the prompt, and can't use it again. Clear it.
            deferredPrompt = null;
        }
    });
}

// Get the close button for the banner
const closeInstallBannerButton = document.getElementById('close-pwa-banner');
if (closeInstallBannerButton) {
    closeInstallBannerButton.addEventListener('click', () => {
        const installBanner = document.getElementById('pwa-install-banner');
        if (installBanner) {
            installBanner.classList.add('hidden'); // Hide the custom install banner
        }
    });
}


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

// Initialize AOS animations
document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        once: true,
        duration: 800
    });
});

//Swiper initialization for testimonials
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
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                }
            }
        });
    }
});
