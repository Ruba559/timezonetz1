var brands_swiper = new Swiper(".brands-swiper", {
    slidesPerView: 5,
    spaceBetween: 30,
   freeMode: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints:{
        200:{
          slidesPerView:1.5,
          spaceBetween:10
        },
        500:{
            slidesPerView:2.2,
            spaceBetween:10
          },
          900:{
            slidesPerView:5.3,
            spaceBetween:10
          },
          
    }
  });

  var banners_swiper = new Swiper(".banners-swiper", {
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
        delay: 6000,
        disableOnInteraction: false,
      },
    pagination: {
      el: ".swiper-pagination-banners",
      clickable: true,
    },
  });

  banners_swiper.on('slideChange', function () {
    $(".caption h2").removeClass('aos-animate');
    $(".caption p").removeClass('aos-animate');
    $(".caption .button-link").removeClass('aos-animate');
    $(".floating-image").removeClass('aos-animate');

    setTimeout(function() {

        $(".caption h2").addClass('aos-animate');
        $(".caption p").addClass('aos-animate');
        $(".caption .button-link").addClass('aos-animate');
        $(".floating-image").addClass('aos-animate');
    }, 400);
});
 