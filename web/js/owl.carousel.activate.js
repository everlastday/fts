
jQuery(document).ready(function ($) {
var owl = $(".fts-gallery-content-list");
var slider = $(".fts-slider-new");


    slider.owlCarousel({
        //loop:true,
        margin:10,
        //autoWidth:false,
        pagination: false,
        lazyLoad:true,
        autoplay: true,
        autoplayTimeout: 4000, //Set AutoPlay to 3 seconds

        rewind: true,
        items : 1, //10 items above 1000px browser width
        nav:true,
        navContainerClass: 'slider__arrows',
        navClass: ['slider__arrows-item slider__arrows-item--left','slider__arrows-item slider__arrows-item--right'],
        navText : ['<span class="slider-left-arrow-ico"></span>','<span class="slider-right-arrow-ico"></span>'],
        dots: true,
    });
    $(".fts-slider-body").fadeIn(3000);

    owl.owlCarousel({
        // loop:true,
        margin:10,
        //autoWidth:true,
        pagination: false,
        lazyLoad:true,
        autoplay: true,
        autoplayTimeout: 3000, //Set AutoPlay to 3 seconds

        rewind: true,
        items : 3, //10 items above 1000px browser width
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            400: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }

    });
    $(".fts-gallery-content").fadeIn(3000);
});
