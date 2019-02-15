/**
 * Created by igenius on 19/10/16.
 */
jQuery(document).ready(function($) {
    $.fn.scrollBottom = function() { //Calcolo scroll verso il basso
        return $(document).height() - this.scrollTop() - this.height();
    };
    var $sidebar = $(".sidebar-primary"),
        $footer = $(".site-footer"),
        $window = $(window),
        offset = $sidebar.offset(),
        footerHeight = $footer.outerHeight(true);
    $window.scroll( function () {
        var floatingSpace = $(this).height() - $sidebar.outerHeight(true); //Calcolo lo spazio mancante tra la sidebar e il fondo della finestra
        if( $window.scrollTop() > offset.top ){
            if ( $(this).scrollBottom() <= footerHeight - floatingSpace ) {
                //Se lo spazio mancante all'arrivo in fondo meno l'altezza del footer è uguale
                // o minore allo scroll verso il basso allora faccio il trucco
                $sidebar.addClass('fixed-bottom').css( "bottom", footerHeight + "px" );
                $sidebar.removeClass('fix-scroll');
            } else {
                $sidebar.removeClass('fixed-bottom');
                $sidebar.addClass('fix-scroll').removeAttr( "style" );
            }
        } else {
            $sidebar.removeClass('fix-scroll');
        }
    })
});