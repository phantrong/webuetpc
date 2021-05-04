<?php
    session_start();
    // var_dump($_SESSION['login']['admin']); exit;
    // var_dump(($_POST));
    // $name_cus = $phone_cus =$address_cus = $user_cus = $pass_cus = '';
    if(!empty($_SESSION['login']['user'])) {
        $name_cus = $_SESSION['login']['user']['name_cus'];
        $phone_cus = $_SESSION['login']['user']['phone_cus'];
        $address_cus = $_SESSION['login']['user']['address_cus'];
        $user_cus = $_SESSION['login']['user']['user_cus'];
        $pass_cus = $_SESSION['login']['user']['pass_cus'];
    }
?>
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
    <title>Mua bán Máy tính, Linh Kiện và Các Phụ kiện khác</title>
    
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
  <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
<?php
    if(!empty($_SESSION['login']['user'])) { ?>
                            <li><a href="account.php"><i class="fa fa-user"></i><?=$user_cus?></a></li>
                            <li><a href="login.php?action=logout"><i class="fa fa-user"></i>Đăng Xuất</a></li>
<?php } elseif(!empty($_SESSION['login']['admin'])) { ?>
                            <li><a href="account.php"><i class="fa fa-user"></i>ADMIN</a></li>
                            <li><a href="login.php?action=logout"><i class="fa fa-user"></i>Đăng Xuất</a></li>
<?php } else { ?>
                            <li><a href="account.php"><i class="fa fa-user"></i>Tài Khoản</a></li>
                            <li><a href="login.php"><i class="fa fa-user"></i>Đăng Nhập</a></li>
<?php }
?>
                            <li><a href="checkout.php"><img src="img/money.png" style="max-height: 15px"></i> Thanh Toán</a></li>
                            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i></i>Giỏ Hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <div class="site-branding-area">
        <div class="container" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col-sm-6" style="width: 100%;">
                    <div class="logo" style="width: 100%;">
                        <h1 style="text-align: center;"><a href="./"><img src="img/vertu4.png" style="max-width: 250px;"></a></h1>
                    </div>
                </div>
                
                <!-- <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Giỏ Hàng
                            <span class="cart-amunt"><?=number_format($_SESSION["cart"]['total'])?></span>
                            <i class="fa fa-shopping-cart"></i> 
                            <span class="product-count"><?=$_SESSION["cart"]['quantity']?></span>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php?action=1">Shop page</a></li>
                        <li><a href="single-product.php">Single product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="account.php">Account</a></li>
<?php
    if(isset($_SESSION['login']['admin'])) {
        echo '<li><a href="admin.php">Admin</a></li>';
    }
?>
                        <li><a >Others</a></li>
                        <li><a >Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/Dell-Gaming-G5_9.jpg" style="max-width: 700px" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								DELL <span class="primary">Gaming <strong>G5</strong></span>
							</h2>
							<h4 class="caption subtitle">Intel® Core™ i5-10300H</h4>
							<a class="caption button-radius" href="single-product.php?id_pro=9"><span class="icon"></span>Xem chi tiết</a>
						</div>
					</li>
					<li><img src="img/corei9_home_210.jpg" style="max-width: 300px; margin-left: 200px" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								CPU<span class="primary"> Intel <strong>Core i9</strong></span>
							</h2>
							<h4 class="caption subtitle">20M Cache</h4>
							<a class="caption button-radius" href="single-product.php?id_pro=210"><span class="icon"></span>Xem chi tiết</a>
						</div>
					</li>
					<li><img src="img/tainghe_125.jpg" style="max-width: 400px; margin-left: 50px" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Tai Nghe Gaming <span class="primary">Rapoo <strong>VH200</strong></span>
							</h2>
							<h4 class="caption subtitle">Điều khiển đa chức năng trên dây</h4>
							<a class="caption button-radius" href="single-product.php?id_pro=125"><span class="icon"></span>Xem chi tiết</a>
						</div>
					</li>
					<li><img src="img/banphim_134.png" style="max-width: 400px; margin-left: 50px" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Bàn Phím <span class="primary">Logitech <strong>G213</strong></span>
							</h2>
							<h4 class="caption subtitle">Công nghệ mới nhất của Logitech</h4>
							<a class="caption button-radius" href="single-product.php?id_pro=134"><span class="icon"></span>Xem chi tiết</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Sản Phẩm Mới Nhất</h2>
                        <div class="product-carousel">
