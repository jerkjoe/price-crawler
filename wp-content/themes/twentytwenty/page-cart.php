<style>
    #site-header {
        display: none;
    }

    table.shop_table {
        margin: 0 auto;
    }

    .quantity {
        justify-content: flex-end;
    }

    form.woocommerce-cart-form .actions .input-text {
        width: 160px !important;
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

    .quantity>button {
        padding: 10px;
    }

    form.woocommerce-cart-form table input.qty {
        padding: 2px;
    }

    .page-container {
        display: none;
        padding: 0 20px;
    }

    .woocommerce-cart-form {}

    .cart-collaterals {
        display: none;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        padding: 10px 15px;
        border-bottom: 1px solid #e3e3e3;
    }

    .center-text {
        text-align: center;
    }

    .flex-half {
        flex: .5;
    }

    .flex-one {
        flex: 1;
    }

    .cart-item {
        color: #000;
        text-decoration: none;
        padding: 10px 5px;
        display: flex;
        justify-content: space-between;
    }

    .cart-item>.left {
        flex: 1;
    }

    .cart-item>.right {
        flex: 3;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .image-container>img {
        width: 100%;
    }

    .top,
    .bottom,
    .mid {
        justify-content: space-between;
        display: flex;
        padding: 5px 10px;
    }

    .mid {
        font-size: 10px;
    }

    .quantity-change {
        display: flex;
        width: 100px;
        align-items: center;
    }

    .quantity-change>* {
        flex: 1;
        padding: 5px !important;
    }

    .quantity-change>.plus,
    .quantity-change>.minus {
        text-align: center;
        flex: 0.5;
        background-color: #e3e3e3;
        border: 1px solid #e3e3e3;
    }

    .update-quantity {
        margin: 20px auto;
        background-color: #e3e3e3;
        padding: 10px 20px;
        width: 60%;
        text-align: center;
    }

    .checkout-url {
        background-color: #fff;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        position: fixed;
        text-align: center;
        border-top: 1px solid #e3e3e3;
        
    }
    .checkout-url > .total {
        background-color: #fff;
        color: #fa800a;
        padding: 10px 30px;
    }
    .checkout-url > a {
        padding: 10px 30px;
        color: #fff;
        background-color:  #fa800a;
        text-decoration: none;
    }
</style>

<div class="my-cart">
    <div class="top-bar">
        <div class="flex-half" onclick="window.history.back()">
            返回
        </div>
        <div class="center-text flex-one">购物车</div>
        <div class="flex-half"></div>
    </div>
    <div class="cart-items">
        <script>
            function removeItem(e) {
                console.log(e)
                e.preventDefault()
                e.stopImmediatePropagation()
                window.location.assign(e.target.dataset.href)
            }

            function preventDefault(e) {
                e.preventDefault()
            }
            document.addEventListener('DOMContentLoaded', e => {
                allQuantityInputs = Array.from(document.querySelectorAll('.quantity-change'))
                allQuantityInputs.forEach(block => {
                    var plus = block.querySelector('.plus')
                    var minus = block.querySelector('.minus')
                    var input = block.querySelector('input')

                    var changeEvent = document.createEvent("HTMLEvents");
                    changeEvent.initEvent("change", false, true);

                    plus.addEventListener('click', e => {
                        input.value = (input.value - 0) + 1
                        input.dispatchEvent(changeEvent)
                    })
                    minus.addEventListener('click', e => {
                        if ((input.value - 0) < 1) return
                        input.value = (input.value - 0) - 1
                        input.dispatchEvent(changeEvent)
                    })

                    function updateQuantity(id, value) {
                        var selector = `input[name="cart[${id}][qty]"]`
                        document.querySelector(selector).value = value
                        handleUpdateQuantity()
                        
                    }
                    input.addEventListener('input', e => {
                        updateQuantity(block.dataset.id, e.target.value)
                    })
                    input.addEventListener('change', e => {
                        updateQuantity(block.dataset.id, e.target.value)
                    })
                })

            })

            function handleUpdateQuantity() {
                document.querySelector('button[name="update_cart"]').click()
            }
        </script>
        <?php

        $allItems = WC()->cart->get_cart();
        foreach ($allItems as $item => $values) {
            // print_r($values);
            $_product =  wc_get_product($values['data']->get_id());
            $getProductDetail = wc_get_product($values['product_id']);
            $image = $getProductDetail->get_image();
            $title = $_product->get_title();
            $quantity = $values['quantity'];
            $price = WC()->cart->get_product_price( $_product );
            $product_url = get_permalink($values['product_id']);
            $remove_url = wc_get_cart_remove_url($item);
            $variation = $values["variation"]
        ?>

            <a class="cart-item" href="<?php echo $product_url; ?>">
                <div class="left">
                    <div class="image-container">
                        <?php echo $image; ?>
                    </div>
                </div>
                <div class="right">
                    <div class="top">
                        <div class="left">
                            <?php echo $title; ?>
                        </div>
                        <div class="right">
                            <span onclick="removeItem(event)" data-href="<?php echo $remove_url; ?>">X</span>
                        </div>
                    </div>
                    <div class="mid">
                        <?php
                        foreach ($variation as $key => $value) {
                            # code...
                            echo ' --' . $value;
                        }
                        ?>
                    </div>
                    <div class="bottom">
                        <div class="left">
                            <?php echo $price; ?>
                        </div>
                        <div class="right">
                            <div class="quantity-change" onclick="preventDefault(event)" data-id="<?php echo $item; ?>">
                                <div class="minus">-</div>
                                <input type="number" min="1" value="<?php echo $quantity; ?>">
                                <div class="plus">+</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>




        <?php
        }
        ?>
        <div class="update-quantity" onclick="handleUpdateQuantity()">
            Update Quantity
        </div>
    </div>
    <div class="checkout-url">
        <div class="total">
            <?php echo wc_price(WC()->cart->get_subtotal()); ?>
        </div>
        <a href="<?php echo wc_get_checkout_url(); ?>">结算</a>
    </div>

</div>

<?php
/*
Template Name: Cart Page Template
Template Post Type: Cart page
*/
// Page code here...
get_header();
while (have_posts()) : the_post(); ?>
    <div class="page-container">
        <?php the_content(); ?>
    </div>
<?php endwhile;
