var mySwiper = new Swiper ('.swiper-container', {
  slidesPerView: 1,
  centeredSlides: true,
  spaceBetween: 100,
  loop: true,
  loopFillGroupWithBlank: true,

  autoplay: {
  delay: 4000,
  disableOnInteraction: false,
  },
  navigation: {
  nextEl: '.swiper-button-next',
  prevEl: '.swiper-button-prev',
  },
});
