<?php
include('connect.php');
session_start();
if(isset($_SESSION['session_name']))
 {
	$username=$_SESSION['session_name'];
	if ($_GET['adminmsg'] == "valid")
	{
		unset($_SESSION['edit_image']);
		$_SESSION['product_id'] = time();
		$sql=("INSERT INTO tenp_reg (id) VALUES(:id)");
		$query = $db->prepare( $sql );
		$q=$query->execute( array(':id'=>$_SESSION['product_id']));
		if($q)
		{
			$_GET['adminmsg'] = "";
			$_SESSION['details_status']=0;
			$_SESSION['image_status1']=0;
			$_SESSION['image_status2']=0;
			$_SESSION['image_status3']=0;
			$_SESSION['image_status4']=0;
			$_SESSION['image_status']=0;
			$name=$description=$stock=$mrp=$price=$field1=$field2=$field3=$field4=$field5=$category=""; 
			$name_error=$description_error=$stock_error=$mrp_error=$price_error=$category_error="";
		}
	}
	if($_SESSION['details_status'])
	{
		$query = $db->prepare("SELECT * FROM tenp_reg WHERE id=:id");
		$query->bindParam(':id', $_SESSION['product_id']);
		$query->execute();
		if($row = $query->fetch()){
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
		}
	}
	if($_SESSION['image_status'])
	{
		$query = $db->prepare("SELECT * FROM tenp_reg WHERE id=:id");
		$query->bindParam(':id', $_SESSION['product_id']);
		$query->execute();
		if($row = $query->fetch()){
			$image1= $row['image1'];
			$image2=$row['image2'];
			$image3=$row['image3'];
			$image4=$row['image4'];
		}
	}
 	
	  
	  if(isset($_POST['add']))
		{
			if($_SESSION['image_status'] &&$_SESSION['details_status'])
			{
				$sql=("INSERT INTO product_reg (id,name,description,stock,mrp,price,field1,field2,field3,field4,field5,category,image1,image2,image3,image4) VALUES(:id,:name,:description,:stock,:mrp,:price,:field1,:field2,:field3,:field4,:field5,:category,:image1,:image2,:image3,:image4)");
				$query = $db->prepare( $sql );
				$q=$query->execute( array(':id'=>$_SESSION['product_id'],
										  ':name'=>$name,
										  ':description'=>$description,
										  ':stock'=>$stock,
										  ':mrp'=>$mrp,
										  ':price'=>$price,
										  ':field1'=>$field1,
										  ':field2'=>$field2,
										  ':field3'=>$field3,
										  ':field4'=>$field4,
										  ':field5'=>$field5,
										  ':category'=>$category,
										  ':image1'=>$image1,
										  ':image2'=>$image2,
										  ':image3'=>$image3,
										  ':image4'=>$image4));
				  if($q){
					$photo_dest1="../".$image1;
					$photo_dest2="../".$image2;
					$photo_dest3="../".$image3;
					$photo_dest4="../".$image4;
					rename($image1, $photo_dest1);
					rename($image2, $photo_dest2);
					rename($image3, $photo_dest3);
					rename($image4, $photo_dest4);
					$result = $db->prepare("DELETE FROM tenp_reg");
					$result->bindParam(':id', $_SESSION['product_id']);
					$result->execute();
					$files = glob('product_images/*'); 
					foreach($files as $file){ 
					  	if(is_file($file))
						unlink($file); 
					}
					unset($_SESSION['details_status']);
					unset($_SESSION['image_status1']);
					unset($_SESSION['image_status3']);
					unset($_SESSION['image_status4']);
					unset($_SESSION['image_status']);
					unset($_SESSION['product_id']);
					header("Location:index.php");
				}
			}
		}
		
	  if(isset($_POST['save']))
			{
			if(empty($_POST["name"])) 	
			{	
				$name_error = "* Empty value not allowed";	
			}	
			else	
			{	
				$name=$_POST['name'];	
			}	
			if(empty($_POST["description"])) 	
			{	
				$description_error = "* Empty value not allowed";	
			}	
			else	
			{	
				$description=$_POST['description'];	
			}
			if(empty($_POST["stock"])) 	
			{	
				$stock_error = "* Empty value not allowed";	
			}
			else if(!((is_numeric($_POST["stock"]))))	
				{	
				   $stock_error = "Invalid Mrp value.";	
				}	
				else 	
				{	
					$stock=$_POST['stock'];	
				}	
			if(empty($_POST["mrp"])) 	
			{	
				$mrp_error = "* Empty value not allowed";	
			}	
			else if(!((is_numeric($_POST["mrp"]))))	
				{	
				   $mrp_error = "Invalid Mrp value.";	
				}
				else 	
				{	
					$mrp=$_POST['mrp'];	
				}
			if(empty($_POST["price"])) 	
			{	
				$price_error = "* Empty value not allowed";	
			}	
			else if(!((is_numeric($_POST["price"]))))	
				{	
				   $price_error = "Invalid price value.";	
				}
				else 	
				{	
					$price=$_POST['price'];	
				}					
			if(empty($_POST["field1"])) 	
			{	
				$field1 ="";	
			}	
			else 	
			{	
				$field1 = $_POST['field1'];	
			}				
			if(empty($_POST["field2"])) 	
			{	
				$field2 ="";;	
			}	
			else	
			{	
				$field2=$_POST['field2'];	
			}
			if(empty($_POST["field3"])) 	
			{	
				$field3 ="";	
			}	
			else 
			{
				$field3 = $_POST['field3'];
			}
			if(empty($_POST["field4"])) 	
			{	
				$field4 ="";	
			}	
			else 	
			{	
				$field4 = $_POST['field4'];	
			}	
			if(empty($_POST["field5"])) 	
			{	
				$field5 ="";	
			}	
			else 	
			{	
				$field5 = $_POST['field5'];	
			}
			if(empty($_POST["category"])) 	
			{	
				$category_error = "* Please select any of the value";	
			}	
			else 	
			{	
				$category = $_POST['category'];	
			}
			if(($name_error==""))
				{
				
					$sql=("UPDATE tenp_reg SET name=:name,description=:description,stock=:stock,mrp=:mrp,price=:price,field1=:field1,field2=:field2,field3=:field3,field4=:field4,field5=:field5,category=:category where id=:id");
					$query = $db->prepare( $sql );
					$q=$query->execute( array(
											  ':name'=>$name,
											  ':description'=>$description,
											  ':stock'=>$stock,
											  ':mrp'=>$mrp,
											  ':price'=>$price,
											  ':field1'=>$field1,
											  ':field2'=>$field2,
											  ':field3'=>$field3,
											  ':field4'=>$field4,
											  ':field5'=>$field5,
											  ':category'=>$category,
											  ':id'=>$_SESSION['product_id']
											  ));
					if($q)
					{
						$_SESSION['details_status']=1;
					}
				}
		}	 
?>
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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="src/js/jquery.validVal.js"></script>
<script type="text/javascript" src="src/js/jquery.validVal-customValidations.js"></script>
<script type="text/javascript" src="src/js/jquery.validVal-debugger.js"></script>
<script type="text/javascript">
	$(function() {
				$('form[name="fadd"]').validVal();
				});
</script>
</head>
<body class="radio"> 
<div class="full">	
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
    </div>     
	<div class="clearfix"> </div>
  </div>
<div class="product-model">	 
	 <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Admin Home</a></li>
            <li class="active">Products</li>
        </ol>
		<h2>Add Products</h2>	
        <div class="container span_1_of_2">
        <?php
        	if(!($_SESSION['details_status']))
				{?>
                  <form class="form-horizontal" action="" method="post" name="fadd" id="fadd" enctype="multipart/form-data">
                        <div class="div_input"> 
                            <span>Flower Name<span class="req">*</span></span>                         
                            <input type="text" class="form-control file_wid" id="name" name="name" placeholder="Flower Name"  value="<?php echo $name ?>" title="Please enter Flower name" required />
                            <span class="error"><?php echo"<br />". $name_error; ?></span>
                        </div>                  
                    	<div class="div_input"> 
                            <span>Description<span class="req">*</span></span>
                            <textarea class="form-control file_wid" id="description" name="description" placeholder="Description"   title="Please enter description" required ><?php echo $description ?></textarea><span class="warn"></span><span class="error"><?php echo"<br />". $description_error; ?></span>
                    	</div>
                        <div class="div_input"> 
                            <span>Stock<span class="req">*</span></span>                         
                            <input type="number" class="form-control file_wid" id="stock" name="stock" placeholder="stock" value="<?php echo $stock ?>"   title="Please enter Stock details" required />
                            <span class="error"><?php echo"<br />". $stock_error; ?></span>
                        </div>
                        <div class="div_input"> 
                            <span>MRP<span class="req">*</span></span>                         
                            <input type="number" step="any" class="form-control file_wid" id="mrp" name="mrp" placeholder="MRP" value="<?php echo $mrp ?>"   title="Please enter MRP" required /><span class="error"><?php echo"<br />". $mrp_error; ?></span>
                        </div>
                        <div class="div_input"> 
                            <span>Selling Price<span class="req">*</span></span>                         
                            <input type="number" step="any" class="form-control file_wid" id="price" name="price" placeholder="Selling Price" value="<?php echo $price ?>"   title="Please enter Selling Price" required /><span class="error"><?php echo"<br />". $price_error; ?></span>
                        </div>
                        <h4>Details of flower</h4>
                        <div class="div_input"> 
                            <span>Field1</span>                           
                            <input type="text" class="form-control file_wid" id="field1" name="field1" placeholder="Details of flower" value="<?php echo $field1 ?>" />
                        </div> 
                        <div class="div_input"> 
                            <span>Field2</span>    
                            <input type="text" class="form-control file_wid" id="field2" name="field2" placeholder="Details of flower" value="<?php echo $field2 ?>" />
                        </div>                          
                        <div class="div_input"> 
                            <span>Field3</span>   
                            <input type="text" class="form-control file_wid" id="field3" name="field3" placeholder="Details of flower" value="<?php echo $field3 ?>" />
                        </div> 
                        <div class="div_input"> 
                            <span><span>Field4</span>   <span class="req"></span></span>                           
                            <input type="text" class="form-control file_wid" id="field4" name="field4" placeholder="Details of flower" value="<?php echo $field4 ?>" />
                        </div> 
                        <div class="div_input"> 
                            <span>Field5</span>                             
                            <input type="text" class="form-control file_wid" id="field5" name="field5" placeholder="Details of flower" value="<?php echo $field5 ?>" />
                        </div>
                        <div class="div_input">
                          	<span>Categroy</span><span class="req">*</span>
                          	<select class="form-control" name="category" id="category" required>
                              <option value="">select</option>               
                                <option value="BOUQUETS" <?php if( $category == "BOUQUETS") {?> selected="selected" <?php } ?> >BOUQUETS</option>                
                                <option value="ORNAMENTAL" <?php if( $category == "ORNAMENTAL") {?> selected="selected" <?php } ?> >ORNAMENTAL</option>
                                <option value="WEDDING FLOWER" <?php if( $category == "WEDDING FLOWER") {?>selected="selected"  <?php } ?> >WEDDING FLOWER</option>
                                <option value="GIFTING" <?php if( $category == "GIFTING") {?> selected="selected"  <?php } ?> >GIFTING</option>                                            
                          </select>
                             <span class="error"><?php echo"<br />". $category_error; ?></span>
                    </div>
                        <div class="div_input">
                            <input type="reset" value="RESET" />
                            <input type="submit" value="SAVE" name="save" Onclick="return check(this.form);"/>   
                        </div>	
                  </form>
				<?php }elseif($_SESSION['details_status']==1){?>
						<h4>Details of flower</h4>
                  		<div class="div_input">
						<p>Name: &nbsp;<?php echo $name; ?></p>
                        <p>Description: &nbsp;<?php echo $description; ?></p>
                        <p>Stock: &nbsp;<?php echo $stock; ?></p>
                        <p>Mrp: &nbsp;<?php echo $mrp; ?></p>
                        <p>Price: &nbsp;<?php echo $price; ?></p>
                        <p>Field1: &nbsp;<?php echo $field1; ?></p>
                        <p>Field2: &nbsp;<?php echo $field2; ?></p>
                        <p>Field3: &nbsp;<?php echo $field3; ?></p>
                        <p>Field4: &nbsp;<?php echo $field4; ?></p>
                        <p>Field5: &nbsp;<?php echo $field5; ?></p>
                        <p>Category: &nbsp;<?php echo $category; ?></p>
                        </div>
						<?php } ?>
					  
				   <?php
                        if(!($_SESSION['image_status'])&&($_SESSION['details_status']))
							{?>		 
                  <h4>Images of flower</h4>
                  <div class="div_input">
                    <span>Images</span><span class="req">*</span><br><br>
                    <a href="add_image1.php" class="abutton">ADD IMAGE</a>
                    <?php }else if($_SESSION['image_status']==1){ ?>
                    <h4>Images of flower</h4>
                    <div class="div_input">
                    <p>Image 1</p>
                    <img src="<?php echo $image1 ?>" >
                    <p>Image 2</p>
                    <img src="<?php echo $image2  ?>" >
                    <p>Image 3</p>
                    <img src="<?php echo $image3  ?>" >
                    <p>Image 4</p>
                    <img src="<?php echo $image4  ?>" >
					<?php } ?>
                  </div>
                  <?php
                        if(($_SESSION['image_status'])&&($_SESSION['details_status']))
							{?>	
                  <div class="div_input">
                    <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
                      <input type="submit" value="ADD FLOWER" name="add" />
                    </form>
                  </div>
                  <?php }?>
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
