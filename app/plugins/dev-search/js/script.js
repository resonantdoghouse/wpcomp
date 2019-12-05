(function ($) {

    $clearFormBtn = $('.dev-clear-form');

    $clearFormBtn.on('click', function(e){
        e.preventDefault();
        $('.dev-search-input').val('');
        $('.dev-user-select').val('');
        $('.dev-category-select').val('');
        $('.dev-tag-select').val('');
    });


})(jQuery);