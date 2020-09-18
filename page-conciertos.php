<?php

/**

 * Template Name: Conciertos

 */

    get_header(); ?>

    <main class="container">
        <div class="sidebar">
            <div class="footer-enseco">
                <div class="footer-enseco-wrapper">
                    <span>ENSECO <?php echo Date('Y') ?></span>
                </div>
                <div class="footer-enseco-wrapper">
                    <span>Contratación: info@kint.es</span>
                </div>
                <div class="footer-enseco-wrapper">
                    <span>Teléfono: 658 851 367</span>
                </div>
                <div class="social-media">
                    <div class="icon-wrap-sm">
                        <a href="http://" class="icon-wrap" target="_blank">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                    </div>
                    <div class="icon-wrap-sm">
                        <a href="http://" class="icon-wrap" target="_blank">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </div>
                    <div class="icon-wrap-sm">
                        <a href="http://" class="icon-wrap" target="_blank">
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