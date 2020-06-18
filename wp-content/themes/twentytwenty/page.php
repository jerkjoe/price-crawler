<?php

/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<?php
$slider = get_field('top_slider');
echo do_shortcode($slider);
?>
<main id="site-content" role="main">
    <?php
    $allCategories = get_field('horizontal_bar') ? get_field('horizontal_bar') : [];
    function get_product_category_by_id($category_id)
    {
        $term = get_term_by('id', $category_id, 'product_cat', 'ARRAY_A');
        return $term;
    }
    ?>
    <div class="menu-item-wrapper" style="display: flex; flex-wrap: wrap; justify-content: center; padding: 0px 20px;">

        <?php

        foreach ($allCategories as $key => $value) {
            # code...
            $cate = get_product_category_by_id($value);

            $thumbnail_id = get_term_meta($value, 'thumbnail_id', true);

            $cate_url = get_term_link($value);
            $cate_name = $cate["name"];
            $thumbnail_image_url = wp_get_attachment_url($thumbnail_id);
            $default_thumb_image_url = get_site_url() . '/wp-content/uploads/woocommerce-placeholder.png';

        ?>
            <a href="<?php echo $cate_url; ?>" style="text-decoration: none;display: block; width: 18%; margin: 0 3%; text-align: center;" class="menu-item">
                <img width="44px" height="44px" style="margin: 0 auto; height: 44px;" src="
            <?php echo $thumbnail_image_url ? $thumbnail_image_url : $default_thumb_image_url; ?>
        ">
                <span style="color: #000; font-size: 12px;" class="menu-item-title">
                    <?php echo ($cate_name); ?>
                </span>
            </a>



        <?php
        }
        ?>
    </div>






    <?php

    $allVedrticalCategories = get_field('vertical_bar') ? get_field('vertical_bar') : [];

    foreach ($allVedrticalCategories as $key => $value) {
        # code...
        $cate = get_product_category_by_id($value);
        $cate_url = get_term_link($value);
        $cate_name = $cate["name"];
        $cate_slug = $cate["slug"];

        echo '<h4 style="text-align: center;"><a style="text-decoration: none;" href="' . $cate_url . '">' . $cate_name . '</a></h4>';

        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    // 'terms' => 'white-wines'
                    'terms' => $cate_slug
                )
            ),
            'post_type' => 'product',
            'orderby' => 'title,'
        );
        $products = new WP_Query($args);
        echo "<ul style='display: flex; flex-wrap: wrap;margin-left: 0;'>";
        $count = 0;
        while ($products->have_posts() && $count < 4) {
            $products->the_post();
    ?>

            <li class="image-container">
                <?php the_post_thumbnail(); ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
                <p>
                    <?php echo ($products->post->post_excerpt); ?>
                </p>
                <p>

                    <?php
                    global $product;
                    echo ('$' . $product->get_display_price($product->get_regular_price()));
                    ?>
                </p>
            </li>
        <?php
            $count++;
        }
        echo "</ul>";
    }


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
                    <img data-v-13b18696="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAB7klEQVR4Ae3aw79VURTA8Yy1bjbnWbNs2+Y/UJOMg9w4jzJG2a5ZxjzbrrNPn9Xa2XiH+941+D0erO971/vm6zS+e06Vq2ABC1jAAhawgD0HmngW7vAsuMPd56/3enamWVaCGTiJe8fRjykbZ2cNmDYPKKgsWKphf2kNba5dxGgwLaqEny7C9I8dovllShkJpoVQmQGnOPrPLjG6plFgmpOpzYNf4Shv4S2aDQ2NACsXW/PQjzkK2HPlQudUg30Lh/GgbzkKKeVbMC6VYB5uGkdRpCx0UwOmw60KeRaujAj7NRtX0/ImhRMF04JyJRi7J3Ls1w4GvdsKgq3K2LMxYj93kdwyNWIF0xysyye+xlFC3SQHGsQCVi625xM+5SjhnikXOkYK9i0YxSfyOEpJyndgbCRgPvgsjtKYstAOFaxsWJJW7Fc0LA0F7Ds4MO3Yz+lZA4OVBSdMAetZA4P5QK9NAetZwwCTSQlYwAIWsIAFLGAB67Z6Fk7wLRz0bfpn+nfZBPaVk+n9t/PobXhbZTxYWTjvn19N4W2NB5OD9f4VrLc1H8zLpf+ztGo8OA8rGAL+moAFLGABC1jA1w0CXw8DvMYYsI2rA4I/L3zDfQPA92k2VAkC/hG9jruZQrCeaZ2eUd4+LGABm56ABfweJF3rsUofdZMAAAAASUVORK5CYII=">
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
            <img data-v-13b18696="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAACiUlEQVR4Ae2aQ5hdQRBGY9veJ5vYtp1VVrHtbGIb69jGMlbfOzPPim3bqvz1fXfWwet+053pxZl5rjqXXdWdo+OEbtmK7CRrha2wFbbCVtgKE1Gu8+fPtwJLgQNugvfgA7h14cIFFywXQrQlotxGC0OoO4gB+kMuQ76vccK8V5H4epb4RzYSUR5jhJHwNkBJchjSOXUXZtlBgGSAo2Si1sLxeLwIEn0NSBKfhBDltBVGcuMkymbu5dnaCiPBDECSua6lcDgcLozkvgFSsJcraSfsOE5TFbKecE/thJFYb4XCQ3QUHgxIEdN1FO6vSpiv/joKt1Io3E874YyMjKoKz+Faut6HIwqE7/GYWkthHhUpEF6n7UgrPT29tOyxNKime7U0U6LwUu3LQ27TINHjEi5U7tWrV/NrL+wNM0sh6UQSwjf8fn9Fo3paoVCoBBI/8Q+yIhgMljWyicd9Ka9GfvkHom9wGE+Nx+P5jO9LQ6YkZEbi/ykWA+TxFpwFY3AIl/lvG/GQL5qWllbMzjwYJGyFXdetzoU7WI5z9AiI4fEd/H8BvoCv4CW/BuLgKFgBhuBwr2GEsBCiBSQ2ggeAkuQB2OQ4TkuthHlaBaIDeV4IkCIucwyOlaXCXuMuCihFRDlmyoW5PvVKwe+AUsx3js05pETY7/fnRcAdHDyL2cm5qBP29iwC7QWkCfs4J2XC2LPzOZBmLFAiLISonXnOasZ3x3HqSBX21mn4AGmK/0/Xh6R8klv9dIwc4YABwmEpwvihevyDhtBIhvAiU4S5UElamDsSBgm7MoTvAjKERzKEnxkk/FzGObzGIOF1SQt7xcJiXk2jsehNvmBxi9f2tKywFTYZK2yFfwGm25uZfOtK2AAAAABJRU5ErkJggg==">
                </div>
                <span>我的</span>
            </a>
        </div>
    <?php
    }
    do_action('bottom_nav_bar');

    // if (have_posts()) {

    //     while (have_posts()) {
    //         the_post();
    //         do_action('bottom_nav_bar');
    //         get_template_part('template-parts/content', get_post_type());
    //     }
    // }

    ?>

</main><!-- #site-content -->

<?php // get_template_part('template-parts/footer-menus-widgets'); 
    // the_content();
    
?>

<?php get_footer(); ?>
<style>
    .image-container>img {
        width: 100%;
        height: 150px;
    }

    .image-container {
        list-style: none;
        text-align: center;
        width: 50%;
        margin: 0px 0;
        border-top: 1px solid #f3f3f3;
        border-bottom: 1px solid #f1f1f1;
        padding: 20px 2.5%;
        box-sizing: border-box;
    }

    .image-container:nth-child(odd) {
        border-right: 1px solid #f3f3f3;
    }

    .image-container>a {
        margin-top: 10px;
        display: inline-block;
    }

    .image-container>p {
        font-size: 12px;
        word-break: break-all;
        padding: 0 10px;
        margin-top: 10px;
        max-height: 58px;
        overflow: hidden;
    }
</style>