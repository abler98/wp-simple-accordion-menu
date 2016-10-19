(function ($) {

    $('ul.accordion').on('click', 'span', function (e) {
        $(this).next('ul.accordion').slideToggle('fast');
        $(this).toggleClass('up down');
        e.stopPropagation(); // Для вложенных элементов
    });

})(jQuery);