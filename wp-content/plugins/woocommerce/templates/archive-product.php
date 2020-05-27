<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<?php 
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    var_dump($queries);
    $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
    // Get Woocommerce product categories WP_Term objects
    $categories = get_terms(['taxonomy' => 'product_cat']);
    // print_r($categories);

    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent'   => 0
    );
    $product_cat = get_terms( $args );

    foreach ($product_cat as $parent_product_cat)
    {

    echo '
        <ul>
        <li><a href="'.$shop_page_url.'?category='.$parent_product_cat->name.'">'.$parent_product_cat->name.'</a>
        <ul>
            ';
    $child_args = array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
                'parent'   => $parent_product_cat->term_id
            );
    $child_product_cats = get_terms( $child_args );
    foreach ($child_product_cats as $child_product_cat)
    {
    echo '<li><a href="'.$shop_page_url.'?category='.$child_product_cat->name.'">'.$child_product_cat->name.'</a></li>';
    }

    echo '</ul>
        </li>
    </ul>';
    }
    
    
    var_dump($queries);
    echo $queries['category'];
    echo '[product_category category="" per_page="8"' . $queries['category'] . 'columns="3" orderby="date" order="desc"]';
    echo do_shortcode('[product_category category="'.$queries['category'].'" per_page="8" columns="3" orderby="date" order="desc"]'); 
?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php




// if ( woocommerce_product_loop() ) {

// 	/**
// 	 * Hook: woocommerce_before_shop_loop.
// 	 *
// 	 * @hooked woocommerce_output_all_notices - 10
// 	 * @hooked woocommerce_result_count - 20
// 	 * @hooked woocommerce_catalog_ordering - 30
// 	 */
// 	do_action( 'woocommerce_before_shop_loop' );

// 	woocommerce_product_loop_start();

// 	if ( wc_get_loop_prop( 'total' ) ) {
// 		while ( have_posts() ) {
//             the_post();
//             $cate = get_queried_object();
//             $cateID = $cate->term_id;
//             echo $cateID;
// 			/**
// 			 * Hook: woocommerce_shop_loop.
// 			 */
// 			do_action( 'woocommerce_shop_loop' );

// 			wc_get_template_part( 'content', 'product' );
// 		}
// 	}

// 	woocommerce_product_loop_end();

// 	/**
// 	 * Hook: woocommerce_after_shop_loop.
// 	 *
// 	 * @hooked woocommerce_pagination - 10
// 	 */
// 	do_action( 'woocommerce_after_shop_loop' );
// } else {
// 	/**
// 	 * Hook: woocommerce_no_products_found.
// 	 *
// 	 * @hooked wc_no_products_found - 10
// 	 */
// 	do_action( 'woocommerce_no_products_found' );
// }

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