<?php
require_once('dbhelp.php');
// $sql1 = "SELECT max(id_pc) FROM kDAbiPc3dp.computer;";
$sql1 = "SELECT max(id_pc) FROM web_maytinh.computer;";
$row = executeSingleResult($sql1);
$id_pc = (int)$row["max(id_pc)"];
for($i=$id_pc; $i>=$id_pc-3; $i--) {
    // $sql = "SELECT name_pc, img_pc, price_pc FROM kDAbiPc3dp.computer WHERE id_pc = $i;";
    $sql = "SELECT name_pc, img_pc, price_pc FROM web_maytinh.computer WHERE id_pc = $i;";
    $pc = executeSingleResult($sql);
    // var_dump($pc);
?>
                            <div class="single-product">
                                <div class="product-f-image"  style="margin-bottom: 5px; position: static;">
                                    <img src="<?=$pc['img_pc']?>" alt="">
                                    <div class="product-hover" style="border: 0px">
                                        <a href="single-product.php?id_pro=<?=$i?>" class="view-details-link"><i class="fa fa-link"></i> Xem Chi Tiết</a>
                                    </div>
                                </div>
                                <div class="bd">
                                    <h2><a href="single-product.php"><?=$pc['name_pc']?></a></h2>
                                    
                                    <div class="product-carousel-price">
                                        <ins><?=number_format($pc['price_pc'])?> VNĐ</ins>
                                    </div>
                                </div> 
                            </div>
<?php   
}
// $sql1 = "SELECT max(id_com) FROM kDAbiPc3dp.components;";
$sql1 = "SELECT max(id_com) FROM web_maytinh.components;";
$row = executeSingleResult($sql1);
$id_pc = (int)$row["max(id_com)"];
for($i=$id_pc; $i>=$id_pc-3; $i--) {
    // $sql = "SELECT name_com, img_com, price_com FROM kDAbiPc3dp.components WHERE id_com = $i;";
    $sql = "SELECT name_com, img_com, price_com FROM web_maytinh.components WHERE id_com = $i;";
    $pc = executeSingleResult($sql);
    // var_dump($pc);
?>
                            <div class="single-product">
                                <div class="product-f-image"  style="margin-bottom: 5px; position: static;">
                                    <img src="<?=$pc['img_com']?>" alt="">
                                    <div class="product-hover" style="border: 0px">
                                        <a href="single-product.php?id_pro=<?=$i?>" class="view-details-link"><i class="fa fa-link"></i> Xem Chi Tiết</a>
                                    </div>
                                </div>
                                <div class="bd">
                                    <h2><a href="single-product.php"><?=$pc['name_com']?></a></h2>
                                    
                                    <div class="product-carousel-price">
                                        <ins><?=number_format($pc['price_com'])?> VNĐ</ins>
                                    </div>
                                </div>
                            </div>
<?php   
}
require_once('dbhelp.php');
// $sql1 = "SELECT max(id_acc) FROM kDAbiPc3dp.accessories;";
$sql1 = "SELECT max(id_acc) FROM web_maytinh.accessories;";
$row = executeSingleResult($sql1);
$id_pc = (int)$row["max(id_acc)"];
for($i=$id_pc; $i>=$id_pc-3; $i--) {
    // $sql = "SELECT name_acc, img_acc, price_acc FROM kDAbiPc3dp.accessories WHERE id_acc = $i;";
    $sql = "SELECT name_acc, img_acc, price_acc FROM web_maytinh.accessories WHERE id_acc = $i;";
    $pc = executeSingleResult($sql);
    // var_dump($pc);
?>
                            <div class="single-product">
                                <div class="product-f-image"  style="margin-bottom: 5px; position: static;">
                                    <img src="<?=$pc['img_acc']?>" alt="">
                                    <div class="product-hover" style="border: 0px">
                                        <a href="single-product.php?id_pro=<?=$i?>" class="view-details-link"><i class="fa fa-link"></i> Xem Chi Tiết</a>
                                    </div>
                                </div>
                                <div class="bd">
                                    <h2><a href="single-product.php"><?=$pc['name_acc']?></a></h2>
                                    <div class="product-carousel-price">
                                        <ins><?=number_format($pc['price_acc'])?> VNĐ</ins>
                                    </div>
                                </div>
                                
                            </div>
<?php   
}                                                          
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/dell.png" style="max-height: 150px;" alt="">
                            <img src="img/Intel.png" style="max-height: 150px;" alt="">
                            <img src="img/ThinkPad.png" style="max-height: 150px;" alt="">
                            <img src="img/asus.png" style="max-height: 150px;" alt="">
                            <img src="img/Acer.png" style="max-height: 150px;" alt="">
                            <img src="img/hp.jpeg" style="max-height: 150px;" alt="">
                            <img src="img/logitech.png" style="max-height: 150px;" alt="">                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Máy Tính</h2>
                        <a href="shop.php?action=1" class="wid-view-more">Xem tất cả</a>
