<?php
get_header();
while (have_posts()) : the_post(); ?>
    <div class="page-container">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>
<?php


// print_r($enabled_gateways);

$a = 'order-received';
if (strpos($_SERVER['REQUEST_URI'], $a) !== false) {
    echo '<style>.my-checkout{display: none;}</style>';
} else if(strpos($_SERVER['REQUEST_URI'], "order-pay") !== false) {
    echo '<style>.my-checkout{display: none;}</style>';
} else {
    echo '<style>.page-container {
            padding: 0 20px;
            display: none;
        }
        </style>';
}
?>
<style>
    #site-header {
        display: none;
    }

    .header-gap {
        display: none;
    }

    .page-container {
        padding: 0 20px;
        /*display: none;*/
    }

    body.woocommerce-no-js form.woocommerce-form-coupon,
    .woocommerce-no-js form.woocommerce-form-login {
        display: none !important;
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

    .address {
        border-bottom: 1px solid #e3e3e3;
    }

    .edit-address {
        text-decoration: none;
        color: #000;
        display: block;
        padding: 20px 30px;
    }

    .items,
    .items-container {
        display: flex;
    }

    .items {
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #e3e3e3;
        padding: 5px 10px;
    }

    .items-container {
        flex: 1;
    }

    .image-container {
        margin-right: 10px;
        width: 80px;
        height: 80px;
    }

    .woocommerce-page .image-container>img {
        width: 100%;
        height: 100%;
        object-fit: fill;
    }

    .item-container {
        display: flex;
        border-bottom: 1px solid #e3e3e3;
        align-items: center;
        padding: 10px 5px;
        color: #000;
        text-decoration: none;
    }

    .item-container>.content-container {
        flex: 1;
        align-self: flex-start;
    }

    .content-container>h5,
    .content-container>p {
        margin-bottom: 4px;
        margin-top: 4px;
    }

    .bot-content {
        display: flex;
        justify-content: space-between;
        padding-right: 20px;
    }

    .product-popup {
        background-color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 9;
        display: none;
    }

    .edit-delivery-method, .edit-payment-method {
        background-color: #fff;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 9;
        display: none;
    }

    form[name="checkout"] {
        /* display: none; */
    }

    .bottom-bar {
        display: flex;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        border-top: 1px solid #e3e3e3;
        background-color: #fff;
    }

    .bottom-bar>.right {
        flex: 2;
        color: #fff;
        background-color: #fa800a;
        padding: 10px 0;
        text-align: center;
    }

    .bottom-bar>.left {
        flex: 3;
        color: #fa800a;
        padding: 10px;
        text-align: right;
    }

    .payment-methods {
        padding: 10px 20px;
        border-bottom: 1px solid #e3e3e3;
        display: flex;
        justify-content: space-between;
    }

    .delivery-methods {
        padding: 10px 20px;
        border-bottom: 1px solid #e3e3e3;
        display: flex;
        justify-content: space-between;
    }


    .method-item {
        display: flex;
        justify-content: space-between;
        padding: 15px 20px;
        border-bottom: 1px solid #d3d3d3;
        background-color: #f3f3f3;
    }

    .method-item.active {
        background-color: #999;
    }

    .message {
        padding: 20px 10px;
        border-bottom: 2px solid #e3e3e3;
    }


    .amount-display {
        padding: 12px 10px;
    }

    .amount-display>p {
        margin-bottom: 4px;
        display: flex;
        justify-content: space-between;
    }
</style>

<div class="my-checkout">
    <div class="top-bar">
        <div class="flex-half" onclick="window.history.back()">
            返回
        </div>
        <div class="center-text flex-one">确认订单</div>
        <div class="flex-half"></div>
    </div>
    <div class="address">
        <a class="edit-address" href="<?php echo (wc_get_page_permalink('myaccount') . '/edit-address'); ?>">
            <?php
            $fname = get_user_meta($current_user->ID, 'first_name', true);
            $lname = get_user_meta($current_user->ID, 'last_name', true);
            $address_1 = get_user_meta($current_user->ID, 'billing_address_1', true);
            $address_2 = get_user_meta($current_user->ID, 'billing_address_2', true);
            $city = get_user_meta($current_user->ID, 'billing_city', true);
            $province = get_user_meta($current_user->ID, 'billing_state', true);
            $postcode = get_user_meta($current_user->ID, 'billing_postcode', true);
            // print_r(WC()->cart->get_cart());
            if ($address_1) {
                echo "<div>
                    <p style='margin-bottom: 0;'>
                        {$fname} {$lname} - {$address_1} {$address_2} <br />
                        <span style='color: #666;'>{$city}, {$province}, {$postcode}</span>
                    </p>
                </div>";
            } else {
                echo 'Add Address Here';
            }
            ?>
        </a>
    </div>
    <div class="items">
        <div class="items-container">


            <?php
            /*
        Template Name: Checkout Page Template
        Template Post Type: Checkout page
        */
            // Page code here...
            $allItems = WC()->cart->get_cart();
            $resultArr = [];
            $max = 4;
            $totalItems = sizeof(WC()->cart->get_cart());
            foreach ($allItems as $item => $values) {
                $_product =  wc_get_product($values['data']->get_id());
                $max--;

                //product image
                $getProductDetail = wc_get_product($values['product_id']);
                $image = $getProductDetail->get_image();
                $title = $_product->get_title();
                $quantity = $values['quantity'];
                $price = wc_price(get_post_meta($values['product_id'], '_price', true));
                $product_url = get_permalink($values['product_id']);
                // print_r($values['variation']);
                // prepare data for JS
                $res = new stdClass();
                $res->image = $image;
                $res->title = $title;
                $res->quantity = $quantity;
                $res->price = $price;
                $res->product_url = $product_url;
                $res->variation = implode(', ', $values['variation']);
                array_push($resultArr, $res);

                if ($max > -1) {
                    echo "<div class='image-container'>
                {$image}
            </div>";
                }
            }

            ?>
        </div>
        <div class="total-number">
            共 <?php echo $totalItems; ?> 件
        </div>
    </div>

    <div class="delivery-methods">
        <div class="left">
            配送方式
        </div>
        <?php
        $package = WC()->shipping()->get_packages()[0];
        ?>
        <div class="right">
            <?php echo $package['rates'][WC()->session->get('chosen_shipping_methods')[0]]->label; ?>
        </div>
    </div>
    <div class="edit-delivery-method">
        <div class='top-bar'>
            <div class='flex-half' id='close-edit-delivery'>
                返回
            </div>
            <div class='center-text flex-one'>送货方式</div>
            <div class='flex-half'>

            </div>
        </div>
        <div class="methods">
            <?php
            foreach ($package['rates'] as $key => $value) {
                // var_dump($value);
                $label = $value->label;
                $cost = wc_price($value->cost);
                $id = $key;
                // echo $label;
                // echo $cost;
                // echo '<br>';

                echo "
                    <div class='method-item' data-id='{$id}' data-price='{$value->cost}'>
                        <div class='left'>{$label}</div>
                        <div class='right'>{$cost}</div>
                    </div>
                ";
            }
            ?>
        </div>
    </div>

    <div class="payment-methods">
        <div class="left">
            付款方式
        </div>
        <div class="right">
            <?php
            $currentPaymentMethod = WC()->session->get('chosen_payment_method');
            $currentPaymentMethodLabel = WC()->payment_gateways->get_available_payment_gateways()[$currentPaymentMethod];
            print_r($currentPaymentMethodLabel->title);
            ?>
        </div>
    </div>
    <div class="edit-payment-method">
        <div class='top-bar'>
            <div class='flex-half' id='close-edit-payment'>
                返回
            </div>
            <div class='center-text flex-one'>付款方式</div>
            <div class='flex-half'>

            </div>
        </div>
        <div class="methods">
            <?php
             $gateways = WC()->payment_gateways->get_available_payment_gateways();
             $enabled_gateways = [];
     
             if ($gateways) {
                 foreach ($gateways as $gateway) {
     
                     if ($gateway->enabled == 'yes') {
     
                         $enabled_gateways[] = $gateway;
                     }
                 }
             }
     
             foreach ($enabled_gateways as $key => $value) {
                 # code...
                //  print_r($value);
     
                 echo "<div class='method-item' data-id='{$value->id}'>
                     <div class='left'></div>
                     <div class='right'>{$value->title}</div>
                 </div>";
             }
            ?>
        </div>
    </div>
    <script>
        var allItems = <?php echo json_encode($resultArr); ?>;
        console.log(allItems)
    </script>

    <div class="message">
        <p>
            买家留言：
        </p>
        <textarea name="message" id="" rows="4"></textarea>
    </div>

    <div class="amount-display">
        <p>
            <span>
                商品金额：
            </span>
            <span>
                <?php echo wc_price(WC()->cart->get_subtotal()); ?>
            </span>
        </p>
        <p>
            <span>
                运费：
            </span>
            <span id="shipping">
                <?php echo wc_price(WC()->cart->get_shipping_total()); ?>
            </span>
        </p>
    </div>


    <div class="bottom-bar">
        <div class="left">
            实付款：<span id="amount-display"><?php echo (wc_price(WC()->cart->get_subtotal() + WC()->cart->get_shipping_total())); ?></span><span id="total-amount" style="display: none;"><?php echo WC()->cart->get_subtotal(); ?></span>
        </div>
        <div class="right" id="submit-form">
            提交订单
        </div>
    </div>

    <div class='product-popup'>
        <div class='top-bar'>
            <div class='flex-half' id='close-popup'>
                返回
            </div>
            <div class='center-text flex-one'>商品清单</div>
            <div class='flex-half' style='text-align:center;'>
                共<?php echo $totalItems; ?>件
            </div>
        </div>
        <div class="item-list">
            <?php
            foreach ($resultArr as $item) {
            ?>
                <a class='item-container' href="<?php echo ($item->product_url); ?>">
                    <div class='image-container'>
                        <?php echo ($item->image); ?>
                    </div>
                    <div class='content-container'>
                        <h5>
                            <?php echo ($item->title); ?>
                        </h5>
                        <p>
                            <?php echo ($item->variation); ?>
                        </p>
                        <div class="bot-content">
                            <div class="left">
                                <?php echo ($item->price); ?>
                            </div>
                            <div class="right">
                                x<?php echo ($item->quantity); ?>
                            </div>
                        </div>
                    </div>
                </a>

            <?php
            }
            ?>
        </div>
    </div>

    <script>
        var currentShippingMethod = "<?php echo WC()->session->get('chosen_shipping_methods')[0]; ?>";
        var currentPaymentMethod = "<?php echo $currentPaymentMethod; ?>";
        document.addEventListener('DOMContentLoaded', function(e) {

            var items = document.querySelector('.items')
            var popup = document.querySelector('.product-popup')
            var closePopup = document.querySelector('#close-popup')
            items.addEventListener('click', function(event) {
                popup.style.display = 'block'
            })
            closePopup.addEventListener('click', function() {
                window.scrollTo(0, 0)
                popup.style.display = 'none'
            })
            var deliveryMethods = document.querySelector('.delivery-methods')
            var closeEditDelivery = document.querySelector('#close-edit-delivery')
            var deliveryMethodsPopup = document.querySelector('.edit-delivery-method')
            deliveryMethods.addEventListener('click', function() {
                deliveryMethodsPopup.style.display = 'block'
            })
            closeEditDelivery.addEventListener('click', function() {
                deliveryMethodsPopup.style.display = 'none'
            })


            var allShippingMethods = Array.from(document.querySelectorAll('.edit-delivery-method .method-item'))
            allShippingMethods.forEach(e => {
                e.classList.remove('active')
                if (e.dataset.id === currentShippingMethod) {
                    e.classList.add('active')
                }
                e.addEventListener('click', e => {
                    console.log(e.currentTarget)
                    var selector = `input[value="${e.currentTarget.dataset.id}"]`
                    var input = document.querySelector(selector)
                    input.checked = true
                    var evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    input.dispatchEvent(evt)
                    console.log(selector)
                    deliveryMethods.querySelector('.right').textContent = e.currentTarget.querySelector('.left').innerText
                    deliveryMethodsPopup.style.display = 'none'

                    var subTotal = document.querySelector('#total-amount').innerText - 0
                    console.log(subTotal)
                    var amountDisplay = document.querySelector('#amount-display')
                    console.log(e.currentTarget)
                    console.log(123123123123)
                    amountDisplay.innerText = '$' + (subTotal + (e.currentTarget.dataset.price - 0))

                    var shippingDisplay = document.getElementById('shipping')
                    shippingDisplay.innerText = `$${(e.currentTarget.dataset.price - 0).toFixed(2)}`

                    allShippingMethods.forEach(el => {
                        el.classList.remove('active')
                    })
                    e.currentTarget.classList.add('active')
                })
            })
            
            
            var paymentMethodsPopup = document.querySelector('.edit-payment-method')
            var closeEditPayment = document.querySelector('#close-edit-payment')
            var paymentMethod = document.querySelector('.payment-methods')
            
            paymentMethod.addEventListener('click', function() {
                paymentMethodsPopup.style.display = 'block'
            })
            
            var allPaymentMethods = Array.from(document.querySelectorAll('.edit-payment-method .method-item'))
            closeEditPayment.addEventListener('click', function() {
                paymentMethodsPopup.style.display = 'none'
            })
            allPaymentMethods.forEach(e => {
                e.classList.remove('active')
                if (e.dataset.id === currentPaymentMethod) {
                    e.classList.add('active')
                }
                e.addEventListener('click', e => {
                    console.log(e.currentTarget)
                    var selector = `input[value="${e.currentTarget.dataset.id}"]`
                    var input = document.querySelector(selector)
                    input.checked = true
                    var evt = document.createEvent("HTMLEvents");
                    evt.initEvent("change", false, true);
                    input.dispatchEvent(evt)
                    console.log(selector)
                    paymentMethod.querySelector('.right').textContent = e.currentTarget.querySelector('.right').innerText
                    paymentMethodsPopup.style.display = 'none'

                   
                    allPaymentMethods.forEach(el => {
                        el.classList.remove('active')
                    })
                    e.currentTarget.classList.add('active')
                })
            })
            
            
            document.querySelector('#submit-form').addEventListener('click', e => {
                document.querySelector('#place_order').click()
            })


            var message = document.querySelector('.message > textarea')
            var orderComment = document.querySelector('textarea[name="order_comments"]')
            message.addEventListener('input', e => {
                console.log(123)
                orderComment.value = e.target.value
            })


        })
    </script>
</div>
<div style="padding-top: 50px;"></div>
<?php
