<?php (!isset($_SESSION)) ? session_start() : null; ?>
<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Load jQuery validate plugin -->
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<style>
</style>
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
        <div style="text-align:center;" class="logo1">
	 <img src="images/logo.jpg"/>
	 <hr>
	 </div>
        <!---->
        <?php
        $url = $_SERVER['SCRIPT_FILENAME'];
        $filename = basename($url);
        ?>
        <!--        <div class="top-nav">	
            <div class="container">
                <ul class="memenu skyblue"><li <?php if ($filename == 'index.php') { ?> class="active" <?php } ?> ><a href="index.php">HOME</a></li>
                    <li <?php if ($filename == 'product.php') { ?> class="active" <?php } ?> ><a href="product.php">SHOP</a></li>
                    <li class="grid"><a href="#">CLASSES</a></li>
                    <li <?php if ($filename == 'about.php' || $filename == 'contact.php') { ?> class="active" <?php } ?>><a href="#">MORE</a>
                        <div class="mepanel">
                            <div class="row">
                                <div class="col1 me-one">
                                    <ul>
                                        <li <?php if ($filename == 'about.php') { ?> class="active" <?php } ?> ><a href="about.php">ABOUT&nbsp;US</a></li>
                                        <li <?php if ($filename == 'contact.php') { ?> class="active" <?php } ?> ><a href="contact.php">CONTACT</a></li>
                                    <li><a href="product.php">PRICING/FAQS</a></li>
                                        <li><a href="product.php">PRESS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            
            <div class="clearfix"></div>
                                 
        </div>-->


        <nav class="navbar">
            <div class="navbar-header">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="fa fa-bars" style="font-size: 35px;"></span>
                </div>
            </div>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav menu">
                        <li <?php if ($filename == 'index.php') { ?> class="active" <?php } ?>><a href="index.php">HOME</a></li>
                        <li <?php if ($filename == 'product.php') { ?> class="active" <?php } ?>><a href="product.php">SHOP</a></li>
                        <li ><a href="#">CLASSES</a></li>
                        <li class="dropdown <?php if ($filename == 'about.php' || $filename == 'contact.php') { ?> active <?php } ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li <?php if ($filename == 'about.php') { ?> class="active" <?php } ?>><a href="about.php">ABOUT US</a></li>
                                <li <?php if ($filename == 'contact.php') { ?> class="active" <?php } ?>><a href="contact.php">CONTACT</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>-->
                </div>
            </div>
        </nav>

    </div>     
    <div class="clearfix"> </div>
    <script>
        $('.navbar-toggle').click(function () {
            var stat = $('.navbar-toggle').attr('aria-expanded');
            if (stat) {
                $('.navbar-toggle fa').addClass('fa-rotate-90');
            } else {
                $('.navbar-toggle fa').removeClass('fa-rotate-90');
            }
        });
    </script>
</div>
<!---->