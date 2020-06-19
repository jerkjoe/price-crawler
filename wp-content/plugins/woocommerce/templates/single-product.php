<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
$test_img = 'data:image/png;base64,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" class="close'
?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
// do_action( 'woocommerce_before_main_content' );
?>
<style> 
    #site-header,
    #site-footer,
    .header-gap {
        display: none;
    }
    .yith-wcwl-wishlistexistsbrowse {
        text-align: center;
    }
    .product-detail-tab {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
        text-align: center;
        border-bottom: 1px solid #e3e3e3;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 10;
        background-color: #fff;
    }

    .tab-item {
        flex: 1;
    }

    .content-wrapper {
        padding-top: 25px;
    }

    .content-wrapper>section {
        display: none;
    }

    .content-wrapper>section.active {
        display: block;
    }

    .tab-item {
        position: relative;
    }

    .tab-item.active::after {
        content: '';
        display: block;
        width: 20px;
        height: 2px;
        background-color: #229966;
        position: absolute;
        left: calc(50% - 10px);
        bottom: -10px;
    }

    .flex-viewport {
        margin-bottom: 8px;
    }

    .flex-viewport img {
        width: 100%;
        height: 350px;
    }

    .flex-control-nav {
        display: flex;
        justify-content: center;
    }

    .flex-control-thumbs li {
        width: 20px !important;
        margin: 0 10px !important;
        border: 1px solid #e3e3e3;
    }

    .product-info-container {
        padding: 0 20px;
    }

    .product-title {
        font-size: 16px;
        text-align: center;
    }

    .product-price {
        text-align: center;
    }

    .button-container {
        display: flex;
        justify-content: space-evenly;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        box-shadow: 0 0 5px 0 #999;
    }

    .button-container>button {
        flex: 1;
    }

    .button-container>.open-form {
        flex: 2;
        border-left: 1px solid #fff;
    }

    #reviews-content {
        padding-left: 3%;
        padding-right: 4%;
    }

    #reply-title {
        display: inline-block;
    }
    .add-to-cart-container {
        border-top: 1px solid #e3e3e3;
        min-height: 300px;
        padding: 20px;
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 102;
        background-color: #fff;
    }
    .add-to-cart-container.active {
        display: block;
    }
    table.variations {
        margin-top: 10px;
    }
    .close-add-to-cart {
        text-align: right;
    }
    .close-add-to-cart > img {
        display: inline-block;
    }
</style>
<div class="product-detail-tab">
    <div class="tab-item" name="item" id="item">
        商品
    </div>
    <div class="tab-item" name="details" id="details">
        详情
    </div>
    <div class="tab-item" name="reviews" id="reviews">
        评价
    </div>
</div>
<div class="content-wrapper">
    <section id="item-content">
        <?php

        global $product;
        the_post();

        // wc_get_template_part('content', 'single-product');
        // print_r($product->get_description());
        woocommerce_show_product_images();
        ?>
        <div class="product-info-container">
            <!-- name -->
            <h2 class="product-title">
                <?php the_title(); ?>
            </h2>
            <!-- price -->
            <p class="product-price">
                <?php echo ($product->get_price_html()); ?>
            </p>
            <p>
                <?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
            </p>
        </div>
    </section>
    <section id="details-content">
        <?php echo (apply_filters('the_content', $product->get_description())); ?>
    </section>
    <section id="reviews-content">
        <?php
            comments_template();
        ?>
    </section>
</div>
<div class="add-to-cart-container">
    <div class="close-add-to-cart" onclick="closeAddToCart()">
        <img data-v-3125a6b3="" src="<?php echo($test_img); ?>">
    </div>
    
    <?php 
        woocommerce_template_single_add_to_cart();
        // woocommerce_simple_add_to_cart();
    ?>
</div>
<div class="button-container">
    <?php 
        global $woocommerce;
        $cart_page_url = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
    ?>
    <a href="<?php echo($cart_page_url); ?>">
        <button>
            购物车
        </button>
    </a>
    <button class="open-form">
        加入购物车
    </button>
</div>
<script>
    var showAddToCart = false
    function closeAddToCart() {
        showAddToCart = false
        document.querySelector('.add-to-cart-container').classList = 'add-to-cart-container'
    }
    document.addEventListener('DOMContentLoaded', function(event) {
        
        var addToCart = document.querySelector('.open-form')
        addToCart.addEventListener('click', function() {
            showAddToCart = true
            document.querySelector('.add-to-cart-container').classList = 'add-to-cart-container active'
        })
        
        
        
        var tabs = document.querySelectorAll('.tab-item')
        var prevTab = 'item'
        document.querySelector('#' + prevTab + '-content').className = 'active'
        document.querySelector('#' + prevTab).className = 'tab-item active'
        for (var i = 0; i < tabs.length; i++) {
            var tab = tabs[i]
            tab.addEventListener('click', function(e) {
                e.target.className = 'tab-item active'
                document.querySelector('#' + prevTab).className = 'tab-item'
                var prevElement = document.querySelector('#' + prevTab + '-content')
                prevElement.className = ''
                currentElement = document.querySelector('#' + e.target.id + '-content')
                currentElement.className = 'active'
                prevTab = e.target.id
            })
        }
    })
</script>

<?php while (have_posts()) : ?>
    <?php the_post();
    global $product;
    ?>


    <?php
    print_r($product->get_regular_price);
    echo ($product->get_sale_price());
    // woocommerce_template_single_title()
    // do_action( 'woocommerce_single_product_summary' );
    // wc_get_template_part( 'content', 'single-product' );
    ?>

<?php endwhile; // end of the loop. 
?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
// do_action('woocommerce_after_main_content');
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action('woocommerce_sidebar');
?>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
