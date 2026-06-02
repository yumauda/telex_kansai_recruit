"use strict";

if (document.querySelector(".js-top-people-slider")) {
  const topPeopleSlider = new Swiper(".js-top-people-slider", {
    slidesPerView: 1.5,
    spaceBetween: 20,
    loop: true,
    loopAdditionalSlides: 6,
    loopedSlides: 6,
    speed: 700,
    autoplay: {
      delay: 2600,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 3.7,
        spaceBetween: 28,
      },
    },
  });
}
