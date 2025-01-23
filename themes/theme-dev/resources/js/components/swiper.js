import Swiper, { Navigation, Pagination } from "swiper";
import "swiper/css/bundle";
import "swiper/css/navigation";
import "swiper/css/pagination";

new Swiper(".js-swiper-banner");

new Swiper(".js-swiper-news");

new Swiper(".js-swiper-gallery");

new Swiper(".js-swiper-videos");

new Swiper(".js-swiper-general-news-editorial", {
  breakpoints: {
    320: {
      slidesPerView: 1.2,
      spaceBetween: 16,
    },

    992: {
      slidesPerView: 1,
    },

    1024: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
  },
});

new Swiper(".js-swiper-values", {
  slidesPerView: 1.5,
  spaceBetween: 16,

  breakpoints: {
    320: {
      slidesPerView: 1.5,
      spaceBetween: 16,
    },

    992: {
      slidesPerView: 2,
      spaceBetween: 30,
    },

    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

// new Swiper(".js-swiper-magazine-banner", {
//   modules: [Navigation, Pagination],
//   slidesPerView: 1,

//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },

//   pagination: {
//     el: ".swiper-pagination",
//     type: "bullets",
//   },
// });

new Swiper(".js-swiper-parishes", {
  modules: [Navigation, Pagination],
  slidesPerView: 3,
  spaceBetween: 16,

  navigation: {
    nextEl: ".js-swiper-button-next-parishes",
    prevEl: ".js-swiper-button-prev-parishes",
  },

  breakpoints: {
    320: {
      slidesPerView: 1.2,
      spaceBetween: 16,
    },

    992: {
      slidesPerView: 3,
      spaceBetween: 16,
    },
  },

  // pagination: {
  //   el: ".swiper-pagination",
  //   type: "bullets",
  // },
});
