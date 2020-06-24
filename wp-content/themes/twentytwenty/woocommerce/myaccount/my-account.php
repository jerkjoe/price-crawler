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

defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
// do_action( 'woocommerce_account_navigation' ); 
?>
<div class="woocommerce-MyAccount-content">
    <?php
    /**
     * My Account content.
     *
     * @since 2.6.0
     */
    // do_action( 'woocommerce_account_content' );

    add_action('bottom_nav_bar', 'add_bottom_nav_bar');
    function add_bottom_nav_bar()
    {
        ?>
        <style>
            .bottom-nav {
                position: fixed;
                bottom: 0;
                left: 0;
                background-color: #fff;
                border-top: 2px solid #e3e3e3;
                width: 100%;
                display: flex;
                justify-content: space-around;
                padding: 4px 10px;
            }
            .nav-item {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                font-size: 12px;
                line-height: 1.5;
                text-decoration: none;
                color: #999;
            }
            .logo-container {
                width: 50%;
            }
        </style>
        <div class="bottom-nav">
            <a href="<?php echo get_home_url(); ?>" class="nav-item">
                <div class="logo-container">
                <img data-v-13b18696="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAABx0lEQVR4AWJwL/AZURjQrj3AyhUGYRiujbhujFph7TbeoHYbe4PajF1HVYza7px/7Y1R23anX3nNw9k7m7xrzBPsYVMFK1jBClawghV848aNEegkeoSeonPGmFElCQZuBfqOuJq2lgyYmVsCtBtxHR0qFottRIOz2WxHQE4irmeXk8lkV5HgWCzWHYAk4oZEREXc9hUFjkaj/TH0LcSN7AHgQ0WAMex49BKxzd4aY6YHGkxE8zDoZ8QO9RUtCyQY2DWOQStFRFsCA2bmVhhqP2KXO5hMJlv7CiaizhjkLGKPumR3sWUH2xMDZBB7XCEej/fxFGxZ1kD88B3EPnUfDfEEjB+ajF4j9rk3RDTVTfAv7CL0BXFA+oqWugImog0BglZuk6NgfOEuxAFvt13wP+xMxEKa6QSYBIHJCfBHQeCPToBZUgr+lYIVrGAFK1jBCj5GRGE0q1LhX6+VEvibZVmheuxFCeG9X8WDiWhHA7a5d4gHG2MG1Rf8673iwbi0bOChVdng+mL/peAKKVjBClawghV8VxD4rhPgQ4LAB+2C/x34fioA/DSZTPawDf6HRkfwpfcDCL7/azbUU08fVrCCpadgBf8EtVB3wVub18UAAAAASUVORK5CYII=">
                </div>
                <span>首页</span>
            </a>
            <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="nav-item">
                <div class="logo-container">
                <img data-v-13b18696="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8BAMAAADI0sRBAAAAFVBMVEVHcEzIyMjDw8PDw8PDw8PDw8PDw8NNc7pKAAAAB3RSTlMAHKbm/+2nMPnTbQAAAE1JREFUeAFjIBuMAkZlFxAwEkBmIoCoCwQEIjMRIAUq5oTMRAATqJgzMhMBXGAAiYlDelSacKASjhLCEcqYDEsDCOYwT6mjKXU0pY4CAF0upynPNQ7eAAAAAElFTkSuQmCC">
                </div>
                <span>分类</span>
            
            </a>
            <a href="<?php echo get_permalink(wc_get_page_id('cart')); ?>" class="nav-item">
            <div class="logo-container">
                <img data-v-13b18696="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAACEklEQVR4AWJwB7RrBxDNRVEcwH2f74tCiRQJBRACAgQKKEqAIoRFoARkAEQgISAJTWiAFhH0dvYurgkjBSg2aFUSLa3XuVzMtQruu+/sdvBHxbn355zdl/u2MvWrwmAGM5jBDKYcBgdBsIB5xERNUs/n8zkp5X+fwJcm1AwAzPgEvv4JjF3O+gRewjwbyA/j51dMt9eHFgInDHTKa3AURX8QedMw1oH3jyVEbjWOuRBiyHfwmDHWaa/BONZ/EVlpAF95/58WIneMLh9i9ohlUwgxYAUMAOMKSj348buwAsax/ocF71oAXbEC1ofXbgt0eN8aGAAmWwA8bQ1cKpXasOgTYfBLoVBotwbWY31AGHxk/QIAi84SHud562ApZYcaHYLgN9xbl3WwHussQfBJbHdaWHyOIDgVG1gI0YkL1Ahh62EY9lkHG10+JgQ+V3uKG7xI6HRejR0spezBxd4pgHGcB2MH6y6fEQAXnb15AIBlAuC0MzB+dvrNq1zXEUIMOwPrsQbXSPOqyTV4LcHTecM5WF3ZJgUGgFHnYN3lYgLgW/WSIBEwjtZ6AuDtxF6IA0AvbuDeIfZBXccmBlYJw3AEO30a8xVQDdfIqbX4Kw8MZjCDrUSdnkEQZDBlnYz6nes6ZuLEVpucrlX1Nwd13IJ1R6IvknFQxzm4/M1Gy67rMJhHmg8tfizRD4MZzGAG+5BP4NOyXq3NTiAAAAAASUVORK5CYII=">
                </div>
                <span>购物车</span>
            </a>
            <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="nav-item">
            <div class="logo-container">
            <img data-v-13b18696="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAACx0lEQVR4Ae2aA8wdQRCA6ya7V5tB3aC2bbtRbbvR232/a9u24tq2bdu4fcl0NtnGyY+7e2+3/yX5/v955jvPzKVpNqp1qsIX9oV9YV84NQn7wr4wQCCdiKL1BaMJgpGTNiMPke/ID+QRvnYK35sqOG0EW7qkN1pY8CxtUOoaAknktuBWJ8OE1VplZK6USBGcroBD9TIYI4xJr0XAIbsAIK32wqEg6eOCrIKO1loY5uWxMNHP7gmTXzCV5tVW2OZ0hEzUZQLaCgtGznogfF9LYZiaj2JywgNhgIRcBbUTtrlVywtZieBWO+2EMakOXgmHgqSfdsIhRvp6JYxM1E84SHt6JszpCO2EZYHglbAIWp21E4aoHEW8EoZoUl7PCw9Grngg/ExeU+sqHHD/lETm6HstHZsll+vX0vE5imorrNbyZLeEZZdE+/JQtmkw2X3OZckpmF08sxkdj+lZc2LSNxwIP4BoUsConhbMzJYdE9+fgjV7AmKsPEY28WRfStXIH5Mg+wUZD1vKZjK+Lw1x2XLYzBqMQgeVGCi+CkaO2JwOg2lW7v+2EY/1bRaYnTOrP3nwhQ0ShqBVRhbucoxiM7JbTSCeIB+QP4iNfFSvXUf2CE6mye9AjFXWCGE7yqorpwaY/AsEHIK/QVfa3KqnlbAcq4QY6S3nQgh4xG0ZQ8aKqLBq3F1FIExclTHDLizrU1UKhhAIMyEkIHMIizAsrpQRA65HIKJwskHm4qGwWrOcbJEBNWGrzMkzYcFolDayCsFptCfCECQV/u2zmhGCaFLRVWE10T8nA2jK+aTeHxKBIXdkxzFJ7FPRC5oLI/SyK8J2dNbK+ssqorNUdywsOI01RVgWKs6FGTlijjA55VjYZuQpAmZAX7kh/M4cYfLehX2YzNJHyPkcKknFgmA0Tt5No7HsQ3nAki1ev6flC/vCJuML+8J/AWznBXqCUqAEAAAAAElFTkSuQmCC">
                </div>
                <span>我的</span>
            </a>
        </div>
    <?php
    }
    do_action('bottom_nav_bar');
    ?>
    <div class="top-wrapper">
        <div class="user-info">
            <div class="avatar" style="border-radius: 50%; height: 80px; width: 80px; overflow: hidden; margin-bottom: 10px;">
            <?php echo(get_avatar(wp_get_current_user()->ID));?>
            </div>
            <p>
                <?php echo (wp_get_current_user()->display_name); ?>
            </p>
        </div>
    </div>
    <div class="content-wrapper">
        <a href="<?php echo (get_permalink() . '/orders'); ?>" class="order-bar">
            <span>
                <img data-v-3a96347b="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgBAMAAACBVGfHAAAABGdBTUEAALGPC/xhBQAAADBQTFRFAAAAgYGIgIOHgYGIgYGIgYGHgYGJf4KGfoKFf4KGfoKFf4GGfoKFf4GGfYKFfoGFoEwvxgAAAA90Uk5TAEdISUt9f7W2t+Lj5Pv8MVnIZQAAAF1JREFUKM9jYACB2P9A8IwBAe6DBP7CeFJADogGUovAAusRAr/AAkDefpCW32AmRMAHJLAZSQAGaCtQD7L2Oz4BatgyH2wkqi0/aO85UgVAEQUFkIjSQggsZCACAAC3bnw/Q+a7DwAAAABJRU5ErkJggg==" class="order-header-icon">
                我的订单
            </span>
            <span>
                查看全部订单
            </span>
        </a>
        <div class="status-container">
            <a class="status" href="<?php echo (get_permalink() . '/orders?category=pending'); ?>">
                <div class="logo-container">
                    <img data-v-68cd2af0="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAMAAACfWMssAAAARVBMVEVHcEz///+kq7OkqrOkqrOkqrOtrbekqrOkqrOlqrSkqrSlqrOnr7ikqrOtrbakqrSkqrOqqrSlqrS+wsj19fb///+lqrVF8RYOAAAAF3RSTlMAAWXI8v8ZvbxmybYd8xxjxxi7////ZFKQFw8AAACVSURBVHgB7ZZDosAwFACjqa373/Sj2PfVmk0bTCz1HD60sY6ZOGv05Hk+IgJvrE/oga97MURM2IsRECdqJkkM2P43BTI1mwxI+z8AJQDgnuIn6rxwTAjEsgIWiLpimWhYKFqgbppaLKZA07bNceLipnZw8HTIF4B8yX0b+X7i4ktn8TW3+GJdfJWLHw++t/i58hg+fgHdKBIkFIzjFgAAAABJRU5ErkJggg==" class="order-item-icon">
                </div>
                <span>
                    Pending
                </span>
            </a>
            <a class="status" href="<?php echo (get_permalink() . '/orders?category=processing'); ?>">
                <div class="logo-container">
                    <img data-v-68cd2af0="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAMAAACfWMssAAAAOVBMVEVHcEyqqrOkqrOkqrOkqrOkqrOtrbakqrOkqrOlqrOkq7WkqrOlrLOkqrOkq7Snr7ilqrSkqrOlqrNkWS/nAAAAE3RSTlMAG6bl/+Yc7O2lSeNK4qcd7ueofhWp8QAAAHNJREFUeAHt0TEOgCAMhWGEogoI4P0PK0FN7Na61fTfv+U985u0yTpg5O18uwWYrZfcgJ0d0PGhGxB6hhH0JEJu0uCDOcPIhyHCq5jIsDskv8KdDBOSMYi4Q6FChR7IeQQzHWYES6W6WgyWuVFYO5ATn3YCaHsOlU82zF8AAAAASUVORK5CYII=" class="order-item-icon">
                </div>
                <span>
                    Processing
                </span>
            </a>
            <a class="status" href="<?php echo (get_permalink() . '/orders?category=complete'); ?>">
                <div class="logo-container">
                    <img data-v-68cd2af0="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA6CAMAAADSkGonAAAAb1BMVEVHcEytrbakq7SkqrOkqrOkqrOkqrOkqrOkqrOlqrT///+lrLOkqrOnq7akqrOlqrWkrLSkqrOlqrOkqrOkq7OkqrSlqrSkq7WkqrOkqrOlq7SlqrOkq7SkqrOlq7Sqqv+ltLSlqrOkqrOkq7TMzMyvmTI3AAAAJXRSTlMAHKfl/6bt5vaZAUffRvhkPvU28puT7mt2gYyXoXOqAxGz7I8FA6bNZQAAALZJREFUeAHt1QkKgzAQheEXfZO02n3f9/ufsSKgVTrUBEqh5GMd4AcxDIPoj5gkZUepmJfO0oOty4RepAodvbgqZAEdsRDDN2JoxDkxUGYlrDbFGm1WQ2FJtFkNHUtOmb8QBn9q8M8Jfg5dDNti6NjQ62cA8sHnoyNsyYHhiBrRD+sYkyk1trkBzXA2p6LelLYFyeWKhTUUeljaICzcIizcISzcIyw8ZPB2JHk6w9/lers/EP3EEznDDskc/B+uAAAAAElFTkSuQmCC" class="order-item-icon">
                </div>
                <span>
                    Complete
                </span>
            </a>
        </div>
        <div class="address-container">
            <a href="<?php echo (get_permalink() . '/edit-address'); ?>">
            <div class="logo-container">
            <img data-v-69bd9615="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAYAAACohjseAAADOElEQVR4Ae1ZA4xeTxD/ozaD2gpr21ac2rbj2lZQf+/dZd9593yXuo0a1LZtt1930p3cnO/dd3vcJPNxZnZ/4337T+85A/I1GYAGoAFoABqA7skANAANQMaiKniYGGkxfli+H/Uwfk3SB0XX4Df130jgzTMArYDw4QrQT0neDNJPkAHZXAvQz+Ed5UbPJt+8uCDfbUmbJM1XBJ9t9V9SsGdBV64BePTo0UJyozuSbPKyxxFzrQBRJz154AFekKE6QCfozkGAmGc8jmzqoaTxjHn/d6sLZEAWdBCgcb7mp6/grpLNBDN2tJSvFgcdoIvoveoLyEyHJfWc5fAVXq/336zKG9AFOqknSbjqB4g5h+B0lXgKEtbUDhCrJQ1L955z50karrC2doAJrUA8dJFzPuUkKTxntQKERkxCZrxucEiwFq7rdhhwu9BR7HPYCjJLISGnStsOH2c5YrXFeKv0Wwj2SXFUC0Ao1Th+QWPO/CgX1UgVqfckl7/7B0a0TEsO1sSxzk3bcOO9kQlhIuq4LBb/2YwPkrIxIE/ot6QvyjNb05t4SHqMzHKAMPnjbJlRmaCg2IpSZpGkO0mAffA4fJfFRHP5+Y1qN8vS04ezK+xFhwcx/+z0eP0DI5tJAPvRO0gS0C0INcZiyyqjTVX//fILjqyVgQpuYx5qAMiv/bW02Jh6nvKqxBAUWKwVEDEQQpXyk8IRmpE9wNpK5zUdAD8o5fPT8LJDgH2SXtzLWESTlHhtFt4TeeFzBvcwH0M8hwDy56QQRNmMz7FYZNuIiIiiKfAKHKZxGvIRoP4QtRjfjACT0FPZoIeQllNPVVDpPTHTxR42YYjmVJGBWbWL5FmpThvvSR6+toQor3RtRU9I75ZBWQ1FRmebwP4n+ifkGh+qznvv4Du0CsqvoU3ob/QAEj1pMbHWYnwG6vELEo0pr6ZGr39UI4fjY5jLkuKT8mka1fQP25CTOJrRcKU8+oZt/cclLDxeQufcGMhi4RPocSk3HnhBbj1UUvkezVhEZQ0HXvPIwjx0yl2PDc2DX/Po3ly+uLk+U4fV+UDwWe/1mbkANVfYOU8GoAFoABqABqABaAAagH8AZLjQB1PgtTkAAAAASUVORK5CYII=" class="info-item-icon">
            </div>
            <span>
            管理收货地址
            </span>
            <div class="logo-container"><img data-v-3a96347b="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAYBAMAAAA46dFkAAAABGdBTUEAALGPC/xhBQAAAA9QTFRFAAAA////payzpKu0pKqzD7zVUAAAAAR0Uk5TAAFKnTZ5RNsAAAAsSURBVAjXYxBSZAADFWcBCO1iCKaFXSACjCYUCSDTMHGoOpK4cHfB3Al1NwBi6Q5b1PFeOQAAAABJRU5ErkJggg==" class="indicator"></div>
        </a>
        </div>
    </div>
    <style>
        .top-bar {
            display: none;
        }

        .top-wrapper {
            background: linear-gradient(90deg, #fa800a, #fa800a);
            padding: 80px 40px;
        }

        .user-info {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            flex-direction: column;
        }

        .order-bar {
            color: #999;
            font-size: 14px;
            text-decoration: none;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #e3e3e3;
        }

        .order-bar>span {
            display: flex;
            align-items: center;
        }

        .order-bar>span>img {
            width: 16px;
            margin-right: 5px;
        }

        .status-container {
            display: flex;
            color: #999;
            justify-content: space-between;
            border-bottom: 10px solid #f0f2f5;
        }

        .status-container>.status {
            color: #777;
            display: flex;
            text-decoration: none;
            font-size: 16px;
            flex: 1;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            margin: 0 4px;
            padding: 10px;
        }

        .status > .logo-container {
            width: 30%;
        }
        
        .address-container {
           
            padding: 10px 0;
            border-bottom: 10px solid #f0f2f5;
        }
        .address-container > a {
            color: #666;
            display: flex;
            text-decoration: none;
            font-size: 16px;
            align-items: center;
            padding: 0 10px;
        }
        .address-container > a > span {
            flex: 1;
        }
        .address-container > a > .logo-container {
            width: 30px;
            margin-right: 10px;
        }
        .address-container > a > .logo-container:last-child {
            width: 8px;
        }
    </style>
</div>