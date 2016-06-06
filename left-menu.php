<div class="rsidebar span_1_of_left">
    <section  class="sky-form">
        <div class="product_right">
            <h4 class="m_2">Categories</h4>
            <?php
            include 'db.php';
            $sqlQuery = sprintf("SELECT * FROM category");
            $sqlResult = mysqli_query($link, $sqlQuery);
            if (mysqli_num_rows($sqlResult) > 0) {
                while ($rowCategory = mysqli_fetch_assoc($sqlResult)) {
                    ?>
                    <div class="tab1">
                        <ul class="place">								
                            <li class="sort"><a href="product.php?category=<?php echo $rowCategory['id']; ?>"><?php echo $rowCategory['category']; ?></a></li>
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