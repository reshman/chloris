<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'rxarin_floral';
$db_pass		= 'floarl@123';
$db_database	= 'rxarin_floral'; 

/* End config */

$db = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>