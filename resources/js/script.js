//todo:jquery

document.addEventListener('DOMContentLoaded', function () {

    $('.slick_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        // centerMode: true,
        swipeToSlide: true,
        variableWidth: true,
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
        variableWidth: true,
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
        variableWidth: true,
        infinite: false,

    });


    /*
      Slidemenu левое меню canvas
    */
    (function () {
        var $body = document.body
            , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

        if (typeof $menu_trigger !== 'undefined') {
            $menu_trigger.addEventListener('click', function () {
                $body.className = ($body.className == 'menu-active') ? '' : 'menu-active';
            });
        }

    }).call(this);

    $('body').on('click', '#nav_close__', function (event) {

        if($(this).parents('body').hasClass('menu-active')) {
            $(this).parents('body').removeClass('menu-active');
        }
    });


    /*
      Slidemenu левое меню canvas
    */

    /*
     блок (псевдо select) переключает и перезагружает религию
    */

    $('body').on('click', '.s__js', function (event) {

        $(this).parents('.axeld_select__js').find('.s_box').toggleClass('active');
        $(this).toggleClass('reverse');
    });

    /** select религий  */
    $('body').on('click', '.s_rel__js', function (event) {

        let Parent = $(this).parents('.axeld_select__js');
        Parent.find('.s__js').find('span').text($(this).text());
        let Id = $(this).find('span').data('religion');
        Parent.find('.s__js').attr('data-religion', Id);
        Parent.find('.s_box').toggleClass('active');
        Parent.find('.s_box__rel').removeClass('active');
        $(this).addClass('active');

        $('form[name="religion"]').find('.f_religion__js').val(Id);
        document.forms['religion'].submit();

    });

    /** select категорий религий  */
    $('body').on('click', '.s_relob__js', function (event) {

        let Parent = $(this).parents('.axeld_select__js');
        Parent.find('.s__js').find('span').text($(this).text());
        let Id = $(this).find('span').data('religion_category');
        Parent.find('.s__js').attr('data-religion_category', Id);
        Parent.find('.s_box').toggleClass('active');
        Parent.find('.s_box__rel').removeClass('active');
        $(this).addClass('active');

        $('form[name="religion_category"]').find('.f_religion_category__js').val(Id);
        document.forms['religion_category'].submit();

    });


    /*
     // блок (псевдо select) переключает и перезагружает религию
    */
    /*
     блок (select chosen) переключает и перезагружает регионы
    */

    $('.select_area__js').change(function () {
        $('form[name="area"]').find('.f_area__js').val($(this).val());
        if ($(this).val() !== 0) {
            document.forms['area'].submit();
        }
    });

    /*
     //  блок (select chosen) переключает и перезагружает регионы
        */

    /*
     блок (открыть / закрыть ) chosen регионы
    */

    $('body').on('click', '.f_region__js', function (event) {
        $('.f_region').toggleClass('active');
        $('.chosen__js').toggleClass('active');
    });

    /*
      //  блок (открыть / закрыть ) chosen регионы
    */
    /*  .autocomplete-ajax */


    $('.big_search .autocomplete-ajax').autocomplete({
        source: function (request, response) {


            if($('#chosen_area').length) {
                var area = $('#chosen_area').find('select').val();
                $('.ui_area').val(area);
            }

            if($('._rel__js').length) {
                var religion = $('.s__js').data('religion');
                $('.ui_religion').val(religion);
            }


            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/search/big_autocomplete',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    "area": area,
                    "religion": religion,
                    term: request.term,
                },
                success: function (data) {

                  //  console.log(data)

                    response($.map(data, function (item) {
                        return {
                            id: item.id,
                            label: item.title,
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('.ui_object').val(ui.item.id);


        },
        minLength: 2,
    });



    $('._search .autocomplete-ajax').autocomplete({
        source: function (request, response) {


            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/search/top_autocomplete',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),

                    term: request.term,
                },
                success: function (data) {

                  //  console.log(data)

                    response($.map(data, function (item) {
                        return {
                            id: item.id,
                            label: item.title,
                        }
                    }));
                }
            });
        },
        select: function (event, ui) {
            $('.ui_object').val(ui.item.id);


        },
        minLength: 2,
    });




    /*//  .autocomplete-ajax */



});
