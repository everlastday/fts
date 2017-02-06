$(document).ready(function () {

    var csrfToken = $('meta[name="csrf-token"]').attr("content");

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
    $('.cart_delete_item').click(function (event) {
        obj = {};

        event.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        current_el = $(this);
        obj['_csrf'] = csrfToken;
        obj['item_id'] = current_el.data('item');

        $.ajax({
            url: '/ajax/delete-from-cart',
            type: 'post',
            data: obj,
            success: function (data) {
                if (data > -1) {
                    if (data == 0) {
                        $('.cart').addClass('hidden');
                        $('.empty-cart').removeClass('hidden');
                    }
                    current_el.closest('.cart-item').slideUp().empty();
                    generate_total_price();
                }
            }
        });


    });

    $('#del_from_cart').click(function (product) {
        current_el = $(this);
        obj['_csrf'] = csrfToken;
        obj['item_id'] = current_el.data('product-id');

        $.ajax({
            url: '/ajax/delete-from-cart',
            type: 'post',
            data: obj,
            success: function (data) {
                $('.cart-notice').hide().removeClass('error').addClass('success').empty().text('Продукт видалено з кошика').slideDown().delay(3000).slideUp();
                $('#del_from_cart').hide().attr('data-product-id', '');
            }
        });

        check_result = check_all_filters();

        if (check_result == true) {
            $('#add_to_cart').prop("disabled", false).show();

        } else {
            $('#add_to_cart').prop("disabled", true).show();
        }
    });
    $('#add_to_cart').click(function (product) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        obj = {};
        count = 0;

        $(".filter-result").each(function (index, element) {
            current_result = $(this);
            current_result_key = current_result.data('title');

            if (current_result.hasClass('skip_filter')) {
                obj[count] = current_result_key + "|" + current_result.text();
                count++;
            } else {
                obj[current_result_key] = current_result.text();
            }
        });

        price = $('.price span > span');

        obj['price'] = price.text();
        obj['groups_id'] = price.data('groups-id')


        obj['_csrf'] = csrfToken;
        $.ajax({
            url: '/ajax/add-to-cart',
            type: 'post',
            data: obj,
            success: function (data) {
                $('#add_to_cart').hide();
                $('#del_from_cart').css('display', 'block').attr('data-product-id', data);
                $('.cart-notice').hide().removeClass('error').addClass('success').empty().text('Успішно додано до кошика !').slideDown().delay(3000).slideUp();

            }
        });

    });


    $('button.qty').click(function (event) {

        current_el = $(this);
        item_id = current_el.closest('.cart-item').data('item-id');

        count_input = current_el.closest("div.cart-counter").find('input');
        quantity = parseInt(count_input.val());

        if (quantity != 0) {
            total_quantity = 1;
            if (current_el.hasClass('minus')) {
                if (quantity != 1) {
                    total_quantity = quantity - 1;
                }
            } else {
                total_quantity = quantity + 1;
            }

            count_input.val(total_quantity);
            change_quantity(item_id, total_quantity);


        }

    });

    $('.cart-counter input').change(function (event) {
        current_el = $(this);
        item_id = current_el.closest('.cart-item').data('item-id');
        quantity = parseInt($(this).val());
        if (quantity > 0) {
            change_quantity(item_id, quantity);
        } else {
            change_quantity(item_id, 1);
            current_el.val(1);
        }


    });


    function generate_total_price() {
        total = 0
        currency = ' грн';
        price = {};

        $(".cart-item .total > span").each(function (index, element) {
            current_result = $(this);
            total += parseInt(current_result.text());
        });

        $('.sum-column .goods_total span').text(total + currency);
        delivery = $('.sum-column .delivery_total span');
        delivery_val = parseInt(delivery.text());

        $('.cart-sum .total-sum span').text(total + delivery_val + currency);

        price['goods_total'] = total + delivery_val;
        price['delivery_total'] = delivery_val;
        price['total'] = total;
        price['_csrf'] = csrfToken;

        $.ajax({
            url: '/ajax/cart-change-total-price',
            type: 'post',
            data: price,
            success: function (data) {
            }
        });
    }


    function change_quantity(item_id, quantity) {
        obj = {};
        obj['item_id'] = item_id;
        obj['quantity'] = quantity;
        obj['_csrf'] = csrfToken;
        $.ajax({
            url: '/ajax/cart-item-change-quantity',
            type: 'post',
            data: obj,
            success: function (data) {

                cart_item = $('div[data-item-id=' + item_id + ']');
                cart_item.find('.total span').text(data.price * data.quantity);

                generate_total_price();
            }
        });

    }


    function check_all_filters() {
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
            get_price(obj);
            $('#add_to_cart').show();
            $('#del_from_cart').hide();
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

                if (data != 0) {
                    $('.price span > span').text(data[0].price).attr('data-groups-id', data[0].id);
                    $('#add_to_cart').prop("disabled", false);
                }
                else {
                    $('.price span > span').text(0).data("groups-id", '0');
                    $('#add_to_cart').prop("disabled", true);
                }
            }
        });
    }


    if ($('.filter-result').length) {
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