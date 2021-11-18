$('.label.ui.dropdown')
  .dropdown();

$('.no.label.ui.dropdown')
  .dropdown({
  useLabels: false
});

$('.ui.button').on('click', function () {
  $('.ui.dropdown')
    .dropdown('restore defaults')
})


// init multiselect input
$('.my-select').selectpicker();


// Carrusel Home relacionados

$(".owl-services").owlCarousel({
    slideBy: 1,
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayTimeout: 7500,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
            nav: true,
             dots:true
        },
        576: {
             items: 2,
             nav: true,
             dots:true
        },
        768: {
            items: 3,
            nav: true,
             dots:true
        },
        992: {
            items: 4,
            nav: true,
             dots:true
        },
        1200: {
            items: 4,
            nav: true,
             dots:true
        }
    }
});

$(".owl-services2").owlCarousel({
  slideBy: 1,
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  autoplayTimeout: 7500,
  autoplayHoverPause: true,
  responsive: {
      0: {
          items: 1,
          nav: true,
           dots:true
      },
      576: {
           items: 2,
           nav: true,
           dots:true
      },
      768: {
          items: 3,
          nav: true,
           dots:true
      },
      992: {
          items: 4,
          nav: true,
           dots:true
      },
      1200: {
          items: 4,
          nav: true,
           dots:true
      }
  }
});