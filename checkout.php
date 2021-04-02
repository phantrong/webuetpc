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
    <title>Checkout Page - Ustora Demo</title>
    
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
        // var_dump($_GET['action']); exit;
        if($_GET['action'] == 'save') {
            $total_ord = $quantity_ord = 0;
            if(!empty($_GET)) {
                // var_dump($_GET); exit;
                if(isset($_GET['total_ord'])) {
                    $_SESSION["form"][0] = $_GET['total_ord'];
                }
                if(isset($_GET['quantity_ord'])) {
                    $_SESSION["form"][1] = $_GET['quantity_ord'];
                }
            }
        } elseif($_GET['action'] == 'submit') {
            if (isset($_POST['save-click'])) {
                $quantity_ord = (int)$_SESSION["form"][1];
                $total_ord = (int)$_SESSION["form"][0];
                // var_dump($quantity_ord); exit;
                if(empty($_POST['name_cus'])) {
                    $error = "Bạn chưa nhập Tên!";
                }
                elseif(empty($_POST['phone_cus'])) {
                    $error = "Bạn chưa nhập Số Điện Thoại!";
                }
                elseif(empty($_POST['address_cus'])) {
                    $error = "Bạn chưa nhập Địa Chỉ Giao Hàng!";
                }elseif($quantity_ord == 0) {
                    $error = "Bạn chưa mua Sản Phẩm nào cả!";
                }
                if ($error == false && !empty($quantity_ord)) {
                    // var_dump($quantity_ord); exit;
                    // var_dump($quantity_ord); exit;
                    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                    $sql1 = "INSERT INTO kDAbiPc3dp.customer (name_cus, phone_cus, address_cus) VALUE ('".$_POST['name_cus']."', '".$_POST['phone_cus']."', '".$_POST['address_cus']."')";
                     mysqli_query($conn, $sql1);
                    $id_cus = $conn->insert_id;
                    mysqli_close($conn);
                    // var_dump($id_cus); exit;
                    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                    $sql2 = "INSERT INTO kDAbiPc3dp.order (date_ord, status_ord, comments, id_cus) VALUE (now(), 'Shipping', ' ',  '$id_cus')";
                    mysqli_query($conn, $sql2);
                    $id_ord = $conn->insert_id;
                    mysqli_close($conn);
                    // var_dump($id_ord); exit;
                    $id_product = time();
                    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                    $sql3 = "INSERT INTO kDAbiPc3dp.orderdetail (id_ord, id_product, quantity_ord, total_ord) VALUE ('$id_ord', '$id_product', '$quantity_ord', '$total_ord')";
                    mysqli_query($conn, $sql3);
                    mysqli_close($conn);
                    $success = "Đặt hàng thành công";
                    unset($_SESSION['cart']);
                }
            }
        }
    }
    // var_dump($_SESSION['cart']); exit;
?>
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
                        <li><a >Category</a></li>
                        <li><a >Others</a></li>
                        <li><a >Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->  
<?php if (!empty($error)) { ?> 
        <div id="notify-msg" style="font-size: 44px; text-align: center; margin-bottom: 300px" class="msg">
            <?= $error ?></br> <a href="javascript:history.back()">Quay lại</a>
        </div>
<?php } elseif (!empty($success)) { ?>
        <div id="notify-msg" style="font-size: 44px; text-align: center; margin-bottom: 300px" class="msg">
            <?= $success ?>!!</br> <a href="index.php">Tiếp tục mua hàng</a>
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

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Thông Tin Chi Tiết</h3>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Họ và Tên <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="name_cus" name="name_cus" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Số Điện Thoại</label>
                                                <input type="text" value="" placeholder="" id="phone_cus" name="phone_cus" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa Chỉ Giao Hàng <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Nhập địa chỉ..." id="address_cus" name="address_cus" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email <abbr title="required" class="required">(Nếu có)</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Nhập email..." id="billing_email" name="billing_email" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
<?php
$tt = 0;
foreach($_SESSION["cart"] as $index => $quan) {
    if($index < 100) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE id_pc = $index";
        $row = executeSingleResult($sql);
        $tt += $quan*$row['price_pc'];
?>
                                                <td class="product-name">
                                                    <?=$row['name_pc']?><strong class="product-quantity"> ×<?=$quan?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?=number_format($quan*$row['price_pc'])?> VNĐ</span> </td>
                                         </tr>
<?php
    } elseif ($index > 100 && $index <= 200) {
        $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE id_acc = $index";
        $row = executeSingleResult($sql);
        $tt += $quan*$row['price_acc'];
?>
                                                <td class="product-name">
                                                    <?=$row['name_acc']?><strong class="product-quantity"> ×<?=$quan?></strong> </td>
                                                <td class="product-total">
                                                    <span class="amount"><?=number_format($quan*$row['price_acc'])?> vNĐ</span> </td>
                                            </tr>
<?php
    } elseif ($index > 100 && $index <= 200) {
        $sql = "SELECT * FROM kDAbiPc3dp.components WHERE id_com = $index";
        $row = executeSingleResult($sql);
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
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount"><?=number_format($tt)?> VNĐ</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Shipping and Handling</th>
                                                <td>

                                                    Free Shipping
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>Order Total</th>
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