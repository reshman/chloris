<?php
session_start();
if(isset($_SESSION['product_id']))
{ 
$photo_src = $_FILES['photo']['tmp_name'];
if (is_file($photo_src)) {
$photo_dest = 'product_images/photo_'.time().'.jpg';
copy($photo_src, $photo_dest);
echo '<script type="text/javascript">window.top.window.show_popup_crop("'.$photo_dest.'")</script>';
}
}
elseif(isset($_SESSION['edit_image']))
{
	$photo_src = $_FILES['photo']['tmp_name'];
	if (is_file($photo_src)) {
	$photo_dest = "../".$_SESSION['edit_image'];
	move_uploaded_file($photo_src, $photo_dest);
	echo '<script type="text/javascript">window.top.window.show_popup_crop("'.$photo_dest.'")</script>';
	}
}


?>