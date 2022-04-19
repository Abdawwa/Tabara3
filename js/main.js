//for calc slider height//
$(function() {
    'use strict';
    // Adjust Slider Height
    var windowH = $(window).height(),
    navH = $('.navbar').innerHeight();
    $('.slide, .carousel-item').height(windowH - navH);

//for calc slider height//


    //featured work shuffle
    /*$('.Featured-Work ul li').on('click', function(){
        $(this).addClass('active').siblings().removeClass('active');
        //console.log($(this).data('class'));
        if($(this).data('class') ==='all'){
            $('.shuffle-images .col-md').css('opacity',1);
        }
        else{
            $('.shuffle-images .col-md').css('opacity','.09');
            $($(this).data('class')).parent().css('opacity',1);
        }
    });
*/
});
//featured work shuffle