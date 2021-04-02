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
    <title>Shop Page- Ustora Demo</title>
    
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
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
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
                        <li class="active"><a href="shop.php?id_page=1">Shop page</a></li>
                        <li><a href="single-product.php">Single product</a></li>
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
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid">
            <div class="grid__row app__contet">
                <div class="grid__column-2">
                 <nav class="category">
         
                     <h3 class="category__heading"> <i class="category__heading-icon fas fa-list"></i> Danh mục</h3>
                     <ul class="category-list">

                        <li class="category-item ">
                            <a href="shop.php?action=1" class="category-item__link">Máy tính</a>
                            <a href="shop.php?action=2" class="category-item__link">+DELL</a>
                            <a href="shop.php?action=3" class="category-item__link">+ASUS</a>
                            <a href="shop.php?action=4" class="category-item__link">+ThinkPad</a>
                            <a href="shop.php?action=5" class="category-item__link">+HP</a>
                            <a href="shop.php?action=6" class="category-item__link">+Acer</a>
                        </li>
     
                        <li class="category-item">
                            <a href="shop.php?action=10" class="category-item__link">Linh kiện</a>
                            <a href="shop.php?action=11" class="category-item__link">+CPU</a>
                            <a href="shop.php?action=12" class="category-item__link">+HDD</a>
                            <a href="shop.php?action=13" class="category-item__link">+Mainboard</a>
                            <a href="shop.php?action=14" class="category-item__link">+RAM</a>
                            <a href="shop.php?action=15" class="category-item__link">+SSD</a>
                        </li>
     
                        <li class="category-item">
                            <a href="shop.php?action=20" class="category-item__link">Các phụ kiện khác</a>
                            <a href="shop.php?action=21" class="category-item__link">+Tai Nghe</a>
                            <a href="shop.php?action=22" class="category-item__link">+Bàn Phím</a>
                            <a href="shop.php?action=23" class="category-item__link">+Chuột</a>
                        </li>
     
                     </ul>
                 </nav>
                </div>
                <div class="grid__column-2" style="width: 80%">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm Kiếm Sản Phẩm</h2>
                        <form action="shop.php?action=search" method="post">
                            <input type="text" name = "name_search" id = 'id_search' placeholder="Nhập Tên, Hãng của sản phẩm...">
                            <input type="submit" value="Tìm Kiếm" style="margin-left: 400px">
                        </form>
                    </div>
                <div class="home_product">
                        <!--GRID -> ROW -> Column -->
                    <div class="grid__row">
