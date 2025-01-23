(function () {
  if (document.querySelector(".js-parishe-item")) {
    const slides = document.querySelectorAll(".js-parishe-item");
    const modal = document.querySelector(".js-parishes-modal");
    const modalsItems = document.querySelectorAll(".js-parishe-modal-item");
    const btnsClose = document.querySelectorAll(".js-parishes-modal-close");

    slides.forEach((slide) => {
      slide.addEventListener("click", function () {
        modalsItems.forEach((modalItem) => {
          if (slide.dataset.value == modalItem.dataset.value) {
            modal.classList.add("is-active");
            modalItem.classList.add("is-active");
          }
        });
      });
    });

    btnsClose.forEach((btnClose) => {
      btnClose.addEventListener("click", function () {
        modal.classList.remove("is-active");

        modalsItems.forEach((modalItem) => {
          modalItem.classList.remove("is-active");
        });
      });
    });
  }
})();
