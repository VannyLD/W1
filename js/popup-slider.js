$(document).ready(function() {
    $('.display').hide();
    $('.backed').hide();
    $('.btn-slider').on('click', function() {
        $('.sliderPop').show();
        $('.ct-sliderPop-container').addClass('open');
        $('.sliderPop').addClass('flexslider');
        $('.sliderPop .ct-sliderPop-container').addClass('slides');
        $('.culture-section').hide();
        $('.display').show();
        $('.black').hide();
        $('.backed').show();
        $('.wrapper').hide();
    });

    $('.ct-sliderPop-close').on('click', function() {
        $('.sliderPop').hide();
        $('.ct-sliderPop-container').removeClass('open');
        $('.sliderPop').removeClass('flexslider');
        $('.sliderPop .ct-sliderPop-container').removeClass('slides');
        $('.black').hide();

        $('.backed').hide();
        $('.display').show();
    });

});