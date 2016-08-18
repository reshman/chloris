<?php
include_once('db.php');
if(!isset($_SESSION)) {
    session_start();
}
/*print_r($_SESSION);die;
unset($_SESSION['cart_items']);die;*/
$action           = isset($_GET['action'])    ? $_GET['action']    : 0;
$productId        = isset($_GET['productid']) ? $_GET['productid'] : 0;
$qty              = isset($_GET['qty']) ? $_GET['qty'] : 1;

/**
 * Remove items one by one
 */
if ($action === 'remove' && $productId !== 0) {
    unset($_SESSION['cart_items'][$productId]);
}

/**
 * Qty add or remove one by one
 */
if ($action === 'qtyincr' && $productId !== 0) {
    $_SESSION['cart_items'][$productId]['qty'] = $qty;
}

$cartItems        = isset($_SESSION['cart_items']) ? $_SESSION['cart_items'] : array();

if (!empty($cartItems)) {
$productIdArrs    = array();
if (!empty($cartItems)) {
    foreach ($cartItems as $cartItem) {
        array_push($productIdArrs, $cartItem['id']);
    }
}

$implode_cart_arr = implode("','", $productIdArrs);


$i     = 0;
$price = 0;
$sqlCartItems    = sprintf("SELECT id, name, sprice FROM product WHERE id IN('%s')",$implode_cart_arr);

$resultCartItems = mysqli_query($link, $sqlCartItems);
if (mysqli_num_rows($resultCartItems) > 0 ):
    ?>
    <div class="modal-content">
        <div class="modal-header">
            <div class="check_top_heading">Shopping Cart</div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="checkout-right">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Product</th>
                        <th>Product Name</th>
                        <th>Quality</th>
                        <!--<th>Service Charges</th>-->
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <?php while ($productRow = mysqli_fetch_assoc($resultCartItems)):
                        $i++;
                        $sqlItemImage    = sprintf("SELECT image_name FROM product_image WHERE product_id =  '%d' LIMIT 1",$productRow['id']);
                        $resultItemImage = mysqli_query($link, $sqlItemImage);
                        $image           = mysqli_fetch_assoc($resultItemImage);
                        //echo $price;die;
                        //echo round($price, 2);die;

                        $price = (round($productRow['sprice'], 2) + round($price, 2)) * round($cartItems[$productRow['id']]['qty']);


                        ?>
                        <tr class="rem<?php echo $productRow['id'];?>">
                            <td class="invert"><?php echo $i;?></td>
                            <td class="invert-image"><a href="#"><img src="admin/product_images/<?php echo $image['image_name'];?>" alt=" " class="img-responsive" /></a></td>
                            <td class="invert"><?php echo $productRow['name']?></td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select" qtyproduct="<?php echo $productRow['id'];?>">
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value"><span><?php echo $cartItems[$productRow['id']]['qty']?></span></div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    </div>
                                </div>
                            </td>

                            <!--<td class="invert">$5.00</td>-->
                            <td class="invert"><?php echo $productRow['sprice'] * $cartItems[$productRow['id']]['qty']?></td>
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1" removeid="<?php echo $productRow['id'];?>"> </div>
                                </div>

                            </td>
                        </tr>
                    <?php endwhile;?>
                </table>
            </div>

        </div>
        <div id="checkout-affix">
	    <form class="paypal" action="https://www.sandbox.paypal.com/en/cgi-bin/webscr" method="post" id="paypal_form" >
	        <fieldset>
	            <input type="hidden" name="cmd" value="_cart" />
	            <input type="hidden" name="upload" value="1">
	            <input type="hidden" name="business" value="athiraashwin-seller@gmail.com">
	
	            <div id="hidden-affix">
	                <?php
	                if (!empty($cartItems)) {
	                    foreach ($cartItems as $cartItem) {
	                        array_push($productIdArrs, $cartItem['id']);
	                    }
	
			    $estimatedDateShow = 0;
	                    $implode_cart_arr = implode("','", $productIdArrs);
	                    $sqlCartItems    = sprintf("SELECT id, name, sprice, estimated_days FROM product WHERE id IN('%s')",$implode_cart_arr);
	                    $j = 0;
	                    $resultCartItems = mysqli_query($link, $sqlCartItems);
	                    while ($productRow = mysqli_fetch_assoc($resultCartItems)):
	                        $j++;
	                        $amount         = $productRow['sprice'] * $cartItems[$productRow['id']]['qty'];
	                        $shippingCharge = ($amount * 15)/100;
	                        
	                        $estimatedDate  = (isset($productRow['estimated_days']))? $productRow['estimated_days'] : 0;
                                if ($estimatedDate != 0){
                                    $estimatedDateShow = '+'.$estimatedDate.' days';
                                }
	                        ?>
	                        <input type="hidden" name="quantity_<?php echo $j;?>" value="<?php echo $cartItems[$productRow['id']]['qty'];?>" />
	                        <input type="hidden" name="item_name_<?php echo $j;?>" value="<?php echo $productRow['name'];?>" />
	                        <input type="hidden" name="amount_<?php echo $j;?>" value="<?php echo $productRow['sprice'];?>" />
	                        <input type="hidden" name="item_number_<?php echo $j;?>" value="<?php echo $productRow['id'];?>" / >
	                        <input type="hidden" name="shipping_<?php echo $j;?>" value="<?php echo $shippingCharge;?>">
	                    <?php endwhile;?>
	                <?php } ?>
	            </div>
	
	
	            <input type="hidden" name="currency_code" value="EUR" />
	            <input type="hidden" name="notify_url" value="http://demox.imrokraft.com/chloris/paypal_ipn.php">
	            <input type="hidden" name="undefined_quantity" value="1">
	            <!--<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/x-click-but22.gif" border="0" name="submit" width="87" height="23" alt="Make payments with PayPal - it's fast, free and secure!">-->
	        </fieldset>
	    </form>
	</div>
        
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-xs-12">
                        <?php if($estimatedDateShow != 0):?>
                        Estimated Deliver Date: <b><?php  echo date('d-m-Y', strtotime($estimatedDateShow));?></b>
                        <?php endif;?>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        Delivery Charges:<span class="check_right"> € <?php echo $shippingCharge;?> </span><br>
                        Total: <span class="check_right"> <b> € <?php echo round($price, 2) + round($shippingCharge, 2);?> </span></b><br><br>
                        <span class="check_right"><button type="submit" form="paypal_form" class="btn">
                                <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal" />
                        </button></span>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php endif;?>
<?php } else {?>
    <div class="modal-content">
        <div class="modal-header">
            <div class="check_top_heading">Shopping Cart</div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="checkout-right">

            </div>

        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12 text-center">
                        <h3>No Items In The Cart</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <?php }
?>


