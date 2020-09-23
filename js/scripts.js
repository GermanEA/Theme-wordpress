// jQuery(document).ready( $ => {

//     // Menú responsive

//     $('#menu-principal').slicknav({

//         appendTo: $('.en-header .en-wrapper:last-of-type'),

//         label: '',

//     });

// });



/* CARGA DE SPLIDER */

document.addEventListener( 'DOMContentLoaded', function () {    



    var splide_lateral = new Splide( '.splide-lateral', {
        rewind      : true,
        fixedWidth  : 100,
        fixedHeight : 64,
        isNavigation: true,
        gap         : 10,
        focus       : 'center',
        pagination  : false,
        cover       : true,
        arrows      : false,

        breakpoints : {

            '600': {
                fixedWidth  : 66,
                fixedHeight : 40,
            }

        }

    } ).mount();

    var splide_central = new Splide( '.splide-central', {

        // type   : 'slide',

        perPage: 1,
        perMove: 1,
        height   : '80vh',
        pagination : false,
	    arrows     : true,
        autoWidth: true,
        focus  : 'center',
        rewind      : true,

    } );

    splide_central.sync( splide_lateral ).mount();

} );



