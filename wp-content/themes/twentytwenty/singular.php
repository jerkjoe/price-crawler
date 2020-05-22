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

<?php echo do_shortcode('[metaslider id="10"]'); ?>
<main id="site-content" role="main">
    <?php
    $allMenuItems = get_post_meta(get_the_ID(), 'menu-item', false);

    if (sizeof($allMenuItems) > 0) {
    ?>
        <div class="menu-item-wrapper" style="display: flex; flex-wrap: wrap; justify-content: center; padding: 0px 20px;">

            <?php
            // Get Woocommerce product categories WP_Term objects
            $categories = get_terms(['taxonomy' => 'product_cat']);
            foreach ($categories as $term) {
            ?>

                <a href="#" style="text-decoration: none;display: block; width: 18%; margin: 0 5%; text-align: center;" class="menu-item">
                    <img width="44px" style="margin: 0 auto" data-v-94c24b88="" src="data:image/png;base64,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" class="menu-item-icon">
                    <span style="color: #000; font-size: 12px;" class="menu-item-title">
                        <?php echo ($term->name); ?>
                    </span>
                </a>
        <?php
            }
        }
        ?>
        </div>






        <?php
        // function returnId($item) {
        //     return $item -> term_id;
        // };
        // $category_ids = array_map('returnId', $categories);
        // print_r($category_ids);
        // $args = array(
        //     'post_status' => 'publish',
        //     'tax_query' => array(
        //          'taxonomy' => 'product_cat',
        //          'field'    => 'term_id',
        //          'terms'     =>  [19], // When you have more term_id's seperate them by komma.
        //          'operator'  => 'IN'
        //          )
        //     );
        //     $the_query = new WP_Query($args);

        //     foreach ($the_query as $item) {
        //         print_r($item);
        //         print_r('------113123123123123123123---<br><br><br>');
        //     }
        foreach ($categories as $product_category) {
            echo '<h4 style="text-align: center;"><a href="' . get_term_link($product_category) . '">' . $product_category->name . '</a></h4>';
            $args = array(
                'posts_per_page' => -1,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        // 'terms' => 'white-wines'
                        'terms' => $product_category->slug
                    )
                ),
                'post_type' => 'product',
                'orderby' => 'title,'
            );
            $products = new WP_Query($args);
            echo "<ul style='display: flex; flex-wrap: wrap;margin-left: 0;'>";
            $count = 0;
            while ($products->have_posts() && $count < 6) {
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
                            echo('$'.$product->get_display_price($product->get_regular_price())); 
                       ?>
                    </p>
                </li>
        <?php
                $count++;
            }
            echo "</ul>";
        }

        if (have_posts()) {

            while (have_posts()) {
                the_post();

                get_template_part('template-parts/content', get_post_type());
            }
        }

        ?>

</main><!-- #site-content -->

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

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