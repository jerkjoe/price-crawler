<?php

/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>

    <header id="site-header" class="header-footer-group" role="banner"
        style="position: fixed; width: 100%; background-color: #fff; z-index:9999">

        <div class="header-inner section-inner">

            <div class="header-titles-wrapper">

                <?php

                // Check whether the header search is activated in the customizer.
                $enable_header_search = get_theme_mod('enable_header_search', true);

                if (true === $enable_header_search) {

                ?>

                <div data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal"
                    data-set-focus=".search-modal .search-field" aria-expanded="false"
                    style="position: fixed; width: 100%; padding: .25em; background-color: #fff; z-index:9999">
                    <p
                        style="margin: 0 auto; padding-left: 30px; color: #999; margin-bottom: 0; text-align: left; line-height: 38px; width: 90%; background-color: #e3e3e3; border-radius: 20px; height: 70%;">
                        想找什么？
                    </p>
                </div><!-- .search-toggle -->

                <?php } ?>

                <div class="header-titles">
                </div><!-- .header-titles -->
                <!-- .nav-toggle -->

            </div><!-- .header-titles-wrapper -->

            <div class="header-navigation-wrapper">
            </div><!-- .header-navigation-wrapper -->

        </div><!-- .header-inner -->


        <?php
        // Output the search modal (if it is activated in the customizer).
        if (true === $enable_header_search) { ?>
        <!-- <div style="margin-top: 85px;"> -->
        <?php get_template_part('template-parts/modal-search'); ?>
        <!-- </div> -->
        <?php    } ?>


    </header><!-- #site-header -->
    <div style="padding-bottom: 63px;">

    </div>
    <?php
    // Output the menu modal.
    get_template_part('template-parts/modal-menu');