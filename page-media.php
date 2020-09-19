<?php

/**

 * Template Name: Media

 */

    get_header(); ?>

    <main class="media-container">
        <div class="sidebar">
            <div class="sidebar-title-wrapper">
                <h1 class="sidebar-title">VIDEOS</h1>
            </div>
            <div class="sidebar-container">
                <?php recover_nombre_videos() ?>
            </div>
            <div class="sidebar-footer">
                <div class="sidebar-footer-wrapper">
                    <span>ENSECO <?php echo Date('Y') ?></span>
                </div>
                <div class="sidebar-footer-wrapper">
                    <span>Contratación: info@kint.es</span>
                </div>
                <div class="sidebar-footer-wrapper">
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

        <?php recover_videos() ?>
        
    </main>

<?php get_footer(); ?>