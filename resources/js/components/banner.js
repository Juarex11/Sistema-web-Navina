import Swiper from 'swiper';
import { Pagination, Navigation, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';

document.addEventListener('DOMContentLoaded', () => {
    const swiperEl = document.querySelector('.swiper');

    if (!swiperEl) return;

    new Swiper(swiperEl, {
        modules: [Pagination, Navigation, Autoplay],
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        }
    });
});