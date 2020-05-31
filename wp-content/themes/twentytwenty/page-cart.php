<style>
    table.shop_table {
        margin: 0 auto;
    }
    .quantity {
        justify-content: flex-end;
    }
    form.woocommerce-cart-form .actions .input-text {
        width: 160px!important;
    }
    .woocommerce-page table.cart td.actions .coupon .input-text+.button {
        padding: 17px;
        border: 1px solid #e3e3e3;
        font-size: 14px;
    }
    .checkout-button {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
    }
    .quantity > button {
        padding: 10px;
    }
    form.woocommerce-cart-form table input.qty {
        padding: 2px;
    }
    .page-container {
        padding: 0 20px;
    }
</style>
<?php
/*
Template Name: Cart Page Template
Template Post Type: Cart page
*/
// Page code here...
get_header();
while ( have_posts() ) : the_post(); ?>
    <div class="page-container">
    <?php the_content(); ?>
    </div>
    <?php endwhile;
