<?php
include_once('connect.php');
if(isset($_POST['name']))
{
$name=trim($_POST['name']);
$query = $db->prepare("SELECT  `name` FROM `product_reg` WHERE `name` LIKE ?");
$query->execute(array("%$name%"));
echo "<ul>";
while ($results = $query->fetch()) 
   	{
?>

<li onclick='fill("<?php echo $results['name']; ?>")'><?php echo  $results['name']; ?> </li>
<?php
}
}
?>
</ul>