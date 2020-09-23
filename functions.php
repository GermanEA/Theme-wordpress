<?php

    /* Queries */

    //require get_template_directory() . '/inc/queries.php';
    
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

    function recover_concerts($nombre_slider, $set_imagen, $set_entradas) {

        echo '<div class="'.$nombre_slider.'">';
            echo '<div class="splide__track">';
                echo '<ul class="splide__list">';

                    while(have_posts() ): the_post();

                        $args = array(
                            'post_type' => 'enseco_concierto',
                            //'posts_per_page' => 1,
                            'orderby'  => 'meta_value_num',
                            'order'    => 'ASC',
                            'meta_key' => 'fecha_concierto'
                        );

                        $conciertos = new WP_Query($args);

                        while( $conciertos->have_posts() ): $conciertos->the_post();
                        $date = get_field('fecha_concierto'); 
                        $day = substr($date, 0, 2);
                        $month = substr($date, 3, 3);
                        $year = substr($date, -4);

                        $direccion = get_field('direccion_concierto');
                        $ciudad = get_field('ciudad_concierto');
                        $sala_conciertos = get_field('sala_concierto');
                        $entradas = get_field('entradas');
                        $direccion = get_field('direccion_concierto');
                        $concierto = get_field('ciudad_concierto');
                        $img = get_field('cartel_concierto');

                        if ($img){
                            $img_src = $img['sizes']['large'];
                            $img_url = $img['url'];
                            $img_name = $img['name'];
                        }

                        echo '<li class="splide__slide" data="'.$month.'">';

                        if($set_imagen){
                            echo '<figure class="concert-poster">';
                            echo '<img src="'.$img_src.'" alt="'.$sala_conciertos.'">';
                            echo '</figure>';
                        }

                            echo '<div class="concert-date">';
                                echo '<div class="concert-date-wrapper">';
                                    echo '<div class="number"><p>'.$day.'</p></div>';
                                    echo '<div class="month-year">';
                                        echo '<p>'.$month.'</p>';
                                        echo '<p>'.$year.'</p>';
                                    echo '</div>';
                                echo '</div>';                            
                                echo '<div class="concert-card-wrapper">';
                                    echo '<div class="concert-hall">';
                                        echo '<span>'.$sala_conciertos.'</span>';
                                    echo '</div>';                                   
                                    echo '<div class="location-wrapper">'.$direccion.' ('.$concierto.')</div>';
                                echo '</div>';
                            echo '</div>';                     

                            if($set_entradas) {
                                if ($entradas) { 
                                    echo '<a class="concert-sale" href="'.$entradas.'">ENTRADAS</a>';
                                }else{
                                    echo '<div class="concert-sale">';
                                    echo '<span>ENTRADA LIBRE</span>';
                                    echo '</div>';
                                }
                            }

                        echo '</li>';

                        endwhile; wp_reset_postdata(); 
                    endwhile;              

                echo '</ul>';
            echo '</div>'; 
        echo '</div>'; 
    }

    function recover_videos($set_video, $class) {

    
        echo '<div class="'.$class.'media-wrapper">';
            echo '<div class="'.$class.'videos-wrapper">';
                echo '<ul class="'.$class.'videos-list">';
                while(have_posts() ): the_post();
                    $args = array(
                        'post_type' => 'enseco_video',
                        'order'    => 'ASC',
                    );

                    $videos = new WP_Query($args);
                    $cont = 0;

                    while( $videos->have_posts() ): $videos->the_post();
                    $nombre_video = get_field('nombre_video');
                    $descripcion_video = get_field('descripcion_video');
                    $url_video = get_field('url_video');
                    $cont ++;
        
                    echo '<li class="'.$class.'video-wrapper">';                    
                        
                        if($set_video) {
    
                            echo '<div id="video-'.$cont.'" class="video-url">';
                                echo '<iframe src="'.$url_video.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            echo '</div>';
        
                        } else {
        
                            echo '<a href="#video-'.$cont.'" class="sidebar-video-nombre">';
                                echo '<div>'.$nombre_video.'</div>';
                            echo '</a>';
                        }
                        
                    echo '</li>';
                    endwhile; wp_reset_postdata();
                    endwhile;
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    }

    function recover_discografia($nombre_slider, $set_imagen, $set_entradas) {

        echo '<div class="'.$nombre_slider.'">';
            echo '<div class="splide__track">';
                echo '<ul class="splide__list">';
                while(have_posts() ): the_post();
                            $args = array(
                                'post_type' => 'enseco_disco',
                                'order'    => 'ASC',
                            );
        
                            $discos = new WP_Query($args);
        
                            while( $discos->have_posts() ): $discos->the_post();
                            $date = get_field('fecha_salida'); 
                            $day = substr($date, 0, 2);
                            $month = substr($date, 3, 3);
                            $year = substr($date, -4);
                            $nombre_disco = get_field('nombre_disco');
                            $img = get_field('portada');
                            $url_disco = get_field('url_disco');
        
                            if ($img){
                                $img_src = $img['sizes']['large'];
                                $img_url = $img['url'];
                                $img_name = $img['name'];
                            }
                    echo '<li class="splide__slide">';
                            if ($set_imagen) {
                            
                                echo '<figure class="portada">';
                                    echo '<a href="'.$url_disco.'" target="_blank">';
                                        echo '<img src="'.$img_src.'" alt="'.$img_name.'">';
                                    echo '</a>';
                                echo '</figure>';
                            }

                        echo '<div class="'.$class.'header-disco">';
                            echo '<div class="'.$class.'nombre-disco">';
                                echo '<span>'.$nombre_disco.'</span>';
                            echo '</div>';
                            echo '<div class="fecha-disco">';
                                echo '<span>'.$year.'</span>';
                            echo '</div>';                
                        echo '</div>';
                    echo '</li>';
                    endwhile; wp_reset_postdata(); 
                    endwhile;
                echo '</ul>';
            echo '</div>';
        echo '</div>';
    }

?>