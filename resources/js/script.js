//todo:jquery


document.addEventListener('DOMContentLoaded', function () {

    $('.slick_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
       // centerMode: true,
        swipeToSlide: true,
        variableWidth:true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 7000,
    });

    $('.slick_slider__carusel').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
       // centerMode: true,
        swipeToSlide: true,
        variableWidth:true,
        infinite: true,
        speed: 700,
        autoplay: true,
        autoplaySpeed: 7000,
    });


    $('header ul.top_menu').slick({
     //   slidesToShow: 3,
        slidesToScroll: 1,
       // centerMode: true,
        swipeToSlide: true,
        variableWidth:true,
        infinite: false,

    });



    /*
      Slidemenu
    */
    (function() {
        var $body = document.body
            , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

        if ( typeof $menu_trigger !== 'undefined' ) {
            $menu_trigger.addEventListener('click', function() {
                $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
            });
        }

    }).call(this);

});
