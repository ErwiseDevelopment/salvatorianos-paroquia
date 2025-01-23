import Swiper, { Navigation, Pagination } from "swiper";
import "swiper/css/bundle";
import "swiper/css/navigation";
import "swiper/css/pagination";

(function () {
  if (document.querySelector(".photo-item")) {
    const photos = document.querySelectorAll(".photo-item");
    const modal = document.querySelector(".js-photo-modal");
    const overlay = document.querySelector(".js-photo-modal-overlay");
    const body = document.querySelector("body");

    photos.forEach((item) => {
      item.addEventListener("click", function () {
        modal.classList.add("is-active");
        body.classList.add("overflow-hidden");

        new Swiper(".js-swiper-photos", {
          modules: [Navigation],
          initialSlide: this.dataset.value,

          navigation: {
            nextEl: ".js-swiper-button-next-photos",
            prevEl: ".js-swiper-button-prev-photos",
          },
        });
      });
    });

    overlay.addEventListener("click", function () {
      modal.classList.remove("is-active");
      body.classList.remove("overflow-hidden");
    });
  }
})();
