<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

</head>

<body <?php body_class('light-theme') ?> >
    
    <div class="en-content">
        <header class="en-header">        
            <div class="en-wrapper">
                <h1 class="sr-only">
                    <img src="/wp-content/themes/enseco/img/logo.png" alt="Enseco" />
                    <p>Bienvenido a la web de Enseco</p>
                </h1>
            </div>

            <div class="en-wrapper">
                <?php $args = array(
                        'theme_location'  => 'menu-principal', 
                        'container'       => 'nav',
                        'container_class' => 'main-menu',
                        'add_li_class'    => 'light-nav'
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

    </div>

