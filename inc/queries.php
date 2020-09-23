
<?php
//  Función para recuperar la lista de los conciertos, decir si tiene imagen y enlace a las entradas (Html versión)

function recover_concerts($nombre_slider, $set_imagen, $set_entradas) {

?>
<div class="<?php echo $nombre_slider ?>">
    <div class="splide__track">
        <ul class="splide__list">
        <?php while(have_posts() ): the_post(); ?>
                <?php 
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
                ?>
            <li class="splide__slide" data="<?php echo $month; ?>">
                <?php
                    if($set_imagen){ ?>
                        <figure class="concert-poster">
                            <img src="<?php echo $img_src ?>" alt="<?php echo $sala_conciertos ?>">
                        </figure>
                <?php } ?>
                   
                <div class="concert-date">

                    <div class="concert-date-wrapper">
                        <div class="number"><p><?php echo $day; ?></p></div>
                        <div class="month-year">
                            <p><?php echo $month; ?></p>
                            <p><?php echo $year; ?></p>
                        </div>
                    </div>                            
                    <div class="concert-card-wrapper">
                        <div class="concert-hall">
                            <span><?php echo $sala_conciertos; ?></span>
                        </div>                                    
                        <div class="location-wrapper">
                            <?php echo $direccion; ?>
                            (<?php echo $ciudad; ?>)
                        </div>
                    </div>
                </div>
                <div class="concert-sale">
                    <?php 
                        if ($set_entradas) {
                            if ($entradas) { ?>
                                <a href="<?php echo $entradas; ?>">ENTRADAS</a>
                            <?php }else{ ?>
                            <span>ENTRADA LIBRE</span>
                        <?php }} ?>                           
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?> 
            <?php endwhile; ?>
        </ul>
    </div>
</div>

<?php } ?>

<?php
// Función para recuperar la lista de los conciertos, decir si tiene imagen y enlace a las entradas (PHP versión)
 

    function recover_concerts_php($nombre_slider, $set_imagen, $set_entradas) {

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

?>

<?php

//  Función para recuperar los nombres de la lista de los videos

function recover_videos($set_video, $class) {

    ?>
    <div class="<?php echo $class; ?>media-wrapper">
        <div class="<?php echo $class; ?>videos-wrapper">
            <ul class="<?php echo $class; ?>videos-list">
            <?php while(have_posts() ): the_post(); ?>
                    <?php 
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
    
                    ?>
                <li class="<?php echo $class; ?>video-wrapper">                    
                    
                    <?php if($set_video) { ?>

                        <div id="video-<?php echo $cont; ?>" class="video-url">
                            <iframe src="<?php echo $url_video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
    
                    <?php } else { ?>
    
                        <a href="#video-<?php echo $cont; ?>" class="sidebar-video-nombre">
                            <div><?php echo $nombre_video ?></div>
                        </a>
    
                    <?php } ?>
                </li>
                <?php endwhile; wp_reset_postdata(); ?> 
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
    
    <?php } ?>


<?php

//  Función para recuperar la lista de los discos

function recover_discografia($nombre_slider, $set_imagen, $set_entradas) {

?>
<div class="<?php echo $nombre_slider ?>">
    <div class="splide__track">
        <ul class="splide__list">
        <?php while(have_posts() ): the_post(); ?>
                <?php 
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
                ?>
            <li class="splide__slide">
                <?php 
                    if ($set_imagen) { ?>
                    
                        <figure class="portada">
                            <a href="<?php echo $url_disco ?>">
                                <img src="<?php echo $img_src ?>" alt="<?php echo $img_name ?>">
                            </a>
                        </figure>
                    
                                
                <?php } ?>
                <div class="<?php echo $class; ?>header-disco">
                    <div class="<?php echo $class; ?>nombre-disco">
                        <span><?php echo $nombre_disco; ?></span>
                    </div>
                    <div class="fecha-disco">
                        <span><?php echo $year; ?></span>
                    </div>                
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?> 
            <?php endwhile; ?>
        </ul>
    </div>
</div>

<?php } ?>
