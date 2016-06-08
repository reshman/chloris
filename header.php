<?php (!isset($_SESSION)) ? session_start() : null; ?>
<!--header-->	
<div class="top_bg">
    <div class="container">
        <div class="header_top-sec">
            <div class="top_left">

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="header-top">
    <div class="header-bottom">
        <div class="logo">
            <a href="index.php">
                <h1>Floral Designs</h1></a>
        </div>
        <!---->
        <?php
        $url = $_SERVER['SCRIPT_FILENAME'];
        $filename = basename($url);
        ?>
        <div class="top-nav">	
            <div class="container">
                <ul class="memenu skyblue"><li <?php if($filename == 'index.php'){ ?> class="active" <?php } ?> ><a href="index.php">Home</a></li>
                    <li <?php if($filename == 'product.php'){ ?> class="active" <?php } ?> ><a href="product.php">SHOP</a></li>
                    <li class="grid"><a href="#">CLASSES</a></li>
                    <li <?php if($filename == 'about.php' || $filename == 'contact.php'){ ?> class="active" <?php } ?>><a href="#">MORE</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <ul>
                                        <li <?php if($filename == 'about.php'){ ?> class="active" <?php } ?> ><a href="about.php">ABOUT&nbsp;US</a></li>
                                        <li <?php if($filename == 'contact.php'){ ?> class="active" <?php } ?> ><a href="contact.php">CONTACT</a></li>
<!--                                    <li><a href="product.php">PRICING/FAQS</a></li>
                                        <li><a href="product.php">PRESS</a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!---->
            <div class="clearfix"></div>
            <!---->			 
        </div>
    </div>     
    <div class="clearfix"> </div>
</div>
<!---->