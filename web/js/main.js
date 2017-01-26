$(document).ready(function () {

    $('.fts-products-menu > li > a').each(function () {

        $(this).click(function (e) {
            e.stopPropagation();

            ftsSubmenuBg = $(this).next();
            ftsActiveButton = $('.fts-products-menu').find('.active');

            if (ftsSubmenuBg.attr('class') === "fts-submenu-bg") {
                e.preventDefault();
                if (ftsSubmenuBg.is(':visible')) {
                    ftsSubmenuBg.slideUp(700).prev().removeClass('active');
                }
                else {

                    if (ftsActiveButton) {
                        ftsActiveButton.next().slideUp(300);
                        ftsActiveButton.removeClass('active');
                    }

                    ftsSubmenuBg.slideDown(700).prev().addClass('active');
                }
            }

        });
    });


    $('html').click(function () {

        ftsActiveButton = $('.fts-products-menu').find('.fts-submenu-bg:visible');
        if (ftsActiveButton.length > 0) {
            ftsActiveButton.slideUp(300);
            ftsActiveButton.prev().removeClass('active');
        }

    });


    $('.filter-container li').click(function () {
        current_el = $(this);

        current_el.parent().find('li').removeClass('active');
        current_el.addClass('active');
        current_el.closest("div").find('.filter-result').empty().append(current_el.text());
        check_all_filters();
    });

    $('.filter-colors li').click(function () {
        current_el = $(this);
        $('.selected-color').hide();
        current_el.parent().find('li').removeClass('active');
        current_el.addClass('active');
        color_value = current_el.find('.tooltiptext').text();
        color_img = current_el.find('img').attr('src');

        $('.selected-color').empty().append('<img src="' + color_img + '" alt="">' + color_value).slideDown();
        current_el.closest("div").find('.filter-result').empty().append(current_el.data('color'));

        check_all_filters();

    });
    $('.toggle-top-button').click(function () {
        var topMenu = $('.top-menu');
        var button = $('.toggle-top-button span');
        var margin = topMenu.css('margin-top');

        if (margin == '0px') {
            topMenu.animate({'margin-top': '-50px'});
            button.removeClass('up').addClass('down');
        } else {
            topMenu.animate({'margin-top': '0px'});
            button.removeClass('down').addClass('up');
        }


    });

    $('#add_to_cart').click(function () {
        alert('added to cart');
    });

    function check_all_filters() {


        //console.log('checking all filters');
        obj = {};

        check_result = true;
        $(".filter-result").each(function (index, element) {
            current_result = $(this);

            if (current_result.text() === '') {
                check_result = false;
            } else {
                current_result_key = current_result.data('title');
                obj[current_result_key] = current_result.text();
            }
        });

        if (check_result == true) {

            //console.log(obj);

            get_price(obj);


        }


        return check_result;
    }

    function get_price(product) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        product['_csrf'] = csrfToken;
        $.ajax({
            url: '/ajax/price',
            type: 'post',
            data: product,
            success: function (data) {

                //console.log(data[0].price);

                if(data != 0) {
                    $('.price span > span').text(data[0].price);
                    $('#add_to_cart').prop("disabled", false);
                }
                else {
                    $('.price span > span').text(0);
                    $('#add_to_cart').prop("disabled", true);
                }
                //price = data.price;
            }
        });
        //return price;

    }


    if($('.filter-result').length) {
        //alert('yes');
        $('#add_to_cart').prop("disabled", true);
        check_all_filters();
    }



    function slider_caption_width() {
        var w = $(window).width();
        $('.full-width .slide-caption').css('width', w + 'px');
    }

    slider_caption_width();
    $(window).resize(function () {
        slider_caption_width();
    });


    $('.slider').glide({
        autoplay: 3000,
        hoverpause: true,
        circular: true,
        animationDuration: 500,
        arrows: true,
        arrowRightText: '<span class="slider-right-arrow-ico"></span>',
        arrowLeftText: '<span class="slider-left-arrow-ico"></span>',
        navigation: true,
        navigationCenter: true
    });

    var fancyboxFts = $(".fancybox");

    if (fancyboxFts.length > 0) {
        // Fancybox activation
        fancyboxFts.fancybox();
    }

});