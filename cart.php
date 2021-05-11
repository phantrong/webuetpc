<?php 
    session_start();
    // var_dump($_SESSION['cart']); exit;
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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giỏ Hàng</title>
    
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
    <style>
        .thead-dark {
            color: #fff !important;
            background-color: #343a40 !important;
            border-color: #454d55 !important;
        }
        .table thead th {
            vertical-align: bottom !important;
            border-bottom: 2px solid #dee2e6 !important;
        }
        .table th, .table td {
            padding: 0.75rem !important;
            vertical-align: top !important;
            border-top: 1px solid #dee2e6 !important;
        }
        .table body{
            font-family: "Nunito", sans-serif !important;
            font-size: 0.9rem !important;
            font-weight: 400 !important;
            line-height: 1.6 !important;
            color: #212529 !important;
            text-align: center !important;
        }
        .price {
            color: #ee5057;
        }
        .remove {
            position: absolute;
            top: 75px;
        }
    </style>
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
                            <li><a href="login.php"><i class="fa fa-shopping-cart"></i></i>Giỏ Hàng</a></li>
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
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php?action=1">Shop page</a></li>
                        <li><a href="single-product.php">Single product</a></li>
                        <li class="active"><a href="cart.php">Cart</a></li>
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
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Giỏ Hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
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
                            <form id="cart-form" method="post" action = "cart.php?action=submit">
