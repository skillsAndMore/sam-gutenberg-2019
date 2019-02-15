jQuery(document).ready(function($) {
    $( '.testimonials .wrap' ).slick({
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        dots: true
    });

    $('#old_reviews').slick({
        appendArrows: 'hr',
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        dots: false,
        slide: '.llms_review',
        prevArrow: '<button type="button" class="btn gray slick-prev">&lt; Precedente</button>',
        nextArrow: '<button type="button" class="btn gray slick-next">Prossima &gt;</button>',
    });
});
