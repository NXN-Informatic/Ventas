
var map = L.map('map',{
	center: [43.64701, -79.39425],
	zoom: 18
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

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
