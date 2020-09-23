<?php

/**

 * Template Name: Conciertos

 */

    get_header(); ?>

    <main class="container">
        <div class="sidebar">
            <div class="sidebar-title-wrapper">
                <h1 class="sidebar-title">CONCIERTOS</h1>
            </div>
            <div class="sidebar-footer">
                <div class="sidebar-footer-wrapper">
                    <span>ENSECO <?php echo Date('Y') ?></span>
                </div>
                <div class="sidebar-footer-wrapper">
                    <a href="mailto:info@kint.es" target="_blank">Management  / INFO@KINT.ES</a>
                </div>
                <div class="sidebar-footer-wrapper">
                    <a href="tel:+34-620-215-668">Teléfono: (+34) 620 215 668</a>
                </div>
                <div class="social-media">
                    <div class="icon-wrap-sm">
                        <a href="https://www.facebook.com/Enseco-246936252007225" class="icon-wrap" target="_blank">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                    </div>
                    <div class="icon-wrap-sm">
                        <a href="https://www.instagram.com/ensecoficial/?hl=es" class="icon-wrap" target="_blank">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </div>
                    <div class="icon-wrap-sm">
                        <a href="https://www.youtube.com/channel/UCWaaC6IFGRiZN4TJNj6pcig" class="icon-wrap" target="_blank">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>       
        </div>

        <div class="slider-container">
            <?php recover_concerts("splide-lateral", false, true) ?>
            <?php recover_concerts("splide-central", true, false) ?>
        </div>
        <div class="date-mobile">
            <?php recover_concerts("splide-lateral", false, true) ?>
        </div>
    </main>

<?php get_footer(); ?>