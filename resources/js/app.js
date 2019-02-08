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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
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
    // autoplay: {
    //     delay: 5000,
    // },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.slider-control--next',
        prevEl: '.slider-control--prev',
    },
    on: {
        slideChange: function () {
            let images = document.querySelectorAll('.swiper-slide-active > img');
            images.forEach((element) => {
                element.classList = 'image-bg reset';
            });

            let activeImage = document.querySelector('.swiper-slide-active > img');
            if (activeImage) {
                console.log("yeste");
                console.log(activeImage);
                activeImage.classList = 'image-bg active';
            }
            if (!activeImage) {
                let firstImage = document.querySelector('.swiper-slide > img');
                console.log(firstImage);
                firstImage.classList += 'image-bg active';
            }
        }
    }
});
