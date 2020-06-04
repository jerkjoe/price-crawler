<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
// do_action( 'woocommerce_account_navigation' ); ?>
<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
        // do_action( 'woocommerce_account_content' );
        
    ?>
    <div class="top-wrapper">
        <div class="user-info">
            <?php echo(wp_get_current_user()->display_name); ?>
        </div>
    </div>
    <div class="content-wrapper">
        <a href="<?php echo(get_permalink() . '/orders'); ?>" class="order-bar">
            <span>
                我的订单
            </span>   
            <span>
                查看全部订单
            </span> 
        </a>
        <div class="status-container">
            <a class="status" href="<?php echo(get_permalink() . '/orders?category=pending'); ?>">Pending</a>
            <a class="status" href="<?php echo(get_permalink() . '/orders?category=processing'); ?>">Processing</a>
            <a class="status" href="<?php echo(get_permalink() . '/orders?category=complete'); ?>">Complete</a>
        </div>
        <div class="address-container">
            <a href="<?php echo(get_permalink() . '/edit-address'); ?>">Manage Addresses</a>
        </div>
    </div>
    <style>
        .top-bar {
            display: none;
        }
        .top-wrapper {
            background-color: #dd88dd;
            padding: 40px;
        }    
        .user-info {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        
        .order-bar {
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
        }
        .status-container {
            display: flex;
            justify-content: space-between;
        }
        .status-container > .status {
            flex: 1;
            text-align: center;
            margin: 0 4px;
            padding: 10px;
        }
    </style>
</div>
