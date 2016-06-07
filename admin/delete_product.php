<?php
if($_GET){
    $id = $_GET['id'];
    include_once 'db.php';
    $query = sprintf("DELETE FROM product WHERE id=%d",$id);
    $result = mysqli_query( $link, $query );
    if($result){
        $_SESSION['error'] = array(
            'message' => "Deleted product Succesfully",
            'type'    => 'success'
        );


        header('location:list-product.php');
        exit();
    } else {
        $_SESSION['error'] = array(
            'message' => "Failed to delete.",
            'type'    => 'danger'
        );


        header('location:list-product.php');
        exit();
    }

}