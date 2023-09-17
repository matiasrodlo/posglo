( function ( $ ) {

    $( document ).ready( function () {

        var $button = $( '#load-more-button' );

        var page_num = parseInt( pagination_data.startPage ) + 1;
        var max_pages = parseInt( pagination_data.maxPages );
        var next_link = $button.data( 'load-link' );

        var loaded_text = pagination_data.loadedText;

        var containerID = pagination_data.container;

        var $container = $( '#' + containerID );
        var container_has_isotope = false;

        if ( page_num > max_pages ) {
            $button.addClass( 'last-page' ).children( '.load-more-text' ).text( loaded_text );
        }

        $button.on( 'click', function () {

            if ( page_num <= max_pages && !$( this ).hasClass( 'loading' ) && !$( this ).hasClass( 'last-page' ) ) {

                $.ajax( {
                    type: 'GET',
                    url: next_link,
                    beforeSend: function () {
                        $button.addClass( 'loading' );
                        page_num++;
                    },
                    complete: function ( XMLHttpRequest ) {
                        if ( XMLHttpRequest.status == 200 && XMLHttpRequest.responseText != '' ) {
                            next_link = next_link.replace( /\/page\/[0-9]?/, '/page/' + page_num );

                            if ( page_num > max_pages ) {
                                $button.addClass( 'last-page' ).children( '.load-more-text' ).text( loaded_text );
                            }
                            //history.pushState('', "/page/" + page_num, next_link);
                            $button.data( 'load-link', next_link );
                            $button.removeClass( 'loading' );

                            if ( $( XMLHttpRequest.responseText ).find( '#' + containerID ).length > 0 ) {
                                container_has_isotope = $container.data( 'isotope' );
                                $( XMLHttpRequest.responseText ).find( '#' + containerID ).children().each( function () {
                                    var elem = $( this );
                                    if ( !container_has_isotope ) {
                                        elem.css( 'opacity', 0 );
                                        $container.append( elem );
                                        elem.addClass( 'animate' );
                                        CRUMINA.initSwiper( elem.find( '.swiper-container' ) );
                                    } else {
                                        $container.isotope( 'insert', elem );
                                        $container.imagesLoaded( function () {
                                            $container.isotope( 'layout' );
                                            CRUMINA.initSwiper( elem.find( '.swiper-container' ) );
                                            var $sorting_buttons = $container.siblings( '.sorting-menu' ).find( 'li' );
                                            $sorting_buttons.each( function () {
                                                var selector = $( this ).data( 'filter' );
                                                var count = $container.find( selector ).length;
                                                if ( count > 0 ) {
                                                    $( this ).css( 'display', 'inline-block' );
                                                }
                                            } );

                                        } );
                                    }
                                } );
                            }
                        }
                    }
                } );
            }
            return false;
        } );
    } );
}( jQuery ) );