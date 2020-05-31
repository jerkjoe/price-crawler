<style>
    .page-container {
        padding: 0 20px;
    }

    body.woocommerce-no-js form.woocommerce-form-coupon,
    .woocommerce-no-js form.woocommerce-form-login {
        display: none !important;
    }

    #site-header {
        display: none;
    }

    .header-gap {
        display: none;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        padding: 10px 10px;
        background-color: #ffffff;
        border-bottom: 10px solid #f0f2f5;
    }

    .img-container {
        width: 30px;
    }

    .img-container>img {
        width: 100%;
    }
</style>
<?php
/*
Template Name: Checkout Page Template
Template Post Type: Checkout page
*/
// Page code here...
get_header();
while (have_posts()) : the_post(); ?>
    <div class="top-bar">
        <div class="left">
            <a href="<?php echo "javascript:history.go(-1)"; ?>">
                <div class="img-container">
                    <img data-v-41e53151="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAABGdBTUEAALGPC/xhBQAAAL1QTFRFAAAA////j4+WipKSjo6VkZGRjY2UkJCQjIyTj4+PjJKSjo6Ui5GRjo6Ti5CQjY2Sio+PjJCQjo6Si5CQjY2Si4+PjY2Rio+TjIyRjo6SjJCQjo6Si4+PjY2Ri4+TjY2Ri4+SjIyQio6SjIyQio6Rio6Pi42Qio2Pio2Qio2Qi42PioyQi42PioyQi42Pi4yQio2Qi4yPio2Qi42PioyQioyPi42QioyPi42Qi4yPio2Qi42PioyQi42QioyPk+ZOBAAAAD50Uk5TAAIiIyQlJicoKSorLC0uLzA1Njc4OTo7PD0+P0BBQkNERUZHSJCR1Nbh4uPk5ebn6Onq6+zw8fLz9PX29/i+TOnQAAAA10lEQVRIx+3URxLCMAwFUAGhl9AJvXcIJfTi+x8LycMB9BcwLND6/Rk7kT/Rf749xdk4hPjS0ZgJ4MsnY8xU76tn9gdX7Wvig5zaexf2+6zaN8TvMmrfvIpPq33rxn6bUvuO+E1C7bt39n5c7fvi1zG1HzzYr6JqPxK/dPT3fbJfRPQLNGU/DxMWWCABe6QlcCQa2o/kAAn0NxD1bCKO3ENWyU8AibZdviSQaF2x9eYHBz4gorp90hkg4YGl8a6lwAUSFSm+Q/6DVcnlDZYxUQGs+//88LwAI74l0PQXLosAAAAASUVORK5CYII=" class="icon">
                </div>
            </a>
        </div>
        <div class="mid"></div>
        <div class="right">

        </div>
    </div>
    <!-- <div class="page-container"> -->

        <?php the_content(); ?>
    <!-- </div> -->
<?php endwhile;
