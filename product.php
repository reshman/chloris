<!DOCTYPE html>
<?php //include_once 'logincheck.php';?>
<html>
    <head>
        <title>Chloris Designs</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- start menu -->
        <script src="js/simpleCart.min.js"></script>
        <!-- start menu -->
        <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/memenu.js"></script>
        <script>$(document).ready(function () {
    $(".memenu").memenu();
});</script>	
        <!-- /start menu -->
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <?php
    include('db.php');
    include 'header.php';
    ?>
    <div class="product-model">	 
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Products</li>
            </ol>
            <div class="row" id="alertmsgs"></div>
            <h2>Our Products</h2>	
            <?php include 'left-menu.php'; ?>   		
            <div class="col-md-9 product-model-sec">
                <?php
                if (isset($_GET['category'])) {
                    $category_id = $_GET['category'];
                } else {
                    $sqlCategory = sprintf("SELECT id FROM category WHERE id='%s'", $catId);
                    $resultCategory = mysqli_query($link, $sqlCategory);
                    $rowCategory = mysqli_fetch_assoc($resultCategory);
                    $category_id = $rowCategory['id'];
                }

                // Select products
                //$sqlProduct = sprintf("SELECT p.id, p.price, pi.image_name from product p LEFT JOIN product_image pi ON p.id = pi.product_id WHERE category_id=%d LIMIT 1", $category_id);
                $sqlProduct = sprintf("SELECT * from product WHERE category_id=%d AND qty > %d", $category_id, 0);
                $resultProduct = mysqli_query($link, $sqlProduct);

                if (mysqli_num_rows($resultProduct) > 0) {
                    $i = 1;
                    while ($productRow = mysqli_fetch_assoc($resultProduct)) {
                        //Select images of product
                        $sql = sprintf("SELECT * from product_image WHERE product_id=%d LIMIT 1", $productRow['id']);
                        $result = mysqli_query($link, $sql);
                        $flowerRow = mysqli_fetch_assoc($result);
                        ?>
                        <a href="product-details.php?id=<?php echo $productRow['id']; ?>">
                            <div class="product-grid love-grid">
                                <div class="more-product"><span> </span></div>						
                                <div class="product-img b-link-stripe b-animate-go  thickbox">
                                    <img src="admin/product_images/<?php echo $flowerRow['image_name']; ?>" class="img-responsive" alt=""/>
                                    <div class="b-wrapper">
                                        <h4 class="b-animate b-from-left  b-delay03">							
                                            <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                                        </h4>
                                    </div>
                                </div>		
                                <div class="product-info simpleCart_shelfItem">
                                    <div class="product-info-cust prt_name">
                                        <h4><?php echo strtoupper($productRow['name']); ?></h4>
                                        <p>ID: <?php echo $productRow['id']; ?></p>
                                        <?php if ($productRow['price'] == $productRow['sprice']) { ?>
                                            <p class="item_price">Selling Price: € <?php echo $productRow['sprice']; ?></p> 
                                            <?php } else {
                                            ?>
                                            <p class="item_price">Item Price: <del>€ <?php echo $productRow['price']; ?></del></p>		
                                            <p class="item_price">Selling Price: € <?php echo $productRow['sprice']; ?></p> 
                                        <?php } ?>
                                        <div class="row">
                                            <div class="text-center">
                                                <a class="btn btn-default btn1 addtocart" productid="<?php echo $productRow['id']; ?>" href="javascript:void(0)" role="button">Add To Cart</a>
                                            </div>
                                        </div>


                                            <!--<input type="text" class="item_quantity" value="1" />-->
                                            <!--<input type="button" class="item_add items" value="BUY">-->

                                        <!--<form class="paypal" action="https://www.sandbox.paypal.com/en/cgi-bin/webscr" method="post" id="paypal_form" >
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="business" value="s.reshman+localseller@gmail.com">
                                                <input type="hidden" name="item_name" value="<?php /* echo $productRow['name']; */ ?>" />
                                                <input type="hidden" name="amount" value="<?php /* echo $productRow['sprice']; */ ?>" />
                                                <input type="hidden" name="currency_code" value="EUR" />
                                                <input type="hidden" name="item_number" value="<?php /* echo $productRow['id'] */ ?>" / >
                                                <input type="hidden" name="notify_url" value="http://demox.imrokraft.com/chloris/paypal_ipn.php">
                                                    <input type="hidden" name="undefined_quantity" value="1">
                                                    <input type="image" src="http://www.paypalobjects.com/en_US/i/btn/x-click-but22.gif" border="0" name="submit" width="87" height="23" alt="Make payments with PayPal - it's fast, free and secure!">
                                            </fieldset>
                                        </form>-->


                                    </div>													
                                    <div class="clearfix"> </div>
                                </div>
                        </a>
                        <?php
                        $i = $i + 1;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>

<script>
    $(function () {
        $('.addtocart').on('click', function () {
            var product_id = $(this).attr('productid');

            $.ajax({
                url: 'addtocart.php?id=' + product_id,
                async: false
            }).done(function (data) {

                $('#alertmsgs').html(data);

                $('html,body').animate({
                    scrollTop: $('#alertmsgs').offset().top
                }, 1000);
            })

            $.ajax({
                url: 'list-cart-items.php',
                async: false
            }).done(function (item) {
                $('#modal-dialog-affix').html(item)
            })


        })
    })
</script>

