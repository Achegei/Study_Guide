// public/js/script.js

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
