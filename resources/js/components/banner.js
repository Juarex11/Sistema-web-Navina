import Swiper from 'swiper';
import 'swiper/css';

const swiper = new Swiper('.swiper', {
    loop: true,
    pagination: { el: '.swiper-pagination' },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    autoplay: {
    delay: 3000, // tiempo entre slides en ms (3 segundos)
    disableOnInteraction: false, // para que no se detenga al usar los botones
    },
});