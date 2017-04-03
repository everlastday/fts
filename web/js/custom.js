jQuery(document).ready(function ($) {

    var csrfToken = $('meta[name="csrf-token"]').attr("content");


    $('.top-nav-buttons .edit').on('click', function (e) {
        e.preventDefault();
        if ($(this).data("update").length > 0) {
            link = $(this).attr("href") + "?id=" + $(this).data("update");
            //console.log(link);
            window.location.href = link;
        }


    });
    $('.order-action').on('click', function (e) {
        e.preventDefault();

        var status = $(this);
        var link = status.attr('href');
        var obj = {};
        obj['_csrf'] = csrfToken;
        obj['id'] = status.data("id");
        obj['status'] = status.data("status");

        if (status.data("status") != null) {
            if (status.data("status") == 'payed') {
                if (!window.confirm("Підтвердити оплату?")) {
                    return false;
                }
                $.ajax({
                    url: link,
                    type: 'post',
                    data: obj,
                    success: function (data) {
                        if (data == 1) {
                            status.hide();
                            status.closest('.order-body').find('.order-status-line span').html('так');
                        }
                    }
                });
            } else {
                $.ajax({
                    url: link,
                    type: 'post',
                    data: obj,
                    success: function (data) {
                        console.log(data);
                        if (data == 1) {
                            status.closest('.order-body').slideUp();
                            //status.hide();
                            //status.closest('.order-body').find('.order-status-line span').html('так');
                        }
                    }
                });
            }
        }
    });

    $('.top-nav-buttons .del').on('click', function (e) {
        e.preventDefault();

        if ($(this).data("del") != undefined && $(this).data("del").length > 0) {
            var ids = $(this).data("del").trim().split(' ');
            var delete_link = $(this).attr("href");
            var message_errors = 0;
            var message_success = 0;

            $.each(ids, function (key, value) {
                $.ajax({
                    url: delete_link,
                    type: 'POST',
                    dataType: 'json',
                    data: {id: value},
                    success: function (data) {
                        if (data.result == 1) {
                            message_success += 1;
                            $('input.action_box[value="' + value + '"]').attr('checked', false).parents('tr').slideUp();
                        } else if (data.result == 2) {
                            message_success += 1;
                            $('input.action_box[value="' + value + '"]').attr('checked', false).closest('.order-body').slideUp();
                        } else {
                            message_errors += 1;
                        }
                    }
                });
            });

            $(document).ajaxStop(function () {
                if (message_success > 0) {
                    $('#main_messages')
                        .addClass('alert alert-success')
                        .html('Успішно видалено!')
                        .slideDown()
                        .delay(3000)
                        .slideUp();
                }

                if (message_errors > 0) {
                    $('#main_messages')
                        .addClass('alert alert-error')
                        .html('Виникла помилка при видаленні даних')
                        .slideDown()
                        .delay(3000)
                        .slideUp();
                }

                $(this).unbind("ajaxStop");
            });


            //console.log(ids);


            //$.ajax({
            //    url: $(this).attr("href"),
            //    type: 'post',
            //    dataType: 'json',
            //    data: {id: $(this).data("del")},
            //    success: function (data) {
            //        alert(data);
            //
            //    }
            //});

            //link =  $(this).attr("href") + "?id=" + $(this).data("update");
            //console.log(link);
            //window.location.href = link;
        }


    });

    $('.action_box').on('change', function () {
        if ($(this).is(":checked")) {
            $('.top-nav-buttons .edit').data("update", $(this).val());
        }


        map = '';
        $('.action_box').each(function () {

            if ($(this).is(":checked")) {
                //console.log($(this).val());
                map = map + $(this).val() + ' ';
            }
        });
        $('.top-nav-buttons .del').data("del", map);
    });

    $('.photo-gallery .img-action a').on('click', function (e) {
        e.preventDefault();


        var link = $(this);
        var delete_link = $(this).attr("href");
        var id_value = link.data('id');


        $.ajax({
            url: delete_link,
            type: 'POST',
            dataType: 'json',
            data: {id: id_value},
            success: function (data) {
                if (data.result == 1) {
                    link.parents('li').fadeOut();
                }

            }
        });

    });

    var fancyboxFts = $(".fancybox");
    if (fancyboxFts.length > 0) {
        fancyboxFts.fancybox();
    }
});
