<?php 
    session_start();
    require_once('dbhelp.php');
    $url = getCurrentPageURL();
    // var_dump($url); exit;
    // $url = getCurrentPageURL();
    // var_dump(empty($_SESSION['login']['user'])); exit;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // date(format, timestamp);
    // echo date('d-m-Y H:i:s'); exit;
    // $_POST = array();
    // var_dump(empty($_SESSION['login']));
    // $id_cus = $name_cus = $phone_cus =$address_cus = $user_cus = $pass_cus = '';
    if(!empty($_SESSION['login']['user'])) {
        $id_cus = (int) $_SESSION['login']['user']['id_cus'];
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
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php?action=1">Shop page</a></li>
                        <li class="active"><a href="single-product.php">Single product</a></li>
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
// var_dump(isset($_GET)); exit;
if(!empty($_GET)) {
    if(isset($_GET['id_pro'])) {
        $id_pro= (int) $_GET['id_pro'];
        // var_dump("single-product.php?id_pro={$id_pro}"); exit;
?>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản Phẩm Liên Quan</h2>
<?php
        $sqlz = "SELECT count(*) as total FROM RQLtiWBNIL.comments where id_pro = $id_pro;";
        $total = executeSingleResult($sqlz);
        $total_cmt = (int) $total['total'];
        // var_dump($total_cmt); exit;
        $sql2 = "";
        if($id_pro<101) {
            $sql = "SELECT * FROM RQLtiWBNIL.computer WHERE id_pc = $id_pro;";
            $pc = executeSingleResult($sql);
            $firm_pc = $pc['firm_pc'];
            $sql2 = "SELECT id_pc, name_pc, price_pc, img_pc FROM RQLtiWBNIL.computer WHERE firm_pc = '$firm_pc' LIMIT 5;";
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
            $sql = "SELECT * FROM RQLtiWBNIL.accessories WHERE id_acc = $id_pro;";
            $pc = executeSingleResult($sql);
            // var_dump($pc); exit;
            $firm_pc = $pc['kind_acc'];
            $sql2 = "SELECT id_acc, name_acc, price_acc, img_acc FROM RQLtiWBNIL.accessories WHERE kind_acc = '$firm_pc' LIMIT 5;";
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
            $sql = "SELECT * FROM RQLtiWBNIL.components WHERE id_com = $id_pro;";
            $pc = executeSingleResult($sql);
            $firm_pc = $pc['kind_com'];
            $sql2 = "SELECT id_com, name_com, price_com, img_com FROM RQLtiWBNIL.components WHERE kind_com = '$firm_pc' LIMIT 5;";
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
?>
            <div class="row" style="margin-bottom: 20px">
                <h2><?=$total_cmt?> Bình Luận</h2>
<?php
    if(!empty($_SESSION['login']['user'])) {
?>
                <form method="POST" action="">
<?php
        if(isset($_POST['post_click'])) {
            if(!empty($_POST['content_cmt'])) {
                // var_dump($_POST); exit;
                $sql = "INSERT INTO RQLtiWBNIL.comments (id_cus, content_cmt, id_pro, time_cmt) VALUE ('$id_cus', '".$_POST['content_cmt']."', '$id_pro', NOW());";
                execute($sql);
                // unset($_POST['content_cmt']);
                // unset($_POST['post_click']);
                unset($_POST);
                // var_dump($_POST);
                echo("<script>location.href = 'single-product.php?id_pro={$id_pro}';</script>");
            }
            elseif(empty($_POST['content_cmt'])) {
                $_POST['post_click'] = '0';
                echo '<h6 style="color: red;">Bạn chưa nhập câu bình luận!</h6>';
            }
        }
?>
                    <div class="form-cmt" style="height: 60px;">
                        <div class="form-info" style="float: left; margin-right: 10px;">
                            <img src="img/avatar.png" style="max-width: 65px;">
                            <div class="name-info" style="max-width: 50px;"><?=$user_cus?></div>
                        </div>
                        <div>
                            <textarea name="content_cmt" rows="2" style="width: 80%" placeholder="Viết bình luận, đánh giá sản phẩm..."></textarea>
                        </div>
                    </div>
                    <li style="font-size: 12px; margin-left: 650px; list-style-type: none; color: black;">
                            <button name="post_click"  style="border: none; background-color: white;">
                                <img src="img/post.png" style="max-height: 10px;"> Đăng
                            </button>
                    </li>
                </form>
<?php
    }else { echo 
        '<h3 style="text-align: center;">
            <a href="login.php">Đăng Nhập Để Bình Luận!</a>
        </h3>';
    }
    // var_dump(isset($_POST['post_click'])); exit;
?>
            </div>
            <div class="row">
                <ul style="list-style-type: none; padding-inline-start: 0px;">
<?php
    $sqll = "SELECT id_cmt, id_cus, content_cmt, time_cmt, (SELECT count(*) FROM RQLtiWBNIL.replies where id_cmt = comments.id_cmt) as reps FROM RQLtiWBNIL.comments WHERE id_pro = $id_pro ORDER BY reps DESC, time_cmt DESC";
    $list_cmt = executeResult($sqll);
    // var_dump($list_cmt); exit;
    foreach ($list_cmt as $cmt) { 
        $i = $cmt['id_cus'];
        $sql3 = "SELECT user_cus FROM RQLtiWBNIL.customer WHERE id_cus = $i;";
        $cus  = executeSingleResult($sql3);
        $user_cus_cmt = $cus['user_cus'];
?>
                <li style="margin-top: 10px">
                    <form method="POST" action="">
<?php
    if(isset($_POST['del_cmt'])) {
        $id_cmt_del = (int) $_POST['del_cmt'];
        $sql = "DELETE FROM RQLtiWBNIL.comments WHERE id_cmt = $id_cmt_del";
        // var_dump("ok"); exit;
        execute($sql);
        unset($_POST);
        echo("<script>location.href = 'single-product.php?id_pro={$id_pro}';</script>");
    }
    if(isset($_POST['save_cmt']) && !empty($_POST['content_cmt_repair'])) {
        $id_cmt_save = (int) $_POST['save_cmt'];
        $up_cmt = $_POST['content_cmt_repair'];
        $sql = "UPDATE RQLtiWBNIL.comments SET content_cmt = '$up_cmt', time_cmt = NOW() WHERE id_cmt = $id_cmt_save";
        execute($sql);
        unset($_POST);
        echo("<script>location.href = 'single-product.php?id_pro={$id_pro}';</script>");
    }
?>
                            <div class="form-cmt">
                                <div class="form-info" style="float: left; margin-right: 10px;">
                                    <img src="img/avatar.png" style="max-width: 65px;">
                                    <div class="name-info" style="max-width: 50px;"><?=$user_cus_cmt?></div>
                                </div>
                                <textarea name="content_cmt_repair" rows="2" style="width: 80%;" disabled = "true"><?=$cmt['content_cmt']?></textarea>
                            </div>
                            <li style="font-size: 12px; margin-left: 300px; list-style-type: none; color: black;">
                                <a class="like_click"><button name="like_click" value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;"><img class="like_img" src="img/like1.png" style="max-height: 10px"> Thích</button></a>
                                <a style="margin-left: 20px" class="reply">
                                    <button name="reply_click"  value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;">
                                        <img src="img/reply.png" style="max-height: 10px"> Phản hồi
                                    </button>
                                </a>
<?php
        if(isset($id_cus)) {
            if($id_cus == $cmt['id_cus']) {
?>
                                <a class="repair_cmt"><button name="repair_cmt" value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;"><img src="img/repair.png" style="max-height: 10px"> Sửa</button></a>
                                <a class="del_cmt"><button name="del_cmt" value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;"><img src="img/delete.png" style="max-height: 10px"> Xóa</button></a>
                                <a style="font-size: 12px; margin-left: 30px; list-style-type: none; color: black;"><?=$cmt['time_cmt']?></a>
<?php
    }}else {
?>
                                <a style="font-size: 12px; margin-left: 130px; list-style-type: none; color: black;"><?=$cmt['time_cmt']?></a>
                            </li>
<?php
    }
?>
                            <li style="font-size: 12px; margin-left: 600px; list-style-type: none; color: black;" hidden="true">
                                <button class="cancel_cmt" name="cancel_cmt" value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;">
                                        <img src="img/cancel_2.png" style="max-height: 10px;"> Hủy
                                </button>
                                <a>
                                    <button name="save_cmt" value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;">
                                        <img src="img/post.png" style="max-height: 10px;"> Đăng
                                    </button>
                                </a>
                            </li>
                    </form>
<?php
if(isset($_POST['rep_click'])) {
    if(empty($_SESSION['login']['user'])) {
        // var_dump("ok"); exit;
        echo '<h6 style="color: red;">Bạn chưa đăng nhập!</h6>';
    }
    elseif(!empty($_POST['content_rep'])) {
        $id_cmt = (int)$_POST['rep_click'];
        // var_dump($_POST); exit;
        $sql = "INSERT INTO RQLtiWBNIL.replies (id_cmt, content_rep, id_cus, time_rep) VALUE ('$id_cmt', '".$_POST['content_rep']."', $id_cus, NOW());";
        execute($sql);
        unset($_POST);
        echo("<script>location.href = 'single-product.php?id_pro={$id_pro}';</script>");
    }
    elseif(empty($_POST['content_rep'])) {
        $_POST['reply_click'] = $_POST['rep_click'];
        // var_dump($_POST['reply_click'] == $cmt['id_cmt']); exit;
        echo '<h6 style="color: red;">Bạn chưa nhập câu phản hồi!</h6>';
    }
}
?>
                    <form method="POST" action="" style="margin-left: 75px;" class="form-reply" hidden="true">
                        <div style="height: 60px;">
                            <div class="form-info" style="float: left; margin-right: 10px;">
                                <img src="img/avatar.png" style="max-width: 65px;">
                                <div class="name-info" style="max-width: 50px;"><?=isset($user_cus) ?$user_cus : "" ?></div>
                            </div>
                            <div>
                                <textarea name="content_rep" rows="2" style="width: 550px;" placeholder="Viết câu phản hồi..."></textarea>
                            </div>
                        </div>
                        <li style="font-size: 12px; margin-left: 575px; list-style-type: none; color: black;">
                            <a>
                                <button name="rep_click" value="<?=$cmt['id_cmt']?>" style="border: none; background-color: white;">
                                    <img src="img/post.png" style="max-height: 10px;"> Đăng
                                </button>
                            </a>
                        </li>
                    </form>     
<?php
    // var_dump($_POST); exit;
    $id_cmt = $cmt['id_cmt'];
    $sql2 = "SELECT * FROM RQLtiWBNIL.replies WHERE id_cmt = $id_cmt ORDER BY time_rep DESC";
    $list_rep = executeResult($sql2);
    // var_dump($list_rep); exit;
    if (!empty($list_rep)) {
    foreach ($list_rep as $rep) {
        $i = $rep['id_cus'];
        $sql3 = "SELECT user_cus FROM RQLtiWBNIL.customer WHERE id_cus = $i;";
        $cus  = executeSingleResult($sql3);
        $user_cus_rep = $cus['user_cus'];
        // var_dump($name_cus_rep); exit;
?>
                    <ul style="list-style-type: none; padding-inline-start: 0px;">
                        <li>
                            <form method="POST" action="">
<?php
    if(isset($_POST['del_rep'])) {
        $id_rep_del = (int) $_POST['del_rep'];
        $sql = "DELETE FROM RQLtiWBNIL.replies WHERE id_rep = $id_rep_del";
        execute($sql);
        unset($_POST);
        echo("<script>location.href = 'single-product.php?id_pro={$id_pro}';</script>");
    }
    if(isset($_POST['save_rep']) && !empty($_POST['content_rep_repair'])) {
        $id_rep_save = (int) $_POST['save_rep'];
        $up_rep = $_POST['content_rep_repair'];
        $sql = "UPDATE RQLtiWBNIL.replies SET content_rep = '$up_rep', time_rep = NOW() WHERE id_rep = $id_rep_save";
        execute($sql);
        unset($_POST);
        echo("<script>location.href = 'single-product.php?id_pro={$id_pro}';</script>");
    }
?>
                                <div class="row" style="margin-left:75px; margin-top: 10px">
                                    <div class="form-cmt" style="height: 60px;">
                                        <div class="form-info" style="float: left; margin-right: 10px;">
                                            <img src="img/avatar.png" style="max-width: 65px;">
                                            <div class="name-info" style="max-width: 50px;"><?=$user_cus_rep?></div>
                                        </div>
                                        <textarea name="content_rep_repair" rows="2" style="width: 550px;" disabled = "true"><?=$rep['content_rep']?></textarea>
                                    </div>
                                    <li style="font-size: 12px; margin-left: 225px; list-style-type: none; color: black;">
                                        <a class="like_click"><button name="like_click" value="" style="border: none; background-color: white;"><img class="like_img" src="img/like1.png" style="max-height: 10px;"> Thích</button></a>
<?php
    if(isset($id_cus)) {
        if($id_cus == $cmt['id_cus']) {
?>
                                <a class="repair_rep"><button name="repair_rep" value="<?=$rep['id_rep']?>" style="border: none; background-color: white;"><img src="img/repair.png" style="max-height: 10px"> Sửa</button></a>
                                <a class="del_rep"><button name="del_rep" value="<?=$rep['id_rep']?>" style="border: none; background-color: white;"><img src="img/delete.png" style="max-height: 10px"> Xóa</button></a>
                                <a style="font-size: 12px; margin-left: 130px; list-style-type: none; color: black;"><?=$rep['time_rep']?></a>
<?php
    }}else {
?>
                                <a style="font-size: 12px; margin-left: 230px; list-style-type: none; color: black;"><?=$rep['time_rep']?></a>                                      
                                    </li>
<?php
    }
?> 
                                    <li style="font-size: 12px; margin-left: 525px; list-style-type: none; color: black;" hidden="true">
                                            <button class="cancel_rep" name="cancel_rep" value="<?=$rep['id_rep']?>" style="border: none; background-color: white;">
                                                <img src="img/cancel_2.png" style="max-height: 10px;"> Hủy
                                            </button>
                                        <a>
                                            <button name="save_rep" value="<?=$rep['id_rep']?>" style="border: none; background-color: white;">
                                                <img src="img/post.png" style="max-height: 10px;"> Đăng
                                            </button>
                                        </a>
                                    </li>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
<?php                
    }
}    
}
?>
                </ul>
            </div>
        </div>
    </div>
<?php
}
}else {
?>
    <div style="text-align: center; height: 500px;">
            <img src="img/not.png" style="max-height: 150px; margin-bottom: 20px">
            <h1>Bạn Chưa Chọn Sản Phẩm Nào Cả!</h1>
            <a href="shop.php?action=1" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Shop Page
                </button>
            <a>
    </div>
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
    <script src="js/test.js"></script>
  </body>
</html>