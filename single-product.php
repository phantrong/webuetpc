<?php session_start(); ?>

<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang trình bày sản phẩm</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/vertu.jpg"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Giỏ Hàng
                            <!-- <span class="cart-amunt"><?=number_format($_SESSION["cart"]['total'])?></span>  -->
                            <i class="fa fa-shopping-cart"></i> 
                            <!-- <span class="product-count"><?=$_SESSION["cart"]['quantity']?></span> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php?action=1">Shop page</a></li>
                        <li class="active"><a href="single-product.php">Single product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a >Category</a></li>
                        <li><a >Others</a></li>
                        <li><a >Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Cửa Hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            
<?php
require_once('dbhelp.php');
// var_dump(isset($_GET)); exit;
if(!empty($_GET)) {
    if(isset($_GET['id_pro'])) {
?>
        <div class="row">
                <div class="col-md-4">
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản Phẩm Liên Quan</h2>
<?php
        $id_pro= (int) $_GET['id_pro'];
        $sql2 = "";
        if($id_pro<101) {
            $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE id_pc = $id_pro;";
            $pc = executeSingleResult($sql);
            $firm_pc = $pc['firm_pc'];
            $sql2 = "SELECT * FROM kDAbiPc3dp.computer WHERE firm_pc = '$firm_pc' LIMIT 5;";
            $list = executeResult($sql2);
            foreach($list as $item) {
?>
                        <div class="thubmnail-recent">
                        <img src="<?=$item['img_pc']?>" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?id_pro=<?=$item['id_pc']?>"><?=$item['name_pc']?></a></h2>
                        <div class="product-sidebar-price">
                            <ins><?=number_format($pc['price_pc'])?> VNĐ</ins>
                    </div>                             
                </div>
<?php
}
?>
            </div>
                </div>
                    <div class="col-md-8">
                        <div class="product-content-right">
                            <div class="product-breadcroumb">
                                <a href="index.php">Home</a>
                                <a><?=$pc['name_pc']?></a>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="<?=$pc['img_pc']?>" alt="">
                                        </div>
                                    </div>
                            </div>
                                            
                                <div class="col-sm-6">
                                    <div class="product-inner">
                                        <h2 class="product-name"><?=$pc['name_pc']?></h2>
                                        <div class="product-inner-price">
                                            <ins><?=number_format($pc['price_pc'])?> VNĐ</ins>
                                        </div>    
                                        <form class="cart" id="add-to-cart-form" action="cart.php?action=add" method="POST">
                                            <div class="quantity">
                                                <input type="number" size="1" class="input-text qty text" title="Qty" value="1" name="quantity[<?=$pc['id_pc']?>]" min="1" step="1">
                                            </div>
                                            <a href="cart.php?action=add"><button class="add_to_cart_button">Thêm vào giỏ hàng</button></a>
                                        </form>     
                                        <div role="tabpanel">
                                            <ul class="product-tab" role="tablist">
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2>Mô Tả Sản Phẩm</h2>  
                                                        <p><?=$pc['detail_pc']?></p>
                                                </div>
                                            </div>
                                    </div>
                                                    
                                </div>
                            </div>
                        </div>
<?php
        }
        elseif ($id_pro>100 && $id_pro < 200) {
            $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE id_acc = $id_pro;";
            $pc = executeSingleResult($sql);
            $firm_pc = $pc['kind_acc'];
            $sql2 = "SELECT * FROM kDAbiPc3dp.accessories WHERE kind_acc = '$firm_pc' LIMIT 5;";
            $list = executeResult($sql2);
            // var_dump($lis); exit;
            foreach($list as $item) {
                ?>
                                        <div class="thubmnail-recent">
                                        <img src="<?=$item['img_acc']?>" class="recent-thumb" alt="">
                                            <h2><a href="single-product.php?id_pro=<?=$item['id_acc']?>"><?=$item['name_acc']?></a></h2>
                                        <div class="product-sidebar-price">
                                            <ins><?=number_format($pc['price_acc'])?> VNĐ</ins>
                                    </div>                             
                                </div>
                <?php
                }
                ?>
                            </div>
                                </div>          
                                    <div class="col-md-8">
                                        <div class="product-content-right">
                                            <div class="product-breadcroumb">
                                                <a href="index.php">Home</a>
                                                <a><?=$pc['name_acc']?></a>
                                            </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="product-images">
                                                            <div class="product-main-img">
                                                                <img src="<?=$pc['img_acc']?>" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                            
                                                <div class="col-sm-6">
                                                    <div class="product-inner">
                                                        <h2 class="product-name"><?=$pc['name_acc']?></h2>
                                                        <div class="product-inner-price">
                                                            <ins><?=number_format($pc['price_acc'])?> VNĐ</ins>
                                                        </div>    
                                                                    
                                                        <form class="cart" id="add-to-cart-form" action="cart.php?action=add" method="POST">
                                                            <div class="quantity">
                                                                <input type="number" size="1" class="input-text qty text" title="Qty" value="1" name="quantity[<?=$pc['id_acc']?>]" min="1" step="1">
                                                            </div>
                                                            <a href="cart.php?action=add"><button class="add_to_cart_button">Thêm vào giỏ hàng</button></a>
                                                        </form>    
                                                                    
                                                        <div role="tabpanel">
                                                            <ul class="product-tab" role="tablist">
                                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                                    <h2>Mô Tả Sản Phẩm</h2>  
                                                                        <p><?=$pc['detail_acc']?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                    
                                                    </div>
                                                </div>
                                            </div>
<?php
        }
        else{
            $sql = "SELECT * FROM kDAbiPc3dp.components WHERE id_com = $id_pro;";
            $pc = executeSingleResult($sql);
            $firm_pc = $pc['kind_com'];
            $sql2 = "SELECT * FROM kDAbiPc3dp.components WHERE kind_com = '$firm_pc' LIMIT 5;";
            $list = executeResult($sql2);
            // var_dump($lis); exit;
            foreach($list as $item) {
                ?>
                                        <div class="thubmnail-recent">
                                        <img src="<?=$item['img_com']?>" class="recent-thumb" alt="">
                                            <h2><a href="single-product.php?id_pro=<?=$item['id_com']?>"><?=$item['name_com']?></a></h2>
                                        <div class="product-sidebar-price">
                                            <ins><?=number_format($pc['price_com'])?> VNĐ</ins>
                                    </div>                             
                                </div>
<?php
}
?>
                            </div>
                                </div>              
                                    <div class="col-md-8">
                                        <div class="product-content-right">
                                            <div class="product-breadcroumb">
                                                <a href="index.php">Home</a>
                                                <a><?=$pc['name_com']?></a>
                                            </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="product-images">
                                                    <div class="product-main-img">
                                                        <img src="<?=$pc['img_com']?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                                            
                                                <div class="col-sm-6">
                                                    <div class="product-inner">
                                                        <h2 class="product-name"><?=$pc['name_com']?></h2>
                                                        <div class="product-inner-price">
                                                            <ins><?=number_format($pc['price_com'])?> VNĐ</ins>
                                                </div>                 
                                                <form class="cart" id="add-to-cart-form" action="cart.php?action=add" method="POST">
                                                    <div class="quantity">
                                                        <input type="number" size="1" class="input-text qty text" title="Qty" value="1" name="quantity[<?=$pc['id_com']?>]" min="1" step="1">
                                                    </div>
                                                    <a href="cart.php?action=add"><button class="add_to_cart_button">Thêm vào giỏ hàng</button></a>
                                                </form>   
                                                                    
                                                <div role="tabpanel">
                                                    <ul class="product-tab" role="tablist">
                                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                        <h2>Mô Tả Sản Phẩm</h2>  
                                                        <p><?=$pc['detail_com']?></p>
                                                    </div>
                                                </div>
                                            </div>
                                                                    
                                        </div>
                                    </div>
                                </div>
<?php
}
}
}else {
?>
    <ul class="product-tab" role="tablist">
        <li role="presentation" class="active">
            <a href="shop.php?action=1">Bạn Chưa Chọn Sản Phẩm Nào Cả. Nhấp vào để truy cập đến <strong>Shop Page</strong>
            </a>
        </li>
    </ul>
<?php
}
?>  
                    </div>     
                </div>          
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>u<span>Stora</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-youtube"></i>
                            <i class="fa fa-linkedin"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li>My account</li>
                            <li>Order history</li>
                            <li>Wishlist</li>
                            <li>Vendor contact</li>
                            <li>Front page</li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li>Mobile Phone</li>
                            <li>Home accesseries</li>
                            <li>LED TV</li>
                            <li>Computer</li>
                            <li>Gadets</li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2021 uCommerce. All Rights Reserved. </p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>