<?php
include('connect.php');
session_start();
	if ($_GET['id'])
	{   $query = $db->prepare("SELECT * FROM product_reg WHERE id=:id");
		$query->bindParam(':id', $_GET['id']);
		$query->execute();
		if($row = $query->fetch()){
			$id= $row['id'];
			$name= $row['name'];
			$description=$row['description'];
			$stock=$row['stock'];
			$mrp=$row['mrp'];
			$price=$row['price'];
			$field1=$row['field1'];
			$field2=$row['field2'];
			$field3=$row['field3'];
			$field4=$row['field4'];
			$field5=$row['field5'];
			$category=$row['category'];
			$image1= $row['image1'];
			$image2=$row['image2'];
			$image3=$row['image3'];
			$image4=$row['image4'];
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
<script src="js/simpleCart.min.js"> </script>
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!-- /start menu -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
$('.flexslider').flexslider({
animation: "slide",
controlNav: "thumbnails"
});
});
</script>
</head>
<body> 
<div class="full">
<!--header-->	
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
              
			 <!---->
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
             
			 <!---->
			 <div class="clearfix"></div>
			 <!---->			 
			 </div>
        </div>     
			<div class="clearfix"> </div>
	  </div>
<!---->
<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index1.html">Home</a></li>
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
					 <div class="id"><h4>ID: <?php echo $id; ?></h4></div>
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
								 <li>MRP: SGD <del><?php echo $mrp ?></del></li>								 
								 <li class="active">Sellling Price: SGD <span class="active"><?php echo $price ?></span></li>
								 <a href="#">BUY NOW</a>
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
						 <ul>
							 <?php if($field1 != ""){?><li><?php echo $field1 ?></li><?php }?>
							 <?php if($field2 != ""){?><li><?php echo $field2 ?></li><?php }?>
							 <?php if($field3 != ""){?><li><?php echo $field3 ?></li><?php }?>
							 <?php if($field4 != ""){?><li><?php echo $field4 ?></li><?php }?>
                             <?php if($field5 != ""){?><li><?php echo $field5 ?></li><?php }?>
							 
						 </ul>
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
				<ul >
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
<!---->
<!---->
<div class="copywrite">
	 <div class="container">
     		<p>&nbsp;</p>
			<center>
			  <p>Copyright © 2015 FLORAL DESIGNS All rights reserved | Design by <a href="http://www.lionmarks.in">LIONMARKS</a></p></center>
		 </div>
</div>
</div>	
</body>
</html>