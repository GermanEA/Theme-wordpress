<?php

    /* Queries */

    require get_template_directory() . '/inc/queries.php';

    /* Setup */

    function enseco_setup() {

        //activate post-thumbnails
        add_theme_support( 'post-thumbnails' );

        // Custom background

        $defaults = array(
            'default-color'          => '',
            'default-image'          => '',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'           => 'auto',
            'default-attachment'     => 'scroll',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        );

        add_theme_support( 'custom-background', $defaults );

        //add custom image size
        add_image_size( 'square', 350, 350, true );
        add_image_size( 'portrait', 350, 724, true );
        add_image_size( 'boxes', 400, 375, true );
        add_image_size( 'medium', 700, 400, true );
        add_image_size( 'blog', 966, 364, true );

    }

    add_action( 'after_setup_theme', 'enseco_setup');

    //Scripts y Styles

    function enseco_styles() {

        wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1' );
        // wp_enqueue_style( 'googlefont-one', 'https://fonts.googleapis.com/css2?family=Kanit&family=Montserrat:wght@500;600&family=Oswald&display=swap', array(), '1.0.0');
        wp_enqueue_style( 'google-fonts', grupo_google_fonts() );
        wp_enqueue_style( 'font_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css', array(), '4.7.0');
        wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css', array(), '2.11.3' );
        wp_enqueue_style( 'splide', get_template_directory_uri() . '/css/splide-sea-green.min.css', array(), '2.4.12' );

        wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize', 'google-fonts', 'font_awesome', 'lightbox', 'splide'), '1.0.0' );

        //js

        wp_enqueue_script( 'nav-mobile-js', get_template_directory_uri() . '/js/nav-mobile.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', true);
        wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '2.11.3', true);
        wp_enqueue_script( 'splide', get_template_directory_uri() . '/js/splide.min.js', array('jquery'), '2.4.12', true);
    }

    add_action( 'wp_enqueue_scripts', 'enseco_styles' );

    // Función para agregar varias fuentes

    function grupo_google_fonts() {

        $fonts = array (
            "Kanit:400",
            "Montserrat:400",
            "Fjalla One:400"
        );

        $fonts_collection = add_query_arg( array (
            "family" => urlencode(implode("|", $fonts)),
            "subset" => "latin"),
            'https://fonts.googleapis.com/css');

            return $fonts_collection;
    }

    //Menus de navegación

    function enseco_menus() {

        //Array asociativo para registrar todos los menus
        register_nav_menus(array( 
            "menu-principal" => __( "Menu Principal", "enseco" ),
            "menu-mobile" => __( "Menu Mobile", "enseco" )
        ));
    }

    add_action( 'init', 'enseco_menus' );

    // Modificar los li del menu mobile

    function add_additional_class_on_li($classes, $item, $args) {

        if(isset($args->add_li_class)) {
            $classes[] = $args->add_li_class;
        }

        return $classes;
    }

    add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

    /* Hero Image */

    function enseco_hero_image() {

        $front_page_id = get_option('page_on_front');//id pagina principal
        $id_img = get_field('imagen_hero', $front_page_id);//id imagen
        $img = wp_get_attachment_image_src($id_img, 'full')[0]; //ruta imagen

        //Style css

        wp_register_style('custom', false);
        wp_enqueue_style('custom');

        $imagen_destacada_css = "
            body.home .site-header{
                background-image: linear-gradient( rgba(0,0,0,0.3), rgba(0,0,0,0.3) ), url($img);
            }
        ";

        wp_add_inline_style('custom', $imagen_destacada_css);
    }

    add_action('init', 'enseco_hero_image');

?>