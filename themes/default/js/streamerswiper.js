document.addEventListener('DOMContentLoaded', function() {
    const streamersSwiper = new Swiper('.streamersSwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // When window width is >= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // When window width is >= 1024px
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });
});