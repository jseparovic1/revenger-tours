/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
});

import Swiper from "swiper";

let swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    lazy: {
        loadPrevNext: true,
    },
    preloadImages: false,
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    autoplay: {
        delay: 5000,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.slider-control--next',
        prevEl: '.slider-control--prev',
    },
    on: {
        init: function () {
            setTimeout(() => {
                const animation = 'animation: zoom 100s ease infinite';
                let images = document.querySelectorAll('.swiper-slide > img');
                images.forEach(img => img.style = animation);
            });
        },
    }
});


const nav = document.querySelector('.navigation.absolute');

if (nav !== null ){
    window.addEventListener('scroll', _.throttle(menuToggle, 300));
}

function menuToggle() {
    if (window.scrollY >= 600) {
        nav.classList.remove('absolute');
        nav.classList.add('fixed');
        nav.classList.add('bg-black');
    } else {
        nav.classList.remove('fixed');
        nav.classList.remove('bg-black');
        nav.classList.add('bg-transparent');
        nav.classList.add('absolute');
    }
}

