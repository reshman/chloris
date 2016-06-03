<?php
include('connect.php');
session_start();
if(isset($_SESSION['session_name']))
 {
$pdt_name="";
?>
<!DOCTYPE html>
<html>
<head>
<title>Chloris Designs</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_search.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/table_css.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body> 
<div class="full">
<!--header-->	
<div class="top_bg">
	<div class="container">
		
	</div>
</div>
<div class="header-top">
    <div class="header-bottom">
		 			
	  <div class="logo">
					<a href="index.html">
					<h1>Floral Designs</h1></a>
			   </div>
              
	    <!----></div>     
			<div class="clearfix"> </div>
  </div>
<!---->
<!--header//-->
<div class="product-model">	 
	 <div class="container">
        <ol class="breadcrumb">
            <li class="active">Admin Home</li>
        </ol>
        <h2>&nbsp;</h2>	
        <div class="rsidebar span_1_of_left">
				<section  class="sky-form">
					 	<div class="product_right">
						 	<h4 class="m_2">WeLCOME ADMIN</h4>
						 	<div class="tab1">
								 <ul class="place">								
								 	<li class="sort"><a href="pdt_add.php?adminmsg=valid">Products</a></li>
									<div class="clearfix"></div>
						   		 </ul>
			             	</div>						  
						  	<div class="tab2">
								<ul class="place">								
									<li class="sort">Orders</li>
									<div class="clearfix"> </div>
						    	</ul>
					      	</div>
						  	<div class="tab3">
							 	<ul class="place">								
								 	<li class="sort"><a href="logout.php">Logout</a></li>
									<div class="clearfix"> </div>
						    	</ul>
					      	</div>	
                        </div> 
		   		</section>
	    </div>   		
		<div class="product-model-sec container">
        <div class="div_table">
            <table>
                <tr>
                    <td><div id="content"> 
						<?php $val=''; if(isset($_POST['submit'])) { if(!empty($_POST['name'])) { $val=$_POST['name']; } else { $val=''; } } ?> 
                        <form method="post" action="index.php"> 
                        Search : 
                        <input type="text" name="name" id="name" autocomplete="off" value="<?php echo $val;?>"> 
                        <input type="submit" name="submit" id="submit" value="Search"> 
                        </form>
                        <div id="display"></div> 
                        <?php 
                        if(isset($_POST['submit'])) { 
                        if(!empty($_POST['name'])) { 
                        $name=$_POST['name'];
                        $query = $db->prepare("SELECT  `name` FROM `product_reg` WHERE `name` LIKE ?");
                        $query->execute(array("%$name%"));
                            while ($results = $query->fetch()) 
                            {
                                $pdt_name=$results['name'];
                            }       
                        } 
                        
                         else { echo "No Results"; 
                         } } ?> 
                         </div>
                    </td>
                    <td> 
                        <a href="pdt_add.php?adminmsg=valid" class="abutton">ADD</a>
                    </td>
                </tr>
                </table>
         <div class="div_table">
            <table>
                <tr>
                    <td> Id </td>
                    <td> Name </td>
                    <td> Stock </td>
                    <td> Mrp </td>
                    <td> Selling Price </td>
                    <td> Category </td>
                    <td> Action </td>
                </tr>
                <?php
                    
                    if($pdt_name != "") { 
                    $result = $db->prepare("SELECT * FROM product_reg WHERE name=:name");
                    $result->bindParam(':name', $_POST['name']);
                    }
                    else
                    {
                    $result = $db->prepare("SELECT * FROM product_reg");
                    }
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><?php echo $row['mrp']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="view_pdt.php?id=<?php echo $row['id']; ?>"> view </a> | <a href="delete_pdt.php?id=<?php echo $row['id']; ?>"> delete </a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
		</div>



       	 </div>
	 </div>
  	</div>
</div>
<!----><!---->
<!---->
<div class="copywrite">
	 <div class="container">
     		<p>&nbsp;</p>
			<center>
			<p>Copyright © 2015 FLORAL DESIGNS All rights reserved | Design by <a href="http://www.lionmarks.in">LIONMARKS</a></p></center>
  	 </div>
</div>	
</div>
<script type="text/javascript">
function fill(Value)
{
$('#name').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
if(name=="")
{
$("#display").html("");
}
else
{

$.ajax({
type: "POST",
url: "ajax.php",
data: "name="+ name ,
success: function(html){
$("#display").html(html).show();
}
});
}
});
});
</script>
</body>
</html>
<?php
 }
  else 
 {
	header( "Location:login.php" );
 }
?>