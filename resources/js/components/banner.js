import Swiper from 'swiper';
import 'swiper/css';

const el = document.querySelector('.swiper');

if (el) {
    new Swiper(el, {
        loop: true,
        pagination: { el: '.swiper-pagination' },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
}