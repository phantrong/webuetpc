<?php session_start(); 
    // var_dump($_SESSION['login']); exit;
    // var_dump(($_POST));
    // $name_cus = $phone_cus =$address_cus = $user_cus = $pass_cus = '';
    if(!empty($_SESSION['login']['user'])) {
        $id_cus = $_SESSION['login']['user']['id_cus'];
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
    <title>Thông Tin Tài Khoản</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
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
<?php
    require_once ('config.php');
    require_once ('dbhelp.php');
    // var_dump($_SESSION['form']); exit;
    $error = false;
    $sucess = false;
    // var_dump($_GET['action']); exit;
    if(isset($_GET['action'])) {
        // var_dump($_POST);
        if($_GET['action'] == 'submit') {
            if (isset($_POST['save-click'])) {
                if(empty($_POST['name']) && isset($_POST['name'])) {
                    $error = "Bạn chưa nhập Họ Và Tên!";
                }
                elseif(empty($_POST['phone']) && isset($_POST['phone'])) {
                    $error = "Bạn chưa nhập Số Điện Thoại!";
                }
                elseif((empty($_POST['address']) || strlen($_POST['address'])<10) && isset($_POST['address'])) {
                    $error = "Bạn chưa nhập Địa Chỉ hoặc Địa Chỉ của bạn chưa cụ thể!";
                }
                if($error == false) {
                    $sucess = true;
                }
                // var_dump($error); exit;
            }
        }
    }
    // var_dump($_SESSION['cart']); exit;
?>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php?action=1">Shop page</a></li>
                        <li><a href="single-product.php">Single product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li class="active"><a href="account.php">Account</a></li>
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
<?php if (!empty($_SESSION['login']['admin'])) { ?>
        <div id="notify-msg" style="font-size: 44px; text-align: center; margin-bottom: 300px" class="msg">
            Bạn Đang Đăng Nhập Với Tư Cách Quản Trị Viên!</br><a href="admin.php">Trang Quản Lý</a>
        </div>
        
<?php
} elseif(empty($_SESSION['login']['user'])) { ?> 
        <div id="notify-msg" style="font-size: 44px; text-align: center; margin-bottom: 300px" class="msg">
            Bạn Chưa Đăng Nhập. Vui Lòng Đăng Nhập!</br><a href="login.php">Đăng Nhập</a>
        </div>
<?php } else { ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Thông Tin Tài Khoản</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"> 
                    <div class="single-sidebar">
                    <h2 class="sidebar-title">Sản Phẩm Siêu Hot</h2>
                        <div class="thubmnail-recent">
                            <img src="img/Dell-Gaming-G5_9.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?id_pro=9">Dell Gaming G5</a></h2>
                            <div class="product-sidebar-price" style="margin-left: 80px;">
                                <ins>23,790,000 VNĐ</ins>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/corei9_home_210.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?id_pro=210">CPU Intel Core i9-10900K</a></h2>
                            <div class="product-sidebar-price">
                                <ins>11,900,000 VNĐ</ins>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/tainghe_125.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?id_pro=125">Tai nghe Gaming Rapoo VH200 - Gaming Headset</a></h2>
                            <div class="product-sidebar-price">
                                <ins>799,000 VNĐ</ins>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/banphim_134.png" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?id_pro=134">Bàn phím Logitech G213 Prodigy RGB</a></h2>
                            <div class="product-sidebar-price">
                                <ins>799,000 VNĐ</ins>
                            </div>                             
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                        <form action="account.php?action=submit" class="checkout" method="post" name="checkout">
                            <div id="customer_details" class="col2-set">
                                <div class="col-1">
                                    <div class="woocommerce-billing-fields">
                                        <h3>Thông Tin Chi Tiết</h3>

                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">Họ và Tên
                                                <button class="btn-repair" type="repair" name="repair-name" title="repair"  >
                                                    <img src="img/repair.png" style="max-height: 12px"/>Sửa
                                                </button>
                                            </label>
<?php
if (isset($_POST['repair-name'])) { ?>
                                            <input type="text" value="<?=$name_cus?>" id="name_cus" name="name" class="input-text"> 
<?php } else { ?>
                                            <input type="text" value="<?=$name_cus?>" id="name_cus" name="name" class="input-text" disabled='true'>
<?php }
?>
                                            
                                        </p>
                                        <div class="clear"></div>

                                        <p id="billing_company_field" class="form-row form-row-wide">
                                            <label class="" for="billing_company">Số Điện Thoại
                                                <button class="btn-repair" type="repair" name="repair-phone" title="repair" style="font-size: 12px; border-width: 0px; background-color: white; text-decoration: underline;" >
                                                    <img src="img/repair.png" style="max-height: 12px"/>Sửa
                                                </button>
                                            </label>
<?php
if (isset($_POST['repair-phone'])) { ?>
                                            <input type="text" value="<?=$phone_cus?>" id="phone" name="phone" class="input-text ">
<?php } else { ?>
                                            <input type="text" value="<?=$phone_cus?>" id="phone" name="phone" class="input-text " disabled='true'>
<?php }
?>
                                        </p>

                                        <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                            <label class="" for="billing_address_1" title="Yêu Cầu Địa Chỉ phải cụ thể!">Địa Chỉ Giao hàng
                                                <button class="btn-repair" type="repair" name="repair-address" title="Yêu Cầu Địa Chỉ phải cụ thể!" style="font-size: 12px; border-width: 0px; background-color: white; text-decoration: underline;" >
                                                    <img src="img/repair.png" style="max-height: 12px"/>Sửa
                                                </button>
                                            </label>
<?php
if (isset($_POST['repair-address'])) { ?>
                                            <input type="text" value="<?=$address_cus?>"  id="address" name="address" class="input-text ">
<?php } else { ?>
                                            <input type="text" value="<?=$address_cus?>"  id="address" name="address" class="input-text " disabled='true'>
<?php }
?>
                                        </p>
                                            
                                        <div class="clear"></div>

                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                            <label class="" for="billing_email" title="Yêu cầu độ dài ít nhất 6 kí tự và nhiều nhất 16 kí tự!" >Tên Đăng Nhập
                                            </label>
                                            <input type="text" value="<?=$user_cus?>" id="user" name="user" class="input-text" disabled = 'true'>
                                        </p>
                                        <div class="clear"></div>

                                        <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                            <label class="" for="billing_email" title="Yêu cầu độ dài ít nhất 6 kí tự và nhiều nhất 24 kí tự!">Mật Khẩu
                                                <a href="pass.php?action=repass">
                                                    <img src="img/repair.png" style="max-height: 12px"/>
                                                    <input value="Đổi mật khẩu" class="btn-repair" type="repair" name="repair-pass" title="Yêu cầu độ dài ít nhất 6 kí tự!" style="font-size: 12px; border-width: 0px; background-color: white; text-decoration: underline;" >
                                                </a>
                                            </label>
                                            <input type="text" value="doanxemm" id="pass" name="pass" class="input_password" disabled = 'true'>
                                        </p>
<?php
    if ($sucess) {
        require_once('dbhelp.php');
        // var_dump($_POST); exit;
        if (isset($_POST['name'])) {
            $sql = "UPDATE RQLtiWBNIL.customer SET name_cus = '".$_POST['name']."' WHERE id_cus = '$id_cus';";
            execute($sql);
        }elseif (isset($_POST['phone'])) {
            $sql = "UPDATE RQLtiWBNIL.customer SET phone_cus = '".$_POST['phone']."' WHERE id_cus = '$id_cus';";
            execute($sql);
        }elseif (isset($_POST['address'])) {
            $sql = "UPDATE RQLtiWBNIL.customer SET address_cus = '".$_POST['address']."' WHERE id_cus = '$id_cus';";
            execute($sql);
        }
        // var_dump($pass_cus); exit;
        $sql = "SELECT * FROM RQLtiWBNIL.customer WHERE id_cus = '$id_cus';";
        $rs = executeSingleResult($sql);
        // var_dump($rs); exit;
        $_SESSION['login']['user'] = $rs;
        echo("<script>location.href = 'account.php';</script>");
    } else {
?>      
                                        <h6 style="color: red;"><?=$error?></h6>
<?php    
    }
?>
                                        <div class="form-row place-order">
                                            <input style="margin-left: 250px" type="submit" name="save-click" value="Xác Nhận" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

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