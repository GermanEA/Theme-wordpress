<!DOCTYPE html>



<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <?php wp_head(); ?>



</head>



<body <?php body_class('contact-theme') ?> >

    

    <div class="en-content site-header">

        <header class="en-header">        

            <div class="en-wrapper">

                <h1 class="sr-only">

                    <img src="/wp-content/themes/enseco/img/logo.png" alt="Enseco" />

                    <p>Bienvenido a la web de Enseco</p>

                </h1>

            </div>



            <div class="en-wrapper">

                <?php $args = array(

                        'theme_location' => 'menu-principal', 

                        'container' => 'nav',

                        'container_class' => 'main-menu',

                    );

                

                    wp_nav_menu($args); 

                ?>

                <div class="cd-header">

                    <div class="header-wrapper">

                        <div class="nav-but-wrap">

                            <div class="menu-icon hover-target" id="menu-button">

                                <span class="menu-icon__line menu-icon__line-left"></span>

                                <span class="menu-icon__line"></span>

                                <span class="menu-icon__line menu-icon__line-right"></span>

                            </div>					

                        </div>

                    </div>

                    <div class="nav-header">
                        <span class="nombre-enseco">ENSECO</span>
                    </div>

                </div>      

            </div>

        </header>

        <div class="nav">

            <?php $args = array(

                    'theme_location'    => 'menu-mobile', 

                    'container'         => 'div',

                    'container_class'   => 'nav__content',

                    'container_id'      => 'menu-mobile',

                    'menu_class'        => 'nav__list',

                    'add_li_class'      => 'nav__list-item'

                );

            

                wp_nav_menu($args); 

            ?>

        </div>



        <div class="header-front-content">

            <p class="heading-front"><?php the_field('encabezado')?></p>

            <P class="description-front"><?php the_field('descripcion') ?></P>

            <div class="social-media">

                <a href="https://www.facebook.com/Enseco-246936252007225" class="icon-wrap" target="_blank">

                    <i class="fab fa-facebook"></i>

                </a>

                <a href="https://www.instagram.com/ensecoficial/?hl=es" class="icon-wrap" target="_blank">

                    <i class="fab fa-instagram"></i>

                </a>

                <a href="https://www.youtube.com/channel/UCWaaC6IFGRiZN4TJNj6pcig" class="icon-wrap" target="_blank">

                    <i class="fab fa-youtube"></i>

                </a>



            </div>

        </div>



    </div>



