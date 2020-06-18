<?php
    get_header();

    echo do_shortcode('[yith_wcwl_wishlist]');
?>
<div class="text-align-center">
    <a href="<?php echo get_site_url(); ?>">Back to Home</a>
</div>
<style>
    .text-align-center {
        text-align: center;
    }
    #site-header,
    #site-footer,
    .yith-wcwl-share,
    .header-gap {
        display: none;
    }    
    .wishlist-title {
        text-align: center;
        border-bottom: 1px solid #e3e3e3;
        width: 100%;
        margin-bottom: 20px;
        padding: 20px;
    }
    .item-details h3 {
        margin: 0;
    }
    .shop_table > li {
        padding: 4px 20px;
        margin: 0;
        border-bottom: 1px solid #e3e3e3;
    }
</style>