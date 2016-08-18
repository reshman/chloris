<?php
session_start();

$productId = isset($_GET['id']) ? $_GET['id'] : 0;
if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = array();
}

$listItemsDiv = "";
if (!array_key_exists($productId,$_SESSION['cart_items'])) {
    $_SESSION['cart_items'][$productId] = array('id' => $productId, 'qty' => 1);
    //$listItemsDiv = listItems();
    $flashMsg = flashMessage('Product Added to cart', 'success');
} else {
    //listItems();
    $flashMsg = flashMessage('Product Already Exists', 'warning');
}

echo $flashMsg;die;
/*echo json_encode(array('msg' => $flashMsg, 'items' => $listItemsDiv));die;

function listItems() {
    $htmlListItems = file_get_contents('list-cart-items.php');
    return $htmlListItems;
}*/

function flashMessage($message, $messageType='success') {
    $htmls = file_get_contents('alert-error-html-template.php');
    $htmls = str_replace('{{message}}', $message, $htmls);
    $htmls = str_replace('{{type}}', $messageType, $htmls);
    return $htmls;
}
