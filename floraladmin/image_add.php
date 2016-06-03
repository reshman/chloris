<?php
include('connect.php');
session_start();
if(isset($_SESSION['session_name']))
 {
?>
<?php if(!($_SESSION['image_status4'])==1){?> 
<!DOCTYPE html>
<html>
<head>
<title>Chloris Admin page</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" href="css/style_crop.css" />
<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="js/script4.js"></script>
</head>
<body> 
<div class="full">	
<div class="top_bg">
	<div class="container">
		
	</div>
</div>
<div class="header-top">
         
	<div class="clearfix"> </div>
  </div>
<div class="product-model">	 
	 <div class="container">
        
	
                <?php echo "<p class='req'>IMAGE 4 is not Uploaded. Click back to Upload IMAGE 4</p>";?> <br><a href="add_image4.php" class="abutton">BACK</a><?php }else{
header ("Location: pdt_add.php?admin_msg=0"); }?>
                </div>
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

</body>
</html>
<?php   
	 
 }
 else 
 {
	header( "Location:login.php" );
 } 
?>
