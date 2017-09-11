





$('.nav-search .search-submit').click(function(e){
    e.preventDefault();

    $('.nav-search .search-field').toggleClass('search-toggle');
    $('.nav-search .search-field').focus();
});



$('.nav-search .search-field').on('blur', function(){

    $('.nav-search .search-field').toggleClass('search-toggle');

});