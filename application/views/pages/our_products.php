<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cart.css" type="text/css">

<!-- Page Add Section Begin -->
<section class="page-add cart-page-add">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="page-breadcrumb">
                    <h2>Cart<span>.</span></h2>
                    <span><a href="#cartMove">To My Cart - click me!</a></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Add Section End -->
<!-- Start Store & Item's -->


<section class="content-section">

    <h2 class="section-header">Women</h2>
    <div class="shop-items">
        <?php foreach ($product as $item) : ?>
            <div class="shop-item">
                <span class="shop-item-serialNumber" style="display: none;"><?php echo $item['serial_number'] ?> </span>
                <span class="shop-item-title"><?php echo $item['item_name'] ?> </span>
                <img class="shop-item-image" src="<?php echo $item['item_img'] ?>">
                <div class="shop-item-details">
                    <span class="shop-item-price" style="font-weight: bold;" style="font-weight: bold;">
                        <?php echo $item['item_price']; ?>$&nbsp&nbsp&nbsp</span>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="content-section">
    <h2 class="section-header">Men</h2>
    <p style="text-align: center;">Coming soon - Men category</p>
</section>

<section class="content-section">
    <h2 class="section-header">Kids</h2>
    <p style="text-align: center;">Coming soon - Kids category</p>
</section>
<br><br>
<!-- End Store & Item's -->


<!-- Start Cart -->
<section id="cartMove" class=" content-section">
    <h2 class="section-header">CART</h2>
    <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>
    <div class="cart-items">
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">$0</span>
    </div>
    <?php
    $attributes = array('name' => 'myform');
    echo form_open('Webs_controller/insertOrderDataController', $attributes);
    ?>
    <div id="placeHidden">
<!--        <input type="hidden" id="User_name" name="User_name" value="">
        <input type="hidden" id="serial_number" name="serial_number" value="">
        <input type="hidden" id="count_purchase" name="count_purchase" value="">-->
    </div>
    <input type="hidden" id="counter" name="counter" value="">


    <input id="purchase" value="PURCHASE"class="btn btn-primary btn-purchase" type="submit" style="width: 15%;"  >
    </form>

</section>

<!-- End Cart -->

<script src="<?php echo base_url('assets/js/cart.js'); ?>" async></script>

