(function ($) {

    // script
    // $('.jb-modal').addClass('jb-modal--active');

    $('.jb-modal').on('click', '.jb-modal--active', function(){
        console.log('click');
        $(this).removeClass('jb-modal--active');
    });

})(jQuery);