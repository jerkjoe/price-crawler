<style>
    .page-container {
        padding: 0 20px;
    }

    body.woocommerce-no-js form.woocommerce-form-coupon, .woocommerce-no-js form.woocommerce-form-login {
        display: none !important;
    }
</style>
<?php
/*
Template Name: Checkout Page Template
Template Post Type: Checkout page
*/
// Page code here...
get_header();
while (have_posts()) : the_post(); ?>
    <div class="page-container">
        <?php the_content(); ?>
    </div>
<?php endwhile;