<?php
// var_dump($_GET);
// var_dump($_POST); exit;
if(!empty($_POST)) {
    if($_POST['name_search'] != null) {
        $name_search = $_POST['name_search'];
        // var_dump('yes'); exit;
    }
}else $name_search = '';
// var_dump($name_search); exit;
require_once('dbhelp.php');
$action = (int) $_GET['action'];
// var_dump($action); exit;
$sql ='';
if ($action < 10 && $action > 0) {
    if($action == 1) {
        $sql = 'SELECT * FROM kDAbiPc3dp.computer;';
        $list = executeResult($sql);
    }
    elseif($action == 2) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE firm_pc = 'DELL';";
        $list = executeResult($sql);
    }
    elseif($action == 3) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE firm_pc = 'ASUS';";
        $list = executeResult($sql);
    }
    elseif($action == 4) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE firm_pc = 'ThinkPad';";
        $list = executeResult($sql);
    }
    elseif($action == 5) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE firm_pc = 'HP';";
        $list = executeResult($sql);
    }
    elseif($action == 6) {
        $sql = "SELECT * FROM kDAbiPc3dp.computer WHERE firm_pc = 'Acer';";
        $list = executeResult($sql);
    }
        
        // var_dump($list); exit;
        foreach($list as $a) {
?>
                            <div class="grid_column-2-4">
                                <a class="home-product-item" href="single-product.php?id_pro=<?=$a['id_pc']?>">
                                    <div class="home-product-item__img" style="background-image: url(<?=$a['img_pc']?>)">
                                        <h5 class="home-product-item__name"><?=$a['name_pc']?></h5>
                                         <div class="home-product-item__price">
                                             <span class="home-product-item__price-current"><?=number_format($a['price_pc'])?> VNĐ</span>
                                         </div>
                                    </div>

                                    <div class="home-product__action">
                                        <span class="home-product-item__like home-product-item__liked">
                                            <i class="fa fa-heart home-product-item__liked"></i>
                                            <i class="far fa-heart home-product-item__likes"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand"><?=$a['firm_pc']?></span>
                                    </div>

                                    <div class="home-product-item__favourite">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Yêu Thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product__sale-off-percent">10%</span>
                                        <span class="home-product__sale-off-label">GIẢM</span>
                                    </div>
                                </a>
                            </div>
                       
<?php
        }
}
elseif ($action >= 10 && $action <20) {
    if($action == 10) {
        $sql = 'SELECT * FROM kDAbiPc3dp.components;';
        $list = executeResult($sql);
    }
    elseif($action == 11) {
        $sql = "SELECT * FROM kDAbiPc3dp.components WHERE kind_com LIKE 'CPU%';";
        $list = executeResult($sql);
    }
    elseif($action == 12) {
        $sql = "SELECT * FROM kDAbiPc3dp.components WHERE kind_com = 'HDD';";
        $list = executeResult($sql);
    }
    elseif($action == 13) {
        $sql = "SELECT * FROM kDAbiPc3dp.components WHERE kind_com = 'Mainboard';";
        $list = executeResult($sql);
    }
    elseif($action == 14) {
        $sql = "SELECT * FROM kDAbiPc3dp.components WHERE kind_com = 'RAM';";
        $list = executeResult($sql);
    }
    elseif($action == 15) {
        $sql = "SELECT * FROM kDAbiPc3dp.components WHERE kind_com = 'SSD';";
        $list = executeResult($sql);
    }
        
        // var_dump($list); exit;
        foreach($list as $a) {
?>
                            <div class="grid_column-2-4">
                                <a class="home-product-item" href="single-product.php?id_pro=<?=$a['id_com']?>">
                                    <div class="home-product-item__img" style="background-image: url(<?=$a['img_com']?>)">
                                        <h5 class="home-product-item__name"><?=$a['name_com']?></h5>
                                         <div class="home-product-item__price">
                                             <span class="home-product-item__price-current"><?=number_format($a['price_com'])?> VNĐ</span>
                                         </div>
                                    </div>

                                    <div class="home-product__action">
                                        <span class="home-product-item__like home-product-item__liked">
                                            <i class="fa fa-heart home-product-item__liked"></i>
                                            <i class="far fa-heart home-product-item__likes"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand"><?=$a['firm_com']?></span>
                                    </div>

                                    <div class="home-product-item__favourite">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Yêu Thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product__sale-off-percent">10%</span>
                                        <span class="home-product__sale-off-label">GIẢM</span>
                                    </div>
                                </a>
                            </div>
                       
<?php
        }
}
elseif ($action >= 20) {
    if($action == 20) {
        $sql = 'SELECT * FROM kDAbiPc3dp.accessories;';
        $list = executeResult($sql);
    }
    elseif($action == 21) {
        $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE kind_acc = 'Tai Nghe';";
        $list = executeResult($sql);
    }
    elseif($action == 22) {
        $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE kind_acc = 'Bàn Phím';";
        $list = executeResult($sql);
    }
    elseif($action == 23) {
        $sql = "SELECT * FROM kDAbiPc3dp.accessories WHERE kind_acc = 'Chuột';";
        $list = executeResult($sql);
    }
        // var_dump($list); exit;
        foreach($list as $a) {
?>
                            <div class="grid_column-2-4">
                                <a class="home-product-item" href="single-product.php?id_pro=<?=$a['id_acc']?>">
                                    <div class="home-product-item__img" style="background-image: url(<?=$a['img_acc']?>)">
                                        <h5 class="home-product-item__name"><?=$a['name_acc']?></h5>
                                         <div class="home-product-item__price">
                                             <span class="home-product-item__price-current"><?=number_format($a['price_acc'])?> VNĐ</span>
                                         </div>
                                    </div>

                                    <div class="home-product__action">
                                        <span class="home-product-item__like home-product-item__liked">
                                            <i class="fa fa-heart home-product-item__liked"></i>
                                            <i class="far fa-heart home-product-item__likes"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand"><?=$a['firm_acc']?></span>
                                    </div>

                                    <div class="home-product-item__favourite">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Yêu Thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product__sale-off-percent">10%</span>
                                        <span class="home-product__sale-off-label">GIẢM</span>
                                    </div>
                                </a>
                            </div>
                       
<?php
        }
}
else {
    // var_dump($name_search); exit;
        $sql2 = "SELECT * FROM kDAbiPc3dp.computer WHERE name_pc LIKE '%$name_search%' or firm_pc LIKE '%$name_search%';";
        $list2 = executeResult($sql2);
            // var_dump($list2); exit;
            foreach($list2 as $a) {
    ?>
                                <div class="grid_column-2-4">
                                    <a class="home-product-item" href="single-product.php?id_pro=<?=$a['id_pc']?>">
                                        <div class="home-product-item__img" style="background-image: url(<?=$a['img_pc']?>)">
                                            <h5 class="home-product-item__name"><?=$a['name_pc']?></h5>
                                             <div class="home-product-item__price">
                                                 <span class="home-product-item__price-current"><?=number_format($a['price_pc'])?> VNĐ</span>
                                             </div>
                                        </div>
    
                                        <div class="home-product__action">
                                            <span class="home-product-item__like home-product-item__liked">
                                                <i class="fa fa-heart home-product-item__liked"></i>
                                                <i class="far fa-heart home-product-item__likes"></i>
                                            </span>
                                            <div class="home-product-item__rating">
                                                <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
    
                                        <div class="home-product-item__origin">
                                            <span class="home-product-item__brand"><?=$a['firm_pc']?></span>
                                        </div>
    
                                        <div class="home-product-item__favourite">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <span>Yêu Thích</span>
                                        </div>
                                        <div class="home-product-item__sale-off">
                                            <span class="home-product__sale-off-percent">10%</span>
                                            <span class="home-product__sale-off-label">GIẢM</span>
                                        </div>
                                    </a>
                                </div>
                           
    <?php
            }
            $sql1 = "SELECT * FROM kDAbiPc3dp.components WHERE name_com LIKE '%$name_search%' or kind_com LIKE '%$name_search%' or firm_com LIKE '%$name_search%';";
            $list1 = executeResult($sql1);
                // var_dump($list1); exit;
                foreach($list1 as $a) {
        ?>
                                    <div class="grid_column-2-4">
                                        <a class="home-product-item" href="single-product.php?id_pro=<?=$a['id_com']?>">
                                            <div class="home-product-item__img" style="background-image: url(<?=$a['img_com']?>)">
                                                <h5 class="home-product-item__name"><?=$a['name_com']?></h5>
                                                 <div class="home-product-item__price">
                                                     <span class="home-product-item__price-current"><?=number_format($a['price_com'])?> VNĐ</span>
                                                 </div>
                                            </div>
        
                                            <div class="home-product__action">
                                                <span class="home-product-item__like home-product-item__liked">
                                                    <i class="fa fa-heart home-product-item__liked"></i>
                                                    <i class="far fa-heart home-product-item__likes"></i>
                                                </span>
                                                <div class="home-product-item__rating">
                                                    <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                    <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                    <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                    <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                    <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
        
                                            <div class="home-product-item__origin">
                                                <span class="home-product-item__brand"><?=$a['firm_com']?></span>
                                            </div>
        
                                            <div class="home-product-item__favourite">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <span>Yêu Thích</span>
                                            </div>
                                            <div class="home-product-item__sale-off">
                                                <span class="home-product__sale-off-percent">10%</span>
                                                <span class="home-product__sale-off-label">GIẢM</span>
                                            </div>
                                        </a>
                                    </div>
                               
        <?php
                }
    $sql3 = "SELECT * FROM kDAbiPc3dp.accessories WHERE name_acc LIKE '%$name_search%' or kind_acc LIKE '%$name_search%' or firm_acc LIKE '%$name_search%'";
    $list3 = executeResult($sql3);
        // var_dump($list3); exit;
        foreach($list3 as $a) {
?>
                            <div class="grid_column-2-4">
                                <a class="home-product-item" href="single-product.php?id_pro=<?=$a['id_acc']?>">
                                    <div class="home-product-item__img" style="background-image: url(<?=$a['img_acc']?>)">
                                        <h5 class="home-product-item__name"><?=$a['name_acc']?></h5>
                                         <div class="home-product-item__price">
                                             <span class="home-product-item__price-current"><?=number_format($a['price_acc'])?> VNĐ</span>
                                         </div>
                                    </div>

                                    <div class="home-product__action">
                                        <span class="home-product-item__like home-product-item__liked">
                                            <i class="fa fa-heart home-product-item__liked"></i>
                                            <i class="far fa-heart home-product-item__likes"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                            <i class="home-product-item__star--gold fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>

                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand"><?=$a['firm_acc']?></span>
                                    </div>

                                    <div class="home-product-item__favourite">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Yêu Thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product__sale-off-percent">10%</span>
                                        <span class="home-product__sale-off-label">GIẢM</span>
                                    </div>
                                </a>
                            </div>
                       
<?php
        }
}
?>                  
                        </div>
                    </div> 
                </div>
                </div>
            </div>
            </div>
           </div>
        </div>

        <div class="footer-top-area" style="margin-top: 20px;">
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