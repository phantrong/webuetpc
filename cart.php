<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart Page - Ustora Demo</title>
    
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
                        <li><a href="single-product.php">Single product</a></li>
                        <li class="active"><a href="cart.php">Cart</a></li>
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
                        <h2>Shopping Cart</h2>
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
?>
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">Sản Phẩm</th>
                                            <th class="product-name">Tên</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$quantity_ord = 0;
$total = 0;
$num = 1;
// $_SESSION['cart'] = array();
// var_dump($_SESSION["cart"]); exit;
foreach($_SESSION["cart"] as $index => $quan) {
    if($index < 100) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE id_pc = $index";
        $row = executeSingleResult($sql);
?>
            <tr>
                <th class="product-remove">
                    <a title="Remove this item" class="remove" href="cart.php?action=delete&id_pc=<?=$row['id_pc']?>">×</a> 
                </th>
                <th class="product-thumbnail"><img src="<?=$row['img_pc']?>"></th>
                <th class="product-name"><?=$row['name_pc']?></th>
                <th class="product-price"><?=number_format($row['price_pc'])?></th>
                <th class="product-quantity"><input style="max-width: 50px" type="number" size="1" class="input-text qty text" title="Qty" value="<?=$_SESSION["cart"][$row['id_pc']]?>" name = "quantity[<?=$row['id_pc']?>]" min="0" step="1"></th>
                <th class="product-subtotal"><?=number_format($row['price_pc'] * $_SESSION["cart"][$row['id_pc']])?></th>
            </tr>
<?php
            $total +=  $row['price_pc'] * $_SESSION["cart"][$row['id_pc']];
            $quantity_ord += $_SESSION["cart"][$row['id_pc']];
        }
        if($index > 100 && $index < 200) {
            $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE id_acc = $index";
            $row = executeSingleResult($sql);
?>
            <tr>
                <th class="product-remove">
                    <a title="Remove this item" class="remove" href="cart.php?action=delete&id_pc=<?=$row['id_acc']?>">×</a> 
                </th>
                <th class="product-thumbnail"><img src="<?=$row['img_acc']?>"></th>
                <th class="product-name"><?=$row['name_acc']?></th>
                <th class="product-price"><?=number_format($row['price_acc'])?></th>
                <th class="product-quantity"><input style="max-width: 50px" type="number" size="1" class="input-text qty text" title="Qty" value="<?=$_SESSION["cart"][$row['id_acc']]?>" name = "quantity[<?=$row['id_acc']?>]" min="0" step="1"></th>
                <th class="product-subtotal"><?=number_format($row['price_acc'] * $_SESSION["cart"][$row['id_acc']])?></th>
            </tr>
<?php
            $total +=  $row['price_acc'] * $_SESSION["cart"][$row['id_acc']];
            $quantity_ord += $_SESSION["cart"][$row['id_acc']];
        }
        if($index > 200) {
            // var_dump($index); exit;
            $sql = "SELECT * FROM kDAbiPc3dp.components WHERE id_com = $index";
            $row = executeSingleResult($sql);
            
?>
            <tr>
                <th class="product-remove">
                    <a title="Remove this item" class="remove" href="cart.php?action=delete&id_pc=<?=$row['id_com']?>">×</a> 
                </th>
                <th class="product-thumbnail"><img src="<?=$row['img_com']?>"></th>
                <th class="product-name"><?=$row['name_com']?></th>
                <th class="product-price"><?=number_format($row['price_com'])?></th>
                <th class="product-quantity"><input style="max-width: 50px" type="number" size="1" class="input-text qty text" title="Qty" value="<?=$_SESSION["cart"][$row['id_com']]?>" name = "quantity[<?=$row['id_com']?>]" min="0" step="1"></th>
                <th class="product-subtotal"><?=number_format($row['price_com'] * $_SESSION["cart"][$row['id_com']])?></th>
            </tr>
<?php
            $total +=  $row['price_com'] * $_SESSION["cart"][$row['id_com']];
            $quantity_ord += $_SESSION["cart"][$row['id_com']];
        }    
    }
    // var_dump($_SESSION["cart"]); exit;
?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <input value="Cập Nhật" type = "submit" name = "update-click" class="button" style="margin-left: 500px">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Tổng Chi Phí</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Chi Phí</th>
                                            <td><span class="amount"><?=number_format($total)?> VNĐ</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
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
                                <a href="checkout.php?action=save&quantity_ord=<?=$quantity_ord?>&total_ord=<?=$total?>">
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