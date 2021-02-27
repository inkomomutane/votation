$(document).ready(function() {
    "use strict";

    PageScroll();

    // Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length > 0) {
            $('.preloader').delay(200).fadeOut(500);
        }
    }

    handlePreloader();


    $('.symptom').owlCarousel({
        loop:false,
        margin:25,
        nav:false,
        autoplay:false,  
        dots:false,
        items:3,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            900:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    })



    $('.banner-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:false,
        autoplay:true,  
        dots:true,
        items:1        
    })
    $('.feedback-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:false,
        autoplay:true,  
        dots:true,
        items:1        
    })
 

    $('.slide-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        autoplay:false,  
        dots:false,
        items:4,
        navText:['<img src="images/left.png" alt="icon" />','<img src="images/right.png" alt="icon" />'],
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3,
            },
            1200:{
                items:4,
            }
            
        }
    })

    $('.slide-slider-full').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        autoplay:false,  
        dots:false,
        items:5,
        navText:['<img src="images/left.png" alt="icon" />','<img src="images/right.png" alt="icon" />'],
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3,
            },
            1200:{
                items:3,
            },
            1600:{
                items:5,
            }
        }
         
    })

    $('.category-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        autoplay:false,  
        dots:false,
        items:6,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:4,
            },
            1200:{
                items:5,
            },
            1600:{
                items:6,
            }
        }       
         
    })
    $('.team-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:false,
        autoplay:false,  
        dots:false,
        items:7     ,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:5,
            },
            1200:{
                items:6,
            },
            1600:{
                items:7,
            }
        }    
         
    })

    $('.team-slider-full').owlCarousel({
        loop:false,
        margin:15,
        nav:false,
        autoplay:false,  
        dots:false,
        items:9 ,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:5,
            },
            1200:{
                items:6,
            },
            1600:{
                items:9,
            }
        }      
         
    })

    $('.member-bttn2').on('click', function() {
        $('.member-1').fadeOut(0);
        $('.member-2').fadeIn();
        $('.member-ul').find('li:nth-child(2)').addClass('active');
        return false;
    });

    $('.member-bttn3').on('click', function() {
        $('.member-2').fadeOut(0);
        $('.member-3').fadeIn();
        $('.member-ul').find('li:nth-child(3)').addClass('active');
        return false;
    });
    $('.member-bttn4').on('click', function() {
        $('.member-3').fadeOut(0);
        $('.member-4').fadeIn();
        return false;
    });

    $('.add-wishlist').on('click', function() {
        $(this).attr('src','images/checkmark.png')
        return false;
    });

    $('.btn-video').on('click', function() {
        $('.backdrop').addClass('open');
        $('.player-container').fadeIn();
        return false;
    });

    $('.btn-lightbox-close').on('click', function() {
        $('.backdrop').removeClass('open');
        $('.player-container').fadeOut();
        return false;
    });
    

    
    

    $('.switchcolor').on('click', function() {
        $(this).addClass('active');
        $('.backdrop').addClass('active');
        $('.switchcolor-wrap').addClass('active'); 
    });

    $('.sheet-close,.backdrop').on('click', function() {
        $('.switchcolor').removeClass('active');
        $('.backdrop').removeClass('active');
        $('.switchcolor-wrap').removeClass('active'); 
    });

    $('.toggle input').on('change', function () {
        if (this.checked) {
            $('body').addClass('theme-dark');
        } else {
            $('body').removeClass('theme-dark');
        }
    });

    $('input[name="color-radio"]').on('change', function () {
        if (this.checked) {
          $('body').removeClass('color-theme-pink color-theme-blue color-theme-red color-theme-black color-theme-gray color-theme-orange color-theme-yellow color-theme-green color-theme-white color-theme-brown color-theme-darkgreen color-theme-deeppink color-theme-darkorchid');
          $('body').addClass('color-theme-' + $(this).val());
        }
    });

});





function PageScroll() {
   $(".scroll-tiger").on("click", function(e) {
        var $anchor = $(this);
        $("html, body").stop().animate({
            scrollTop: $($anchor.attr("href")).offset().top - 0
        }, 1500, 'easeInOutExpo');
        $('.overlay-section').removeClass('active'); 
        e.preventDefault();

    });
}