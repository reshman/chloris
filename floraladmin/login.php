<?php	
session_start();
ob_start();
include_once('connect.php');
$username = $password=  $password_error = $username_error ='';
if(isset($_POST['button']) == 'Login'){
	if (empty($_POST["username"])) 
		{
			$username_error = "* Please enter your user name !!";
			$password_error = "* Please enter your password !!";
		}
	if (empty($_POST["password"])) 
		{
			$password_error = "* Please enter your password !!";
		}
	if(($username_error == "")&&($password_error == ""))
		{
			$query = $db->prepare("SELECT username, password FROM user WHERE username=:username AND password=:password");
			$query->bindParam(':username', $_POST['username']);
			$query->bindParam(':password', $_POST['password']);
			$query->execute();
			if($row = $query->fetch()){
				$_SESSION['session_name'] = $row['username'];
				header("Location: index.php");
			}
			else{
					header("Location:login.php?adminmsg=Invalid username or password");
				}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Chloris Designs| Login </title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="src/js/jquery.validVal.js"></script>
<script type="text/javascript" src="src/js/jquery.validVal-customValidations.js"></script>
<script type="text/javascript" src="src/js/jquery.validVal-debugger.js"></script>
<script type="text/javascript">
	$(function() {
				$('form[name="signup"]').validVal();
				});
</script>
</head>
<body> 
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
			 <!---->		 
        </div>     
			<div class="clearfix"> </div>
	  </div>
<!---->
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="../index.html">Home</a></li>
		  <li class="active">Login</li>
		 </ol>
		 <h2>Admin login</h2>
		 <div class="col-md-6 log">			 
				 <p>Welcome, please enter the folling to continue.</p>
					 <?php
                        if ($_GET['adminmsg'] != "")
                        {
                            echo '<font color="#FF0000" size="2">'.stripslashes($_GET['adminmsg']).'</font>';
                        }
                    ?>
				<div>
		         <form method="post"  class="form-signin" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="signup" id="signup">
                       <h5>Username:</h5>	
                         <input type="text" class="form-control" name="username" id="username" placeholder="Username"    value="<?php echo $username;?>" title="Please enter your username" required/> 
                          
                         <span class="error"><?php echo $username_error; ?></span>
                         <h5>Password:</h5>
                         <input type="password" class="form-control" name="password" id="password" placeholder="Password"   title="Please enter your password" required/>
                        <span class="error"><?php echo $password_error ."<br />"; ?><br/></span>
                        <input type="submit" name="button" id="button" value="Login" />					 
				 </form>
                 </div>
				</div>			
		 <div class="clearfix"></div>
	 </div>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<!---->
<div class="copywrite">
	 <div class="container">
     		<p>&nbsp;</p>
			<center>
			  <p>Copyright © 2015 FLORAL DESIGNS All rights reserved | Design by <a href="http://www.lionmarks.in">LIONMARKS</a></p></center>
		 </div>
</div>
</body>
</html>	
<!-- jQuery (validations) -->
<!--<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function() {
     
	 $.validator.addMethod("username",function(value,element){
    return this.optional(element) || /^[a-zA-Z0-9._-]{5,16}$/i.test(value);  
    },"Username are 5-15 characters");
	
    $.validator.addMethod("password",function(value,element){
    return this.optional(element) || /^[A-Za-z0-9!@#$%^&*()_]{3,16}$/i.test(value);  
    },"Passwords are 3-16 characters");    
        // Validate signup form
        $("#signup").validate({
                rules: {
						username: "required username",
                        password: "required password",

                },
				

        });

    });

</script>
-->
