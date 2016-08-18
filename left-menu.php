<?php
<<<<<<< Updated upstream
if(isset($_GET['category'])){
    $catId = $_GET['category'];
}else{
    $catId = 1;
=======
include 'db.php';
if(isset($_GET['category'])){
    $catId = $_GET['category'];
}else{
    $sqlDefaultCat = sprintf("SELECT * FROM category ORDER BY order_by LIMIT 1");
    $sqlDefaultCategoryResult = mysqli_query($link, $sqlDefaultCat);
    $rowDefaultCategory = mysqli_fetch_assoc($sqlDefaultCategoryResult);
    $catId = $rowDefaultCategory['id'];
>>>>>>> Stashed changes
}
?>
<div class="rsidebar span_1_of_left">
    <section  class="sky-form">
        <div class="product_right">
            <h4 class="m_2">Categories</h4>
            <?php
            
            $sqlQuery = sprintf("SELECT * FROM category ORDER BY order_by");
            $sqlResult = mysqli_query($link, $sqlQuery);
            if (mysqli_num_rows($sqlResult) > 0) {
                while ($rowCategory = mysqli_fetch_assoc($sqlResult)) {
                    ?>
                    <div class="tab1">
                        <ul class="place">								
                            <li<?php if($rowCategory['id']==$catId){ ?> class="category active" <?php } ?>><a href="product.php?category=<?php echo $rowCategory['id']; ?>"><?php echo $rowCategory['category']; ?></a></li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>	 
    </section>

</div>