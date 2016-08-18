<?php


$host     = "localhost";
$username = "demoximr_chloris";
$password = "chloris@shop";
$database = "demoximr_chloris";

$link = mysqli_connect($host, $username, $password, $database) or die(mysqli_connect_error($link));

$data = array();
$data['item_name']		= $_POST['item_name'];
$data['item_number'] 		= $_POST['item_number'];
$data['payment_status'] 	= $_POST['payment_status'];
$data['payment_amount'] 	= $_POST['mc_gross'];
$data['payment_currency']	= $_POST['mc_currency'];
$data['txn_id']			= $_POST['txn_id'];
$data['receiver_email'] 	= $_POST['receiver_email'];
$data['payer_email'] 		= $_POST['payer_email'];
$data['first_name']             = $_POST['first_name'];
$data['custom'] 		= $_POST['custom'];
$data['address_street']         = $_POST['address_street'];
$data['cart_items']             = $_POST['num_cart_items'];
$data['country']                = $_POST['address_country'];
$data['city']                   = $_POST['address_city'];
$data['shipping']               = $_POST['mc_shipping'];


$totqty = 0;
$i = 1;
file_put_contents('console.txt', $data);
for ($i =1; $i <= $data['cart_items']; $i++) {
    $totqty += (int)$_POST['quantity'.$i];
    $sqlPayments = sprintf("INSERT INTO payments SET customer_name = '%s', customer_email = '%s', customer_address = '%s', txnid = '%s',
			payment_amount = '%s', payment_status = '%s', itemid = '%s', qty = '%s', createdtime = '%s'",
        $data['first_name'], $data['payer_email'], $data['address_street'], $data['txn_id'], $_POST['mc_gross_'.$i],$data['payment_status'], $_POST['item_number'.$i], $_POST['quantity'.$i],
        date("Y-m-d H:i:s"));

    mysqli_query($link, $sqlPayments);
}

$sqlOrder = sprintf("INSERT INTO orders SET txnid = '%s', total = '%s', qty = '%s', customer_name = '%s', customer_email = '%s', customer_country = '%s', customer_address = '%s', address_city = '%s', payment_status = '%s', created_date = '%s'", $data['txn_id'], $data['payment_amount'], $totqty, $data['first_name'], $data['payer_email'], $data['country'], $data['address_street'], $data['city'], $data['payment_status'], date("Y-m-d H:i:s"));

mysqli_query($link, $sqlOrder);


        $email_template_register = file_get_contents("notification-mail.html");
        $email_template_register = str_replace("{{customer_name}}", $data['first_name'], $email_template_register);
        $email_template_register = str_replace("{{customer_email}}", $data['payer_email'], $email_template_register);
        $email_template_register = str_replace("{{customer_country}}", $data['country'], $email_template_register);
        $email_template_register = str_replace("{{customer_date}}", date("Y-m-d H:i:s"), $email_template_register);
        $email_template_register = str_replace("{{customer_amount}}", $data['payment_amount'], $email_template_register);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers.= "From:chloris@gmail.com" . "\r\n";
        $to = 'jayadevathira@gmail.com';
        $subject = "Chloris - New Order";
        mail($to, $subject, $email_template_register, $headers);


?>