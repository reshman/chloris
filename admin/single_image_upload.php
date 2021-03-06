<?php

if ($_POST) {
    include_once 'db.php';
    $id = $_POST['id'];

    $query = sprintf("SELECT * FROM product_image WHERE id=%d", $id);
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $product_image_name = $row['image_name'];
    $product_id = $row['product_id'];
    //PHP Upload Script
    if (!is_dir("product_images")) {
        mkdir("product_images");
    }

    $max_size = 30000;          // maximum file size, in KiloBytes
    $allowtype = array('jpg', 'jpeg');        // allowed extensions

    if (isset($_FILES['fileToUpload']) && strlen($_FILES['fileToUpload']['name']) > 1) {

        $sepext = explode('.', strtolower($_FILES['fileToUpload']['name']));
        $type = array_pop($sepext);       // gets extension
        $err = '';         // to store the errors
        // Checks if the file has allowed type and size
        if (!in_array($type, $allowtype)) {
            $err .= 'The file: <b>' . $_FILES['fileToUpload']['name'] . '</b> doesnot not have the allowed extension type.';
        }
        if ($_FILES['fileToUpload']['size'] > $max_size * 1000) {
            $err .= '<br/>Maximum file size is: ' . $max_size . ' KB.';
        }

        $img_q = sprintf("DELETE FROM product_image WHERE image_name='%s'", $product_image_name);
        mysqli_query($link, $img_q);
        $uploadpath = 'product_images/' . $product_image_name;
        chmod($uploadpath, 0644);
        unlink($uploadpath);

        $product_image_name = explode('.', $product_image_name);
        $product_image_name = $product_image_name[0] . '.' . $type;
        $uploadpath = 'product_images/' . $product_image_name;
        
        // If no errors, upload the image, else, output the errors
        if ($err == '') {
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadpath)) {
                $query = sprintf("INSERT INTO product_image SET image_name='%s',product_id=%d", $product_image_name, $product_id);
                $result = mysqli_query($link, $query);
                $_SESSION['error'] = array(
                    'message' => 'Image Sucessfully Edited!',
                    'type' => 'success'
                );
                header('location:view_product.php?id=' . $product_id);
                die();
            } else {
                $_SESSION['error'] = array(
                'message' => "Image Upload Failed",
                'type' => 'danger'
            );
            header('location:view_product.php?id=' . $product_id);
            die();
            }
        } else {
            $_SESSION['error'] = array(
                'message' => $err,
                'type' => 'danger'
            );
            header('location:view_product.php?id=' . $product_id);
            die();
        }
    }
}