<?php
require_once('dbhelp.php');
// $sql1 = "SELECT max(id_pc) FROM kDAbiPc3dp.computer;";
$sql1 = "SELECT max(id_pc) FROM web_maytinh.computer;";
$row = executeSingleResult($sql1);
$id_pc = (int)$row["max(id_pc)"];
for($i=$id_pc; $i>=$id_pc-30; $i-=15) {
    // $sql = "SELECT name_pc, img_pc, price_pc FROM kDAbiPc3dp.computer WHERE id_pc = $i;";
    $sql = "SELECT name_pc, img_pc, price_pc FROM web_maytinh.computer WHERE id_pc = $i;";
    $pc = executeSingleResult($sql);
    // var_dump($pc);
?>
                        <div class="single-wid-product">
                            <a href="single-product.php?id_pro=<?=$i?>"><img src="<?=$pc['img_pc']?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id_pro=<?=$i?>"><?=$pc['name_pc']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?=number_format($pc['price_pc'])?> VNĐ</ins>
                            </div>                            
                        </div>
<?php
}
?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Linh Kiện</h2>
                        <a href="shop.php?action=10" class="wid-view-more">Xem tất cả</a>
<?php
require_once('dbhelp.php');
// $sql1 = "SELECT max(id_com) FROM kDAbiPc3dp.components;";
$sql1 = "SELECT max(id_com) FROM web_maytinh.components;";
$row = executeSingleResult($sql1);
$id_pc = (int)$row["max(id_com)"];
for($i=$id_pc; $i>=$id_pc-30; $i-=15) {
    // $sql = "SELECT name_com, img_com, price_com FROM kDAbiPc3dp.components WHERE id_com = $i;";
    $sql = "SELECT name_com, img_com, price_com FROM web_maytinh.components WHERE id_com = $i;";
    $pc = executeSingleResult($sql);
    // var_dump($pc);
?>
                        <div class="single-wid-product">
                            <a href="single-product.php?id_pro=<?=$i?>"><img src="<?=$pc['img_com']?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id_pro=<?=$i?>"><?=$pc['name_com']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?=number_format($pc['price_com'])?> VNĐ</ins>
                            </div>                            
                        </div>
<?php
}
?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Phụ Kiện Khác</h2>
                        <a href="shop.php?action=20" class="wid-view-more">Xem tất cả</a>
<?php   
require_once('dbhelp.php');
// $sql1 = "SELECT max(id_acc) FROM kDAbiPc3dp.accessories;";
$sql1 = "SELECT max(id_acc) FROM web_maytinh.accessories;";
$row = executeSingleResult($sql1);
$id_pc = (int)$row["max(id_acc)"];
for($i=$id_pc; $i>=$id_pc-30; $i-=15) {
    // $sql = "SELECT name_acc, img_acc, price_acc FROM kDAbiPc3dp.accessories WHERE id_acc = $i;";
    $sql = "SELECT name_acc, img_acc, price_acc FROM web_maytinh.accessories WHERE id_acc = $i;";
    $pc = executeSingleResult($sql);
    // var_dump($pc);
?>
                        <div class="single-wid-product">
                            <a href="single-product.php?id_pro=<?=$i?>"><img src="<?=$pc['img_acc']?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?id_pro=<?=$i?>"><?=$pc['name_acc']?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?=number_format($pc['price_acc'])?> VNĐ</ins>
                            </div>                            
                        </div>
<?php
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    
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
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
  </body>
</html>