<?php
require_once ('dbhelp.php');
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
// var_dump($_GET['action']); exit;
$quantity_ord = 0;
$total = 0;
if (isset($_GET['action'])) {
    function updateData($add = false) {
        // var_dump(isset($_POST['quantity'])); exit;
        if(isset($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if($add) {
                    if(!isset($_SESSION["cart"][$id])) {
                        $_SESSION["cart"][$id] = (int) $quantity;
                    } else {
                        $_SESSION["cart"][$id] += (int) $quantity;
                    }
                } else {
                    if ($quantity == 0) {
                        unset($_SESSION["cart"][$id]);
                    } else {
                        $_SESSION["cart"][$id] = (int) $quantity;
                    }
                }
            }
        }
    }
    switch ($_GET['action']) {
        case "add" :
            updateData(true);
            echo("<script>location.href = 'cart.php';</script>");
            break;
        case "delete" :
            if(isset($_GET['id_pc'])) {
                unset($_SESSION["cart"][$_GET['id_pc']]);
            } else if (isset($_GET['id_acc'])) {
                unset($_SESSION["cart"][$_GET['id_acc']]);
            }
            else if (isset($_GET['id_com'])) {
                unset($_SESSION["cart"][$_GET['id_com']]);
            }
            echo("<script>location.href = 'cart.php';</script>");
            break;
        case "submit" :
            if($_POST['update-click']) {
                updateData();
            }
            echo("<script>location.href = 'cart.php';</script>");
            break;
    }
}
// $_SESSION['cart'] = array();
// var_dump($_SESSION['cart']); exit;
if ($_SESSION['cart'] == array()) { ?>
    <div style="text-align: center; height: 500px;">
            <img src="img/not.png" style="max-height: 150px; margin-bottom: 20px">
            <h1>Bạn chưa mua sản phẩm nào!</h1>
            <a href="shop.php?action=1" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Cửa Hàng
                </button>
            <a>
    </div>
<?php
}else { ?>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th >&nbsp;</th>
                                            <th >Sản Phẩm</th>
                                            <th >Tên</th>
                                            <th class="product-price">Giá</th>
                                            <th >SL</th>
                                            <th >Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
// $_SESSION['cart'] = array();
// var_dump($_SESSION['cart'] == array()); exit;
    foreach($_SESSION["cart"] as $index => $quan) {
        if($index < 100) {
            $sql = "SELECT id_pc, img_pc, name_pc, price_pc FROM web_maytinh.computer WHERE id_pc = $index";
            $row = executeSingleResult($sql);
?>
            <tr>
                <th style="position: relative;">
                    <a title="Remove this item" class="remove" href="cart.php?action=delete&id_pc=<?=$row['id_pc']?>">×</a> 
                </th>
                <th ><img src="<?=$row['img_pc']?>" style="max-width: 200px; max-height: 200px"></th>
                <th ><?=$row['name_pc']?></th>
                <th class='price'><?=number_format($row['price_pc'])?> VNĐ</th>
                <th ><input style="max-width: 50px" type="number" size="1" class="input-text qty text" title="Qty" value="<?=$_SESSION["cart"][$row['id_pc']]?>" name = "quantity[<?=$row['id_pc']?>]" min="0" step="1"></th>
                <th class='price'><?=number_format($row['price_pc'] * $_SESSION["cart"][$row['id_pc']])?> VNĐ</th>
            </tr>
<?php
            $total +=  $row['price_pc'] * $_SESSION["cart"][$row['id_pc']];
            $quantity_ord += $_SESSION["cart"][$row['id_pc']];
        }
        if($index > 100 && $index < 200) {
            $sql = "SELECT id_acc, img_acc, name_acc, price_acc FROM web_maytinh.accessories WHERE id_acc = $index";
            $row = executeSingleResult($sql);
?>
            <tr>
                <th style="position: relative;">
                    <a title="Remove this item" class="remove" href="cart.php?action=delete&id_pc=<?=$row['id_acc']?>">×</a> 
                </th>
                <th><img src="<?=$row['img_acc']?>"style="max-width: 200px; max-height: 200px"></th>
                <th ><?=$row['name_acc']?></th>
                <th class='price'><?=number_format($row['price_acc'])?> VNĐ</th>
                <th ><input style="max-width: 50px" type="number" size="1" class="input-text qty text" title="Qty" value="<?=$_SESSION["cart"][$row['id_acc']]?>" name = "quantity[<?=$row['id_acc']?>]" min="0" step="1"></th>
                <th class='price'><?=number_format($row['price_acc'] * $_SESSION["cart"][$row['id_acc']])?> VNĐ</th>
            </tr>
<?php
            $total +=  $row['price_acc'] * $_SESSION["cart"][$row['id_acc']];
            $quantity_ord += $_SESSION["cart"][$row['id_acc']];
        }
        if($index > 200) {
            // var_dump($index); exit;
            $sql = "SELECT id_com, img_com, name_com, price_com FROM web_maytinh.components WHERE id_com = $index";
            $row = executeSingleResult($sql);
            // var_dump($row); exit;
?>
            <tr>
                <th style="position: relative;">
                    <a title="Remove this item" class="remove" href="cart.php?action=delete&id_pc=<?=$row['id_com']?>">×</a> 
                </th>
                <th ><img src="<?=$row['img_com']?>" style="max-width: 200px; max-height: 200px"></th>
                <th ><?=$row['name_com']?></th>
                <th class='price'><?=number_format($row['price_com'])?> VNĐ</th>
                <th ><input style="max-width: 50px" type="number" size="1" class="input-text qty text" title="Qty" value="<?=$_SESSION["cart"][$row['id_com']]?>" name = "quantity[<?=$row['id_com']?>]" min="0" step="1"></th>
                <th class='price'><?=number_format($row['price_com'] * $_SESSION["cart"][$row['id_com']])?> VNĐ</th>
            </tr>
<?php
            $total +=  $row['price_com'] * $_SESSION["cart"][$row['id_com']];
            $quantity_ord += $_SESSION["cart"][$row['id_com']];
        }    
    }
    // var_dump($total); exit;
?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <input value="Cập Nhật" type = "submit" name = "update-click" class="button" style="margin-left: 700px">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
<?php
}
$_SESSION['form'][-1] = $total;
$_SESSION['form'][-2] = $quantity_ord;
// var_dump($_SESSION['form'][-1]); exit;
?>
                            </form>
                            <div class="cart-collaterals">
                            <div class="cart_totals">
                                <h2>Tổng Chi Phí</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Chi Phí</th>
                                            <td><span class="amount"><?=number_format($total)?> VNĐ</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Phí Ship</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Chi Phí Thanh Toán</th>
                                            <td><strong><span class="amount"><?=number_format($total)?> VNĐ</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <td class="actions" colspan="6">
                                <a href="checkout.php">
                                    <input type="submit" value="Thanh Toán" name="proceed" class="checkout-button button alt wc-forward" style="margin-left: 600px; margin-bottom: 20px">
                                </a>
                            </td>
                            </div>
                        </div>                        
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