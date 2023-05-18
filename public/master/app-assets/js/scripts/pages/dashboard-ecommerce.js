$(window).on("load", function(){

    /************************************************************
    *               Social Cards Content Slider                 *
    ************************************************************/
    // RTL Support
    var rtl = false;
    if($('html').data('textdirection') == 'rtl'){
        rtl = true;
    }
    if(rtl === true)
        $(".fb-post-slider").attr('dir', 'rtl');

    // FB Post Slider
    $(".fb-post-slider").unslider({
        autoplay: true,
        delay: 4500,
        arrows: false,
        nav: false,
        infinite: true
    });

});
