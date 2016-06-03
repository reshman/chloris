<?php
include('connect.php');
session_start();
if(isset($_SESSION['session_name']))
 {
	$username=$_SESSION['session_name'];
	if ($_GET['id'])
	{   $query = $db->prepare("SELECT * FROM product_reg WHERE id=:id");
		$query->bindParam(':id', $_GET['id']);
		$query->execute();
		if($row = $query->fetch()){
			$image1= $row['image1'];
			$image2=$row['image2'];
			$image3=$row['image3'];
			$image4=$row['image4'];
			$sql ="DELETE FROM product_reg where id=:id";
		    $query = $db->prepare( $sql );
			$q=$query->execute( array(':id'=>$_GET['id']));
			if($q)
			{
				unlink("../".$image1);
				unlink("../".$image2);
				unlink("../".$image3);
				unlink("../".$image4);
				header("location:index.php");
				
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
</body>
</html>
<?php   	 
 }
 else 
 {
	header( "Location:login.php" );
 } 
?>
