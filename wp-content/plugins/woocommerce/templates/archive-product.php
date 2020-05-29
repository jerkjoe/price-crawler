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

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<?php
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
// var_dump($queries);
$shop_page_url = get_permalink(wc_get_page_id('shop'));
// Get Woocommerce product categories WP_Term objects
$categories = get_terms(['taxonomy' => 'product_cat']);
// print_r($categories);

$args = array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'parent'   => 0
);
$product_cat = get_terms($args);

foreach ($product_cat as $parent_product_cat) {

    // echo '
    //     <ul>
    //     <li><a href="'.$shop_page_url.'?category='.$parent_product_cat->name.'">'.$parent_product_cat->name.'</a>
    //     <ul>
    //         ';
    $child_args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent'   => $parent_product_cat->term_id
    );
    $child_product_cats = get_terms($child_args);
    $parent_product_cat->children = $child_product_cats;
    // foreach ($child_product_cats as $child_product_cat)
    // {
    // echo '<li><a href="'.$shop_page_url.'?category='.$child_product_cat->name.'">'.$child_product_cat->name.'</a></li>';
    // }
    // print_r($product_cat);
    // echo(json_encode($product_cat));
    // echo '</ul>
    //     </li>
    // </ul>';
}


// var_dump($queries);
// echo $queries['category'];
// echo '[product_category category="" per_page="8"' . $queries['category'] . 'columns="2" orderby="date" order="desc"]';


?>
<header class="woocommerce-products-header">
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <!-- <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1> -->
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     *
     * @hooked woocommerce_taxonomy_archive_description - 10
     * @hooked woocommerce_product_archive_description - 10
     */
    // do_action('woocommerce_archive_description');
    ?>
</header>
<style>
    .woocommerce-breadcrumb {
        display: none;
    }
</style>

<body>
    <div id="categories"">
        <div id="left"></div>
        <div id="right"></div>
    </div>
</body>
<script>
    console.log(123)
</script>
<?php
if ($queries['category'] != '') {
    echo do_shortcode('[product_category category="' . $queries['category'] . '" per_page="2" columns="3" orderby="date" order="desc" paginate=true]');
} else {
?>
    <style>
        #categories {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 99999;
            background-color: #ffff;
            width: 100%;
            height: 100vh;
            display: flex;
        }

        #left {
            overflow: auto;
            border-right: 1px solid #e3e3e3;
            background-color: #f0f2f5;
        }

        #right {
            flex: 1;
        }

        .right-container {
            height: 100%;
            width: 100%;
            display: none;
            flex-direction: column;
            overflow: auto;
        }

        .right-container>a {
            padding: 10px;
            border-bottom: 1px solid #e3e3e3;
        }

        .category-item {
            padding: 10px 14px;
            border-bottom: 1px solid #e9e9e9;
        }
    </style>


    <script>
        var categories = <?php echo json_encode($product_cat) ?>;
        document.addEventListener('DOMContentLoaded', function() {
            console.log(123123123)
            console.log(categories)
            console.log(container)
            var container = document.getElementById('left')
            var detailContainer = document.getElementById('right')
            for (var i = 0; i < categories.length; i++) {
                container.appendChild(generateParentElement(categories[i]))
                detailContainer.appendChild(createContainer(categories[i]))
                if (categories[i].children.length) {
                    console.log(categories[i].children)
                    for (var j = 0; j < categories[i].children.length; j++) {
                        var el = document.createElement('a')
                        el.href = window.location.origin + window.location.pathname + '?category=' + categories[i].children[j].name
                        el.innerText = categories[i].children[j].name
                        document.querySelector('.c_' + categories[i].children[j].parent).appendChild(el)
                    }
                }
            }
        })

        function generateParentElement(item) {
            var el = document.createElement('div')
            el.className = 'category-item'
            el.id = item.term_id
            el.innerText = item.name
            el.addEventListener('click', function(e) {
                var selector = '.c_' + e.target.id
                console.log('123 ', selector)
                Array.from(document.querySelectorAll('.right-container')).forEach(e => {
                    e.style.display = 'none'
                })
                document.querySelector(selector).style.display = 'flex'
            })
            return el
        }

        function createContainer(item) {
            var el = document.createElement('div')
            el.className = 'c_' + item.term_id + ' right-container'
            var url = window.location.origin + window.location.pathname + '?category=' + item.name
            el.innerHTML = '<a href="' + url + '">All</a>'
            return el
        }
    </script>
<?php
}



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
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
