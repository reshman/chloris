<?php
include 'logincheck.php';
ob_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chloris | Add Product</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php session_start();?>
<?php include_once 'header.php';?>
<!-- Left side column. contains the logo and sidebar -->
<?php include_once 'left-menu.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Products
        <small>Add Product</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Product</li>
    </ol>
</section>

<?php
    require_once 'functions.php';
    require_once 'db.php';


    if (isset($_POST['submit'])) {

        $_SESSION['error'] = array();
        $error             = "";


        $flowername  = sanatizeInput($_POST['flowername'], 'string');
        $description = trim($_POST['description']);
        $specification = trim($_POST['specification']);
        $qty      = sanatizeInput($_POST['qty'], 'int');
        $price    = sanatizeInput($_POST['price'], 'int');
        $sprice   = sanatizeInput($_POST['sprice'], 'int');
        $category = sanatizeInput($_POST['category'], 'int');

        if (empty($flowername)) {
            $error .= 'Flower name cant be empty!<br/>';
        }

        if (empty($qty)) {
            $error .= 'Quantity cant be empty!<br/>';
        }else if (!is_numeric($qty)) {
            $error .= 'Quantity is not numeric!<br/>';
        }

        if (empty($price)) {
            $error .= 'Price cant be empty!<br/>';
        }else if (!is_numeric($price)) {
            $error .= 'Price is not numeric!<br/>';
        }

        if (empty($sprice)) {
            $error .= 'Selling Price cant be empty!<br/>';
        } else if (!is_numeric($sprice)) {
            $error .= 'Selling Price is not numeric!<br/>';
        }


        if ($error) {
            $_SESSION['error'] = array(
                'message' => $error,
                'type'    => 'danger'
            );

            header('location:add-product.php');
            exit();
        }

        //add product data in to product table
        $sqlProduct = sprintf("INSERT INTO product SET
            name = '%s',
            description = '%s',
            qty = '%s',
            price ='%s',
            sprice = '%s',
            specification = '%s',
            category = '%s'", $flowername, $description, $qty, $price, $sprice, $specification, $category); 


        $resultProduct   = mysqli_query($link, $sqlProduct);

        if ($resultProduct) {
            $_SESSION['error'] = array(
                'message' => 'Product Sucessfully Added!',
                'type'    => 'success'
            );

            header('location:list-product.php');exit();

        } else {
            $error .= "Error Product add<br/>";
            $_SESSION['error'] = array(
                'message' => $error,
                'type'    => 'danger'
            );

            header('location:add-product.php');
        }

    }

?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Product</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php

                if(!empty($_SESSION['error'])) :
                    echo flashMessage($_SESSION['error']['message'], $_SESSION['error']['type']);
                    unset($_SESSION['error']);
                endif;
                ?>

                <form role="form" method="POST">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Flower Name</label>
                            <input type="text" name="flowername" id="flowername" class="form-control" id="exampleInputEmail1" placeholder="Flower Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" >Description</label>
                            <textarea class="textarea" name="description" placeholder="Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1" >Specification</label>
                            <textarea class="textarea" name="specification" placeholder="Specification" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <?php
                            $sqlCategories    = sprintf("SELECT id, category FROM category");
                            $resultCategory   = mysqli_query($link, $sqlCategories);
                        ?>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control select2">
                                <?php while ($rowCategories = mysqli_fetch_assoc($resultCategory)):?>
                                    <option value="<?php echo $rowCategories['id']?>"><?php echo $rowCategories['category']?></option>
                                <?php endwhile;?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="text" name="qty" id="qty" class="form-control" id="exampleInputEmail1" value="1" placeholder="Quantity">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" name="price" id="price" class="form-control" id="exampleInputEmail1" placeholder="Price">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Selling Price</label>
                            <input type="text" name="sprice" id="sprice" class="form-control" id="exampleInputEmail1" placeholder="Price">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
    </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once 'footer.php'?>

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>


<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->

<script>
    $(function(){
        $(".select2").select2();
        $(".textarea").wysihtml5();
    })
</script>
</body>
</html>
