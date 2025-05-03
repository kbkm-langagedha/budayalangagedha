// Initialize Swiper for cultural objects
var culturalObjectsSwiper = new Swiper('.cultural-objects-slider', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
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
        // when window width is >= 576px
        576: {
            slidesPerView: 1,
        },
        // when window width is >= 768px
        768: {
            slidesPerView: 2,
        },
        // when window width is >= 992px
        992: {
            slidesPerView: 3,
        },
        // when window width is >= 1200px
        1200: {
            slidesPerView: 4,
        }
    }
});