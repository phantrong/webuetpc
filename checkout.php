<?php 
    session_start(); 
    // var_dump(isset($_SESSION['login']['admin'])); exit;
    // var_dump($_SESSION['cart']);
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
    <title>Trang Thanh Toán</title>
    
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
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

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
    if(!isset($_SESSION['form'])) {
        $_SESSION['form'] = array();
    }
    // var_dump($_SESSION['form']); exit;
    $error = false;
    $success = false;
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'submit') {
            // var_dump($_POST['save-click']);
            if (isset($_POST['save-click'])) {
                // var_dump($tt); exit;
                $quantity_ord = (int)$_SESSION["form"][-1];
                $total_ord = (int)$_SESSION["form"][-2];
                // var_dump($quantity_ord); exit;
                if(isset($_SESSION['login']['admin'])) {
                    $error = "Bạn Đang Đăng Nhập Với Tư Cách Quản Trị Viên! Nên Không Thể Mua Hàng!";
                }
                elseif (empty($_SESSION['login']['user']))  {
                    $error = "Bạn Chưa Đăng Nhập. Vui Lòng Đăng Nhập!";
                }elseif ($quantity_ord == 0) {
                    $error = "Bạn Chưa Mua Sản Phẩm Nào!";
                }
                if ($error == false && !empty($quantity_ord)) {
                    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                    $sql2 = "INSERT INTO web_maytinh.order (date_ord, status_ord, comments, id_cus) VALUE (now(), 'Shipping', ' ',  '$id_cus')";
                    mysqli_query($conn, $sql2);
                    $id_ord = $conn->insert_id;
                    mysqli_close($conn);
                    // var_dump($id_ord); exit;
                    foreach($_SESSION['cart'] as $index => $quantity) {
                        $total_pro = $_SESSION['form']['price'][$index] * $quantity;
                        if ($index <=100) {
                            $sql4 = "SELECT quantity_pc FROM computer WHERE id_pc = $index;";
                            $rs = executeSingleResult($sql4);
                            $quan_pro = $rs['quantity_pc'] - $quantity;
                            $sqlz = "UPDATE computer SET quantity_pc = $quan_pro WHERE id_pc = $index;";
                            execute($sqlz);
                        }elseif ($index >100 && $index < 200) {
                            $sql4 = "SELECT quantity_acc FROM accessories WHERE id_acc = $index;";
                            $rs = executeSingleResult($sql4);
                            $quan_pro = $rs['quantity_acc'] - $quantity;
                            $sqlz = "UPDATE accessories SET quantity_acc = $quan_pro WHERE id_acc = $index;";
                            execute($sqlz);
                        }else {
                            $sql4 = "SELECT quantity_com FROM components WHERE id_com = $index;";
                            $rs = executeSingleResult($sql4);
                            $quan_pro = $rs['quantity_com'] - $quantity;
                            $sqlz = "UPDATE components SET quantity_com = $quan_pro WHERE id_com = $index;";
                            execute($sqlz);
                        }
                        $sql3 = "INSERT INTO web_maytinh.orderdetail (id_ord, id_product, quantity_pro, total_pro) VALUE ('$id_ord', '$index', '$quantity', '$total_pro')";
                        execute($sql3);
                    }
                    $success = "Đặt hàng thành công!";
                    unset($_SESSION['cart']);
                }
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
                        <li class="active"><a href="checkout.php">Checkout</a></li>
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
<?php if (!empty($error)) {
        if($error == "Bạn Đang Đăng Nhập Với Tư Cách Quản Trị Viên! Nên Không Thể Mua Hàng!") { ?>
          <div style="text-align: center; height: 500px; margin-bottom: 100px">
            <img src="img/cancel.png" style="max-height: 150px">
            <h1><?=$error?></h1>
<?php
        }elseif ($error == "Bạn Chưa Đăng Nhập. Vui Lòng Đăng Nhập!") {  ?>
        <div style="text-align: center; height: 500px;">
            <img src="img/cancel.png" style="max-height: 150px">
            <h1><?=$error?></h1>
            <a href="login.php" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Đăng Nhập
                </button>
            <a>
<?php
    }   else {
?>
        <div style="text-align: center; height: 500px;">
            <img src="img/cancel.png" style="max-height: 150px">
            <h1><?=$error?></h1>
            <a href="shop.php?action=1" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Cửa Hàng
                </button>
            <a>
        </div>
<?php }} elseif (!empty($success)) { ?>
    <div style="text-align: center; height: 500px;">
            <img src="img/checked.png" style="max-height: 150px">
            <h1><?=$success?></h1>
            <a href="index.php" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Trang Chủ
                </button>
            <a>
        </div>
<?php 
} else { ?> 
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Thanh Toán</h2>
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
                            <form action="checkout.php?action=submit" class="checkout" method="post" name="checkout">
                                <h3 id="order_review_heading">Hóa Đơn Của Bạn</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Danh Sách Sản Phẩm</th>
                                                <th class="product-total">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
<?php
$tt = 0;
$quantity = 0;
$_SESSION['form']['price'] = array();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
foreach($_SESSION["cart"] as $index => $quan) {
    if($index < 100) {
        $sql = "SELECT id_pc, img_pc, name_pc, price_pc FROM web_maytinh.computer WHERE id_pc = $index";
        $row = executeSingleResult($sql);
        $quantity += $quan;
        $_SESSION['form']['price'][$index] = (int) $row['price_pc'];
        $tt += $quan*$row['price_pc'];
?>
                                                <td class="product-name">
                                                    <?=$row['name_pc']?><strong class="product-quantity"> ×<?=$quan?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?=number_format($quan*$row['price_pc'])?> VNĐ</span> </td>
                                         </tr>
<?php
    } elseif ($index > 100 && $index <= 200) {
        $sql = "SELECT id_acc, img_acc, name_acc, price_acc FROM web_maytinh.accessories WHERE id_acc = $index";
        $row = executeSingleResult($sql);
        $quantity += $quan;
        $_SESSION['form']['price'][$index] = (int) $row['price_acc'];
        $tt += $quan*$row['price_acc'];
?>
                                                <td class="product-name">
                                                    <?=$row['name_acc']?><strong class="product-quantity"> ×<?=$quan?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?=number_format($quan*$row['price_acc'])?> VNĐ</span> </td>
                                            </tr>
<?php
    } elseif ($index > 200) {
        $sql = "SELECT id_com, img_com, name_com, price_com FROM web_maytinh.components WHERE id_com = $index";
        $row = executeSingleResult($sql);
        $quantity += $quan;
        $_SESSION['form']['price'][$index] = (int) $row['price_com'];
        $tt += $quan*$row['price_com'];
?>
                                                <td class="product-name">
                                                    <?=$row['name_com']?><strong class="product-quantity">×<?=$quan?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?=number_format($quan*$row['price_com'])?> VNĐ</span> </td>
                                            </tr> 
<?php
    }
}
?>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Tổng Giỏ Hàng</th>
                                                <td><span class="amount"><?=number_format($tt)?> VNĐ</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Phí Ship</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Tổng Hóa Đơn</th>
                                                <td><strong><span class="amount"><?=number_format($tt)?> VNĐ</span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <!-- <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Direct Bank Transfer </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_cheque">Cheque Payment </label>
                                                <div style="display:none;" class="payment_box payment_method_cheque">
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_paypal">
                                                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                                <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What is PayPal?</a>
                                                </label>
                                                <div style="display:none;" class="payment_box payment_method_paypal">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </li>
                                        </ul> -->

                                        <div class="form-row place-order">
                                            <input style="margin-left: 600px" type="submit" name="save-click" value="Thanh Toán" id="place_order" name="woocommerce_checkout_place_order" class="button alt">
                                        </div>
                                        <div class="clear"></div>
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