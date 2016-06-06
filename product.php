<!DOCTYPE html>
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
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
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
        <h2>Our Products</h2>	
        <?php include 'left-menu.php'; ?>   		
        <div class="col-md-9 product-model-sec">
            <?php
            if (isset($_GET['category'])) {
                $category_id = $_GET['category'];
            } else {
                $category_id = 1;
            }

            $sqlProduct = sprintf("SELECT * from product WHERE category_id=%d", $category_id);
            $resultProduct = mysqli_query($link, $sqlProduct);
            if (mysqli_num_rows($resultProduct) > 0) {
                $i = 1;
                while ($productRow = mysqli_fetch_assoc($resultProduct)) {
                    ?>
                    <a href="single.php?id=<?php echo $productRow['id']; ?>">
                        <div class="product-grid love-grid">
                            <div class="more-product"><span> </span></div>						
                            <div class="product-img b-link-stripe b-animate-go  thickbox">
                                <img src="<?php echo $productRow['image1']; ?>" class="img-responsive" alt=""/>
                                <div class="b-wrapper">
                                    <h4 class="b-animate b-from-left  b-delay03">							
                                        <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                                    </h4>
                                </div>
                            </div>		
                            <div class="product-info simpleCart_shelfItem">
                                <div class="product-info-cust prt_name">
                                    <h4>Flower #<?php echo $i; ?></h4>
                                    <p>ID: <?php echo $productRow['id']; ?></p>
                                    <p class="item_price">Item Price: SGD <?php echo $productRow['price']; ?></p>								
                                    <!--<input type="text" class="item_quantity" value="1" />-->
                                    <input type="button" class="item_add items" value="BUY">
                                </div>													
                                <div class="clearfix"> </div>
                            </div>
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