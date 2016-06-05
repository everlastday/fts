 jQuery(document).ready(function ($) {


     $('.top-nav-buttons .edit').on('click', function (e) {
         e.preventDefault();
         if($(this).data("update").length > 0) {
             link =  $(this).attr("href") + "?id=" + $(this).data("update");
             //console.log(link);
             window.location.href = link;
         }


     });


     $('.top-nav-buttons .del').on('click', function (e) {
         e.preventDefault();


         if($(this).data("del") != undefined && $(this).data("del").length > 0) {

             //alert($(this).data("del"));
             var
             ids = $(this).data("del").trim().split(' ');
             delete_link = $(this).attr("href");




             $.each( ids, function(key, value ) {
                 //alert( value );

                 $.ajax({
                     url: delete_link,
                     type: 'POST',
                     dataType: 'json',
                     data: {id: value},
                     success: function (data) {
                         if(data.result == 1) {
                             //alert(data.result);
                             $('input.action_box[value="'+ value +'"]').attr('checked', false).parents('tr').slideUp();
                         }

                     }
                 });


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
            //alert($(this).val());
            if($(this).is(":checked")) {
                $('.top-nav-buttons .edit').data("update", $(this).val());
                //console.log($('.top-nav-buttons .edit').data("update"));
            }


            map = '';
            $('.action_box').each(function() {

                if($(this).is(":checked")) {
                    //console.log($(this).val());
                    map = map  + $(this).val() + ' ';
                }
            });
            //console.log(map);
            $('.top-nav-buttons .del').data("del", map);
            //console.log($('.top-nav-buttons .del').data("del"));


            //console.log(map);

        });


        $('.photo-gallery .img-action a').on('click', function (e) {
            e.preventDefault();


            var link  = $(this);
            var delete_link = $(this).attr("href");
            var id_value = link.data('id');


            $.ajax({
                url: delete_link,
                type: 'POST',
                dataType: 'json',
                data: {id: id_value},
                success: function (data) {
                    if(data.result == 1) {
                        link.parents('li').fadeOut();
                    }

                }
            });

        });


        // Fancybox activation
       $(".fancybox").fancybox();





});
