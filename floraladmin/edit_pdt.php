<?php
include('connect.php');
session_start();
if(isset($_SESSION['session_name']))
 {  $username=$_SESSION['session_name'];
	if (isset($_GET['id']))
	{	   unset($_SESSION['product_id']);
			$id=$_GET['id'];
			$_SESSION['edit_id']=$id;
			$_GET['id']="";
			$query = $db->prepare("SELECT * FROM product_reg WHERE id=:id");
			$query->bindParam(':id', $id);
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
				$image1= $row['image1'];
				$image2=$row['image2'];
				$image3=$row['image3'];
				$image4=$row['image4'];
				$_SESSION['edetails_status']=1;
				$_SESSION['eimage_status']=1;
				$name_error="";
				$description_error="";
				$stock_error="";
				$mrp_error="";
				$price_error="";
				$category_error="";
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
			if(($name_error=="")&&($description_error=="")&&($stock_error=="")&&($mrp_error=="")&&($price_error=="")&&($category_error ==""))
					{
					$sql=("UPDATE product_reg SET name=:name,description=:description,stock=:stock,mrp=:mrp,price=:price,field1=:field1,field2=:field2,field3=:field3,field4=:field4,field5=:field5,category=:category where id=:id");
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
											  ':id'=>$id
											  ));
					if($q)
					{
						$query = $db->prepare("SELECT * FROM product_reg WHERE id=:id");
						$query->bindParam(':id', $id);
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
							$image1= $row['image1'];
							$image2=$row['image2'];
							$image3=$row['image3'];
							$image4=$row['image4'];
							$_SESSION['edetails_status']=1;
							$_SESSION['eimage_status']=1;
			}
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
<link rel="stylesheet" href="css/jquery.Jcrop2.min.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script2.js"></script>
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
		<h2>Edit Products</h2>	
        <div class="container span_1_of_2">
       
                  <form class="form-horizontal" action="" method="post" name="fadd" id="fadd" enctype="multipart/form-data">
                        <div class="div_input"> 
                            <span>Flower Name<span class="req">*</span></span>                         
                            <input type="text" class="form-control file_wid" id="name" name="name" placeholder="Flower Name"  value="<?php echo $name ?>" title="Please enter Flower name" required  />
                            <span class="error"><?php echo"<br />". $name_error; ?></span>
                        </div>                  
                    	<div class="div_input"> 
                            <span>Description<span class="req">*</span></span>
                            <textarea class="form-control file_wid"  id="description" name="description" placeholder="Description"   title="Please enter description" required ><?php echo $description ?></textarea><span class="warn"></span><span class="error"><?php echo"<br />". $description_error; ?></span>
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
                                <option value="ORNAMENTAL" <?php if( $category == "ORNAMENTAL") {?> selected="selected"  <?php } ?> >ORNAMENTAL</option>
                                <option value="WEDDING FLOWER" <?php if( $category == "WEDDING FLOWER") {?> selected="selected"  <?php } ?> >WEDDING FLOWER</option>
                                <option value="GIFTING" <?php if( $category == "GIFTING") {?>selected="selected"   <?php } ?> >GIFTING</option>                                            
                          </select>
                             <span class="error"><?php echo"<br />". $category_error; ?></span>
                    </div>
                        <div class="div_input">
                            <input type="submit" value="SAVE" name="save" />   
                        </div>	
                  </form>
				<?php if(($_SESSION['eimage_status'])&&($_SESSION['edetails_status'])){?>						
                        <h4>Images of flower</h4>
                        <div class="div_input">
                            <span>Images</span><span class="req">*</span><br><br>
                            <h4>Images of flower</h4>
                            <div class="div_input">
                            <p>Image 1</p>
                            <img src="<?php echo "../".$image1 ?>" >
                            <a class="abutton" href="edit_image1.php?id=<?php echo $image1 ?>">Edit</a>
                            <p>Image 2</p>
                            <img src="<?php echo "../".$image2  ?>" >
                            <a class="abutton" href="edit_image1.php?id=<?php echo $image2 ?>">Edit</a>
                            <p>Image 3</p>
                            <img src="<?php echo "../".$image3  ?>" >
                            <a class="abutton" href="edit_image1.php?id=<?php echo $image3 ?>">Edit</a>
                            <p>Image 4</p>
                            <img src="<?php echo "../".$image4  ?>" >
                            <a class="abutton" href="edit_image1.php?id=<?php echo $image4 ?>">Edit</a>
                            <?php } ?>
                        </div>
                        <div class="div_input">
                           <a class="abutton" href="index.php??>">Finish</a>
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
