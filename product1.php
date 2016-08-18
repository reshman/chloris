<?php
include('connect.php');
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
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body> 
<div class="full">
<div class="top_bg">
	<div class="container">
		<div class="header_top-sec">
		  <div class="top_left">
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="header-top">
	 <div class="header-bottom">
				<div class="logo">
					<a href="index1.html">
					<h1>Floral Designs</h1></a>
				</div>
		 <div class="container">	
			 <div class="top-nav">
				<ul class="memenu skyblue"><li class="grid"><a href="index1.html">Home</a></li>
					<li class="active"><a href="product.php">SHOP</a></li>
					<li class="grid"><a href="#">CLASSES</a></li>
					<li class="grid"><a href="#">MORE</a>
                    <div class="mepanel">
							<div class="row">
								<div class="col1 me-one">
									<ul>
                                    	<li><a href="product.php">ABOUT&nbsp;US</a></li>
										<li><a href="contact.html">CONTACT</a></li>
										<li><a href="product.php">PRICING/FAQS</a></li>
										<li><a href="product.php">PRESS</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </li>
				</ul>
				<div class="clearfix"></div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
     </div>     
	 <div class="clearfix"> </div>
</div>
<div class="product-model">	 
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index1.html">Home</a></li>
		  <li class="active">Products</li>
		 </ol>
		 <h2>Our Products</h2>	
         <div class="rsidebar span_1_of_left">
				<section  class="sky-form">
					 	<div class="product_right">
                             <h4 class="m_2">Categories</h4>
                             <div class="tab1">
                                 <ul class="place">								
                                     <li class="sort"><a href="product.php">BOUQUETS</a></li>
                                     <div class="clearfix"> </div>
                                 </ul>
                             </div>						  
                             <div class="tab2">
                                 <ul class="place">								
                                     <li class="sort"><a href="product1.php">ORNAMENTAL</a> </li>
                                        <div class="clearfix"> </div>
                                  </ul>
                              </div> 
                             <div class="tab3">
                                 <ul class="place">								
                                     <li class="sort"><a href="product2.php">WEDDING FLOWER</a> </li>
                                        <div class="clearfix"> </div>
                                  </ul>
                              </div>
                             <div class="tab4">
                                 <ul class="place">								
                                     <li class="sort"><a href="product3.php">GIFTING</a></li>
                                        <div class="clearfix"> </div>
                                  </ul>
                                 
                              </div>
                        </div>	 
				 </section>
				 
		 </div>   		
		 <div class="col-md-9 product-model-sec">
         <?php
			$result = $db->prepare("SELECT * FROM product_reg where category='ORNAMENTAL'");
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
         ?>
             <a href="single.php?id=<?php echo $row['id']; ?>">
                 <div class="product-grid love-grid">
                    <div class="more-product"><span> </span></div>						
                    <div class="product-img b-link-stripe b-animate-go  thickbox">
                        <img src="<?php echo $row['image1']; ?>" class="img-responsive" alt=""/>
                        <div class="b-wrapper">
                            <h4 class="b-animate b-from-left  b-delay03">							
                            <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
                            </h4>
                        </div>
                    </div>		
                	<div class="product-info simpleCart_shelfItem">
                    	<div class="product-info-cust prt_name">
                            <h4>Flower #<?php echo $i+1; ?></h4>
                            <p>ID: <?php echo $row['id']; ?></p>
                            <p class="item_price">Item Price: SGD <?php echo $row['price']; ?></p>								
                            <!--<input type="text" class="item_quantity" value="1" />-->
                            <input type="button" class="item_add items" value="BUY">
                    	</div>													
                   		<div class="clearfix"> </div>
                	</div>
            	</div>
             </a>
         <?php }?>
		 </div>
	 </div>
</div>
<div class="shoping">
	 <div class="container">
		 <div class="shpng-grids">
			
		   <div class="col-md-6 shpng-grid">
				 <h3>ABOUT</h3>
			   <p>Learn more about FLORAL Designs</p>
			 </div>
			 <div class="col-md-6 shpng-grid">
				 <h3>STAY IN TOUCH</h3>
				 <p><div class="social">
				<ul>
					<li><a class="fa" href="#"> </a></li>
					<li><a class="tw" href="#"> </a></li>
					<li><a class="p" href="#"> </a></li>
				</ul>
				</div></p>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<div class="copywrite">
	 <div class="container">
     		<p>&nbsp;</p>
			<center>
			  <p>Copyright © 2015 FLORAL DESIGNS All rights reserved | Design by <a href="http://www.lionmarks.in">LIONMARKS</a></p></center>
		 </div>
</div>	
</div>
</div>
</body>
</html>