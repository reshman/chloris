<?php
include('db.php');
session_start();
if ($_GET['id']) {
    $sqlProduct = sprintf("SELECT * FROM product WHERE id=%d", $_GET['id']);
    $sqlResult = mysqli_query($link, $sqlProduct);
    if (mysqli_num_rows($sqlResult)) {
        $row = mysqli_fetch_assoc($sqlResult);
        $product_id = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
        $stock = $row['qty'];
        $price = $row['price'];
        $sprice = $row['sprice'];
        $specification = $row['specification'];

//			$category=$row['category'];
//			$image1= $row['image1'];
//			$image2=$row['image2'];
//			$image3=$row['image3'];
//			$image4=$row['image4'];
    }
}
?>
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
    <script src="js/simpleCart.min.js"></script>
    <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="js/memenu.js"></script>
    <script>$(document).ready(function () {
            $(".memenu").memenu();
        });</script>
    <!-- /start menu -->
    <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
</head>
<body>
<?php include 'header.php'; ?>
<!---->
<div class="single-sec">
<div class="container">
<ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="product.php">Shop</a></li>
    <li class="active">Products</li>
</ol>
<!-- start content -->
<div class="col-md-12 det">
<div class="single_left">
    <div class="flexslider">
        <ul class="slides">
            <li data-thumb="<?php echo $image1; ?>">
                <img src="<?php echo $image1; ?>" />
            </li>
            <li data-thumb="<?php echo $image2; ?>">
                <img src="<?php echo $image2; ?>" />
            </li>
            <li data-thumb="<?php echo $image3; ?>">
                <img src="<?php echo $image3; ?>" />
            </li>
            <li data-thumb="<?php echo $image4; ?>">
                <img src="<?php echo $image4; ?>" />
            </li>
        </ul>
    </div>

</div>
<div class="single-right">
    <h2><?php echo $name; ?></h2>
    <div class="id"><h4>ID: <?php echo $product_id; ?></h4></div>
    <form action="" class="sky-form">
        <fieldset>
            <section>
                <div class="rating">
                    <input type="radio" name="stars-rating" id="stars-rating-5">
                    <label for="stars-rating-5"><i class="icon-star"></i></label>
                    <input type="radio" name="stars-rating" id="stars-rating-4">
                    <label for="stars-rating-4"><i class="icon-star"></i></label>
                    <input type="radio" name="stars-rating" id="stars-rating-3">
                    <label for="stars-rating-3"><i class="icon-star"></i></label>
                    <input type="radio" name="stars-rating" id="stars-rating-2">
                    <label for="stars-rating-2"><i class="icon-star"></i></label>
                    <input type="radio" name="stars-rating" id="stars-rating-1">
                    <label for="stars-rating-1"><i class="icon-star"></i></label>
                    <div class="clearfix"></div>
                </div>
            </section>
        </fieldset>
    </form>
    <div class="cost">
        <div class="prdt-cost">
            <ul>
                <li>Stock: <?php echo $stock ?></li>
                <li>MRP: SGD <del><?php echo $price ?></del></li>
                <li class="active">Sellling Price: SGD <span class="active"><?php echo $sprice ?></span></li>

                <?php
                //Set useful variables for paypal form
                $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
                //$paypal_id = 'info@codexworld.com'; //Business Email
                $paypal_id = 's.reshman+seller@gmail.com'; //Business Email
                ?>
                <form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
                    <input type="hidden" name="cmd" value="_xclick" />
                    <input type="hidden" name="item_name" value="<?php echo $name;?>" />
                    <input type="hidden" name="no_note" value="1" />
                    <input type="hidden" name="amount" value="<?php echo $sprice;?>" />
                    <input type="hidden" name="lc" value="US" />
                    <input type="hidden" name="currency_code" value="USD" />
                    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                    <input type="hidden" name="first_name" value="Customer's First Name"  />
                    <input type="hidden" name="last_name" value="Customer's Last Name"  />
                    <input type="hidden" name="payer_email" value="customer@example.com"  />
                    <input type="hidden" name="item_number" value="<?php echo $product_id?>" / >
                    <input type="image" name="submit" border="0"
                           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
                    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                </form>

                <!--<a href="#">BUY NOW</a>-->
            </ul>
        </div>
        <!--<div class="check">
                <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Enter pin code for delivery & availability</p>
                <form class="navbar-form navbar-left" role="search">
                         <div class="form-group">
                               <input type="text" class="form-control" placeholder="Enter Pin code">
                         </div>
                         <button type="submit" class="btn btn-default">Verify</button>
                </form>
        </div>-->
        <div class="clearfix"></div>
    </div>
    <div class="item-list">
        <?= $specification; ?>
    </div>
    <div class="single-bottom1">
        <h6>Details</h6>
        <p class="prod-desc"><?php echo $description ?></p>
    </div>
</div>
<div class="clearfix"></div>

<!---->

<!--<div class="arrivals">
<h3>Related Products</h3>
<div class="arrival-grids">
        <ul id="flexiselDemo1">
                <li>
                        <a href="product.php"><img src="images/p2.jpg" alt=""/>
                        <div class="arrival-info">
                                <h4>Jewellerys #1</h4>
                                <p>Rs 12000</p>
                                <span class="pric1"><del>Rs 18000</del></span>
                                <span class="disc">[12% Off]</span>
                        </div>
                        <div class="viw">
                               <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                        </div></a>
                </li>
                <li>
                        <a href="product.php"><img src="images/p3.jpg" alt=""/>
                               <div class="arrival-info">
                                <h4>Jewellerys #1</h4>
                                <p>Rs 14000</p>
                                <span class="pric1"><del>Rs 15000</del></span>
                                <span class="disc">[10% Off]</span>
                        </div>
                        <div class="viw">
                               <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                        </div></a>
                </li>
                <li>
                        <a href="product.php"><img src="images/p4.jpg" alt=""/>
                               <div class="arrival-info">
                                <h4>Jewellerys #1</h4>
                                <p>Rs 4000</p>
                                <span class="pric1"><del>Rs 8500</del></span>
                                <span class="disc">[45% Off]</span>
                        </div>
                        <div class="viw">
                               <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                        </div></a>
                </li>
                <li>
                   <a href="product.php"> <img src="images/p5.jpg" alt=""/>
                               <div class="arrival-info">
                                <h4>Jewellerys #1</h4>
                                <p>Rs 18000</p>
                                <span class="pric1"><del>Rs 21000</del></span>
                                <span class="disc">[8% Off]</span>
                        </div>
                        <div class="viw">
                               <a href="#"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Quick View</a>
                        </div></a>
                </li>
               </ul>
               <script type="text/javascript">
                $(window).load(function() {
                 $("#flexiselDemo1").flexisel({
                       visibleItems: 4,
                       animationSpeed: 1000,
                       autoPlay: true,
                       autoPlaySpeed: 3000,
                       pauseOnHover:true,
                       enableResponsiveBreakpoints: true,
                       responsiveBreakpoints: {
                               portrait: {
                                       changePoint:480,
                                       visibleItems: 1
                               },
                               landscape: {
                                       changePoint:640,
                                       visibleItems: 2
                               },
                               tablet: {
                                       changePoint:768,
                                       visibleItems: 3
                               }
                       }
               });
               });
               </script>
                                       <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                </div>
       </div>	-->
<!---->
</div>
<div class="clearfix"></div>
</div>
</div>
<!---->
<?php include 'footer.php'; ?>
<!--</div>-->
</body>
</html>