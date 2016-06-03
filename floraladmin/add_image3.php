<?php
include('connect.php');
session_start();
if(isset($_SESSION['session_name']))
 {
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
<script type="text/javascript" src="js/script3.js"></script>
</head>
<body> 
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
        
		<h2>ADD IMAGE 3</h2>	
        <h2>&nbsp;</h2>
        <div class="container span_1_of_2">
         <?php if(($_SESSION['image_status2'])==1){?>         
                  <div class="div_input">
                    <div class="container">
                        <div class="content">
                            <span class="upload_btn" onclick="show_popup('popup_upload')">Click to upload photo</span>
                            <div id="photo_container">
                            </div>
                        </div>  
                    </div>
                    <div id="popup_upload">
                        <div class="form_upload">
                            <span class="close" onclick="close_popup('popup_upload')">x</span>
                            <h2>Upload photo</h2>
                            <form action="upload_photo.php" method="post" enctype="multipart/form-data" target="upload_frame" onsubmit="submit_photo()">
                                <input type="file" name="photo" id="photo" class="file_input">
                                <div id="loading_progress"></div>
                                <input type="submit" value="Upload photo" id="upload_btn">
                            </form>
                            <iframe name="upload_frame" class="upload_frame"></iframe>
                        </div>
                    </div>
                    <div id="popup_crop">
                        <div class="form_crop">
                            <span class="close" onclick="close_popup('popup_crop')">x</span>
                            <h2>Crop photo</h2>
                            <!-- This is the image we're attaching the crop to -->
                            <img id="cropbox" />
                            
                            <!-- This is the form that our event handler fills -->
                            <form>
                                <input type="hidden" id="x" name="x" />
                                <input type="hidden" id="y" name="y" />
                                <input type="hidden" id="w" name="w" />
                                <input type="hidden" id="h" name="h" />
                                <input type="hidden" id="photo_url" name="photo_url" />
                                <input type="button" value="Crop Image" id="crop_btn" onclick="crop_photo()" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="div_input">
                <a href="add_image2.php" class="abutton">BACK</a>
                
                <a href="add_image4.php" class="abutton">NEXT</a>
                <?php }else{  echo "<p class='req'>IMAGE 2 is not Uploaded. Click back to Upload IMAGE 2</p>";?> <br><a href="add_image2.php" class="abutton">BACK</a><?php }  ?>
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
