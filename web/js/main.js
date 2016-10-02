
$( document ).ready(function() {

    $('.fts-products-menu > li > a').each(function(){
       
        $(this).click(function(e){
            e.stopPropagation();
            
            ftsSubmenuBg = $(this).next();
            ftsActiveButton = $('.fts-products-menu').find('.active');
            
            if(ftsSubmenuBg.attr('class') === "fts-submenu-bg") {
                e.preventDefault();                
                if(ftsSubmenuBg.is(':visible')){
                    ftsSubmenuBg.slideUp(700).prev().removeClass('active');
                }
                else{
                    
                    if(ftsActiveButton) {
                       ftsActiveButton.next().slideUp(300);
                       ftsActiveButton.removeClass('active');
                    }
                    
                    ftsSubmenuBg.slideDown(700).prev().addClass('active');
                }
            }

       });
    });
    
    
    $('html').click(function() {

            ftsActiveButton = $('.fts-products-menu').find('.fts-submenu-bg:visible');
            if(ftsActiveButton.length > 0) {
               ftsActiveButton.slideUp(300);
               ftsActiveButton.prev().removeClass('active');
            }

    });
    
    $('.toggle-top-button').click(function() {
        var topMenu = $('.top-menu');
        var button = $('.toggle-top-button span');
        var margin = topMenu.css('margin-top');
        
        if( margin == '0px') {
            topMenu.animate({'margin-top' : '-50px'});
            button.removeClass('up').addClass('down');
        } else {
            topMenu.animate({'margin-top' : '0px'});
            button.removeClass('down').addClass('up');
        }
        
       

    });
    
    function slider_caption_width() {
        var w = $(window).width();
        $('.full-width .slide-caption').css('width', w + 'px');
    }
    slider_caption_width();
    $(window).resize(function() { slider_caption_width(); });
    
    
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

    var fancyboxFts =  $(".fancybox");

    if (fancyboxFts.length > 0) {
        // Fancybox activation
        fancyboxFts.fancybox();
    }
    
});