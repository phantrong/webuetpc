<?php 
    session_start();
    // var_dump($_POST);
    require_once('dbhelp.php');
    if(empty($_GET['action'])) {
        $ac = 0;
    }else {
        $ac = (int) $_GET['action'];
    }
    if(empty($_GET['choose'])) {
        $cc = 1;
    }else {
        $cc = (int) $_GET['choose'];
    }
    if(empty($_POST['number'])) {
        $nb = 5;
        $index = 5;
    }elseif($_POST['number'] == 100) {
        $nb = "Các";
        $index = 100;
    }
    else {
        $nb = (int) $_POST['number'];
        $index = (int) $_POST['number'];
    }
    $s = [
        "SP Bán Nhiều Nhất", 
        "SP Được Quan Tâm Nhiều Nhất", 
        "SP Tồn Kho Nhiều Nhất", 
        "DS Đơn Hàng Đang Giao", 
        "DS Đơn Hàng Đã Giao", 
        "Đơn Hàng Ship Lâu Nhất",
        "DS Câu Bình Luận",
        "DS Câu Phản Hồi",
        "Câu BL Được Quan Tâm Nhất",
        "Thông Tin Khác Hàng",
        "Thống Kê Doanh Thu"
    ];
    if (isset($_POST['save']) && !empty($_POST['ship_ord'])) {
        $stt1 = $_POST['status'];
        $cmt1 = $_POST['cmt'];
        $ship = $_POST['ship_ord'];
        $id1 = (int) $_POST['save'];
        $sqlz = "UPDATE RQLtiWBNIL.order SET ship_ord = '$ship', status_ord = '$stt1', comments = '$cmt1' WHERE id_ord = $id1;";
        execute($sqlz);
        unset($_POST);
        // echo("<script>location.href = 'admin.php?action={$ac}';</script>");
        // var_dump("ok");
    }
    if (isset($_POST['save'])) {
        $cmt1 = $_POST['cmt'];
        $id1 = (int) $_POST['save'];
        $sqlz = "UPDATE RQLtiWBNIL.order SET comments = '$cmt1' WHERE id_ord = $id1;";
        execute($sqlz);
        unset($_POST);
        echo("<script>location.href = 'admin.php?action={$ac}';</script>");
        // var_dump("ok");
    }
    if (isset($_POST['save_cus'])) {
        $name = $_POST['name_cus'];
        $phone = $_POST['phone_cus'];
        $address = $_POST['address_cus'];
        $id = (int) $_POST['save_cus'];
        $sqlz = "UPDATE RQLtiWBNIL.customer SET name_cus = '$name', phone_cus = '$phone', address_cus = '$address' WHERE id_cus = $id;";
        execute($sqlz);
        unset($_POST);
        echo("<script>location.href = 'admin.php?action={$ac}';</script>");
        // var_dump("ok");
    }
    if (isset($_POST['delete_cus'])) {
        $id = (int) $_POST['delete_cus'];
        $sqlz = "DELETE FROM RQLtiWBNIL.customer WHERE id_cus = $id;";
        execute($sqlz);
        unset($_POST);
        echo("<script>location.href = 'admin.php?action={$ac}';</script>");
        // var_dump("ok");
    }
    if (isset($_POST['delete_cmt'])) {
        $id = (int) $_POST['delete_cmt'];
        $sqlz = "DELETE FROM RQLtiWBNIL.comments WHERE id_cmt = $id;";
        execute($sqlz);
        unset($_POST);
        echo("<script>location.href = 'admin.php?action={$ac}';</script>");
        // var_dump("ok");
    }
    if (isset($_POST['delete_rep'])) {
        $id = (int) $_POST['delete_rep'];
        $sqlz = "DELETE FROM RQLtiWBNIL.replies WHERE id_rep = $id;";
        execute($sqlz);
        unset($_POST);
        echo("<script>location.href = 'admin.php?action={$ac}';</script>");
        // var_dump("ok");
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
    <title>Các Chức Năng Quản Lý</title>
    
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
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bieudo.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fonts/fontawesome-free-5.15.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                        <li><a href="single-product.php">Single product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="account.php">Account</a></li>
<?php
    if(isset($_SESSION['login']['admin'])) {
        echo '<li  class="active"><a href="admin.php">Admin</a></li>';
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
                        <h2>Quản Lý</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid" style="width: 1400px;">
            <div class="grid__row app__contet">
                <div class="grid__column-2" style="z-index: 2;">
                 <nav class="category">
         
                    <h3 class="category__heading"> <i class="category__heading-icon fas fa-list"></i> Quản Lý</h3>
                    <div class="test2">
                        <ul class="category-list">

                            <li class="category-item category-item--active" style=" display: flex; align-items: center;">
                                <a href="admin.php?action=0" class="category-item__link" style="width: 100%;">Sản phẩm</a>
                                <i class="fas fa-caret-down icon--icon" style="font-size: 18px; margin-left: 15px; color:  #ee4d2d;"></i>
                            </li>
                            <div class="test" style="display: none; margin-top: 10px;">
                                <li class="category-item">
                                    <a href="admin.php?action=0" class="category-item__link"><?=$s[0]?></a>
                                </li>

                                <li class="category-item">
                                    <a href="admin.php?action=1" class="category-item__link"><?=$s[1]?></a>
                                </li>

                                <li class="category-item category-item-test" style="position: relative;" >
                                    <a href="admin.php?action=2" class="category-item__link"><?=$s[2]?></a>
                                    <div class="test-test">
                                            <ul class="test-category-list">
                                                <li class="test-category-item">
                                                    <i class="fas fa-laptop test-icon"></i>
                                                    <a href="admin.php?action=2&choose=1" class="test-category-item__link">Máy tính</a>
                                                </li>
                                                <li class="test-category-item">
                                                    <i class="fas fa-hdd test-icon"></i>
                                                    <a href="admin.php?action=2&choose=2" class="test-category-item__link">Link Kiện</a>
                                                </li>
                                                <li class="test-category-item">
                                                    <i class="fas fa-headphones test-icon"></i>
                                                    <a href="admin.php?action=2&choose=3" class="test-category-item__link">Phụ kiện</a>
                                                </li>
                                            </ul>
                                    </div>
                                </li>
                            </div>

                        </ul>
                        <div class="test1">
                            <ul class="category-list">

                                <li class="category-item category-item--active" style=" display: flex; align-items: center;">
                                    <a href="admin.php?action=3" class="category-item__link" style="width: 100%;">Quản Lý Đơn Hàng</a>
                                    <i class="fas fa-caret-down icon--icon" style="font-size: 18px; margin-left: 5px; color:  #ee4d2d; border-color: white;"></i>
                                </li>
                                <div class="test" style="display: none; margin-top: 10px;">
                                    <li class="category-item ">
                                        <a href="admin.php?action=3" class="category-item__link"><?=$s[3]?></a>
                                    </li>

                                    <li class="category-item">
                                        <a href="admin.php?action=4" class="category-item__link"><?=$s[4]?></a>
                                    </li>

                                    <li class="category-item">
                                        <a href="admin.php?action=5" class="category-item__link"><?=$s[5]?></a>
                                    </li>
                                </div>
                            </ul>                           
                            <div class="test2">
                                <ul class="category-list">
                                        <li class="category-item category-item--active" style=" display: flex; align-items: center;">
                                            <a href="admin.php?action=6" class="category-item__link" style="width: 100%;">Bình Luận</a>
                                            <i class="fas fa-caret-down icon--icon" style="font-size: 18px; margin-left: 15px; color:#ee4d2d;"></i>
                                        </li>
                                        <div class="test" style="display: none; margin-top: 10px;">
                                            <li class="category-item">
                                                <a href="admin.php?action=6" class="category-item__link"><?=$s[6]?></a>
                                            </li>

                                            <li class="category-item">
                                                <a href="admin.php?action=7" class="category-item__link"><?=$s[7]?></a>
                                            </li>

                                            <li class="category-item">
                                                <a href="admin.php?action=8" class="category-item__link"><?=$s[8]?></a>
                                            </li>
                                        </div>
                                    
                                </ul>
                                <div class="test1">
                                    <ul class="category-list">
                                        <li class="category-item category-item--active" style=" display: flex; align-items: center;">
                                            <a href="admin.php?action=9" class="category-item__link" style="width: 100%;"><?=$s[9]?></a>
                                        </li>
                                    </ul>
                                    <div class="test2">
                                        <ul class="category-list">

                                            <li class="category-item category-item--active" style=" display: flex; align-items: center;">
                                                <a href="admin.php?action=10" class="category-item__link" style="width: 100%;"><?=$s[10]?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </nav>
                </div>
<?php
    if($ac == 0 || $ac == 1 || $ac == 2 || $ac == 5 || $ac == 8) {
?>
                <div class="grid__column-2" style="width: 80%">
                    <div class="single-sidebar" style="margin-bottom: 0px;">
                        <h2 class="sidebar-title" style="text-align: center; margin-bottom: 0px;"><?=$nb.' '.$s[$ac]?></h2>
                    </div>
<?php }else {
?>
                <div class="grid__column-2" style="width: 80%">
                    <div class="single-sidebar" style="margin-bottom: 0px;">
                        <h2 class="sidebar-title" style="text-align: center; margin-bottom: 0px;"><?=$s[$ac]?></h2>
                    </div>

<?php
}?>
                    <div class="home_product">
                        <!--GRID -> ROW -> Column -->
<?php
    if($ac == 0 || $ac == 1 || $ac == 2 || $ac == 5 || $ac == 8) {
?>
                        <form method="POST">
                            <div class="mainmenu-area">
                                <div class="container">
                                    <div class="row">
                                        <div class="navbar-collapse collapse" style="background-color: white;">
                                            <ul class="nav navbar-nav">
<?php
    if ($index == 5) {
        echo '<li class="active"><a style="padding: 10px;"><button class= "bt1" name="number" value="5" >5</button></a></li>
        <li ><a style="padding: 10px;"><button class= "bt1" name="number" value="10">10</button></a></li>
        <li ><a style="padding: 10px;"><button class= "bt1" name="number" value="100">Tất Cả</button></a></li>';
    }elseif ($index == 10) {
        echo '<li ><a style="padding: 10px;"><button class= "bt1" name="number" value="5" >5</button></a></li>
        <li class="active"><a style="padding: 10px;"><button class= "bt1" name="number" value="10">10</button></a></li>
        <li ><a style="padding: 10px;"><button class= "bt1" name="number" value="100">Tất Cả</button></a></li>';
    }elseif ($index == 100) {
        echo '<li ><a style="padding: 10px;"><button class= "bt1" name="number" value="5" >5</button></a></li>
        <li ><a style="padding: 10px;"><button class= "bt1" name="number" value="10">10</button></a></li>
        <li class="active"><a style="padding: 10px;"><button class= "bt1" name="number" value="100">Tất Cả</button></a></li>';
    }
?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
<?php }
?>
                        <div class="grid__row" style="margin-left: 15px; margin-top: 20px">
                            <table class="table">
                                <thead class="thead-dark">
<?php
    if ($ac == 0) { ?>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>SL đã được bán</th> 
                                    </tr>
                                </thead>
                                <tbody>
<?php
        $sql0 = "SELECT id_product, sum(quantity_pro) as s_quantity FROM RQLtiWBNIL.orderdetail GROUP BY id_product ORDER BY s_quantity DESC LIMIT $index;";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        foreach($list_pro0 as $i => $arr){
            $id_pro = (int) $arr['id_product'];
            $s_quantity = (int) $arr['s_quantity'];
            $name = $img = $price = '';
            if($id_pro <= 100) {
                $sql = "SELECT name_pc, img_pc, price_pc FROM RQLtiWBNIL.computer WHERE id_pc = $id_pro";
                $rs = executeSingleResult($sql);
                $name = $rs['name_pc'];
                $img = $rs['img_pc'];
                $price = (int) $rs['price_pc'];
            }elseif($id_pro > 100 && $id_pro <200 ) {
                $sql = "SELECT name_acc, img_acc, price_acc FROM RQLtiWBNIL.accessories WHERE id_acc = $id_pro";
                $rs = executeSingleResult($sql);
                $name = $rs['name_acc'];
                $img = $rs['img_acc'];
                $price = (int) $rs['price_acc'];
            }else{
                $sql = "SELECT name_com, img_com, price_com FROM RQLtiWBNIL.components WHERE id_com = $id_pro";
                $rs = executeSingleResult($sql);
                $name = $rs['name_com'];
                $img = $rs['img_com'];
                $price = (int) $rs['price_com'];
            }
?>
                                    <tr>
                                        <th><?=$i+1?></th>
                                        <th><img src="<?=$img?>" style="max-height: 200px"></th>
                                        <th><?=$name?></th>
                                        <th><?=number_format($price)?></th>   
                                        <th><?=$s_quantity?></th>
                                    </tr>
<?php
        }
    }elseif ($ac == 2) { ?>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>SL Trong Kho</th> 
                                    </tr>
                                </thead>
                                <tbody>
<?php
        if ($cc == 1) {
            $sql0 = "SELECT id_pc, name_pc, img_pc, price_pc, quantity_pc from RQLtiWBNIL.computer order by quantity_pc desc limit $index;";
            $list_pro0 = executeResult($sql0);
            // var_dump($list_pro0);
            $name = $img = $price = $quantity = '';
            foreach($list_pro0 as $i => $arr){
                $name = $arr['name_pc'];
                $img = $arr['img_pc'];
                $price = (int) $arr['price_pc'];
                $quantity = $arr['quantity_pc'];
?>
<tr>
                                        <th><?=$i+1?></th>
                                        <th><img src="<?=$img?>" style="max-height: 200px"></th>
                                        <th><?=$name?></th>
                                        <th><?=number_format($price)?></th>   
                                        <th><?=$quantity?></th>
                                    </tr>
<?php
            }
        }elseif($cc == 2) {
            $sql0 = "SELECT id_acc, name_acc, img_acc,price_acc,quantity_acc from RQLtiWBNIL.accessories order by quantity_acc desc limit $index;";
            $list_pro0 = executeResult($sql0);
            // var_dump($list_pro0);
            $name = $img = $price = $quantity = '';
            foreach($list_pro0 as $i => $arr){
                $name = $arr['name_acc'];
                $img = $arr['img_acc'];
                $price = (int) $arr['price_acc'];
                $quantity = $arr['quantity_acc'];
?>
<tr>
                                        <th><?=$i+1?></th>
                                        <th><img src="<?=$img?>" style="max-width: 200px"></th>
                                        <th ><?=$name?></th>
                                        <th ><?=number_format($price)?></th>   
                                        <th ><?=$quantity?></th>
                                    </tr>
<?php
            }
        }elseif($cc == 3) {
            $sql0 = "SELECT id_com, name_com, img_com,price_com,quantity_com from RQLtiWBNIL.components order by quantity_com desc limit $index;";
            $list_pro0 = executeResult($sql0);
            // var_dump($list_pro0);
            $name = $img = $price = $quantity = '';
            foreach($list_pro0 as $i => $arr){
                $name = $arr['name_com'];
                $img = $arr['img_com'];
                $price = (int) $arr['price_com'];
                $quantity = $arr['quantity_com'];
?>
<tr>
                                        <th ><?=$i+1?></th>
                                        <th ><img src="<?=$img?>" style="max-height: 200px"></th>
                                        <th ><?=$name?></th>
                                        <th ><?=number_format($price)?></th>   
                                        <th ><?=$quantity?></th>
                                    </tr>
<?php
            }
        }
    }elseif ($ac == 3) { ?>
                                    <tr>
                                        <th >STT</th>
                                        <th >Mã HĐ</th>
                                        <th >Tên Người Dùng</th>
                                        <th >SĐT Người Dùng</th>
                                        <th >Ngày Đặt</th>
                                        <th >Ngày Giao</th>
                                        <th >Trạng Thái</th>
                                        <th >Ghi Chú</th>
                                        <th >&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
        $sql0 = "SELECT id_ord, name_cus, phone_cus, date_ord, status_ord, comments FROM RQLtiWBNIL.order INNER JOIN customer on order.id_cus = customer.id_cus WHERE status_ord = 'Shipping';";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $id = $name = $phone = $date = $stt = $cmt = '';
        foreach($list_pro0 as $i => $arr){
            $id = $arr['id_ord'];
            $name = $arr['name_cus'];
            $phone = $arr['phone_cus'];
            $date = $arr['date_ord'];
            $stt = $arr['status_ord'];
            $cmt = $arr['comments'];
?>
                                    <tr>
                                        <th ><?=$i+1?></th>
                                        <th ><?=$id?></th>
                                        <th ><?=$name?></th>
                                        <th ><?=$phone?></th>   
                                        <th ><?=$date?></th>
                                        <form method="POST">
                                            <th ><input type="datetime-local" name='ship_ord' style="width: 140px"></th>
                                            <th style="width: 100px;">
                                            <div class="form-check">
                                                <label class="form-check-label" for="radio1">
                                                    <input type="radio" class="form-check-input" name="status" value="Shipping" checked>Shipping
                                                </label>
                                                <label class="form-check-label" for="radio2">
                                                    <input type="radio" class="form-check-input" name="status" value="Shipped">Shipped
                                                </label>
                                            </div>
                                            </th>
                                            <th><input type="text" name="cmt" value="<?=$cmt?>" placeholder="Chưa có ghi chú"></th>
                                            <th><button name="save" value="<?=$id?>" style="border: none;"><img src="img/updated.png" style="max-width: 30px"></button></th>
                                        </form>
                                    </tr>
<?php
        }
    }elseif ($ac == 4) { ?>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Hóa Đơn</th>
                                        <th >Tên Người Dùng</th>
                                        <th >SĐT Người Dùng</th>
                                        <th >Ngày Đặt</th>
                                        <th>Ngày Giao</th>
                                        <th >Trạng Thái</th>
                                        <th >Ghi Chú</th>
                                        <th >&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
        $sql0 = "SELECT id_ord, name_cus, phone_cus, date_ord, status_ord, ship_ord, comments FROM RQLtiWBNIL.order INNER JOIN customer on order.id_cus = customer.id_cus WHERE status_ord = 'Shipped';";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $id = $name = $phone = $date = $stt = $cmt = '';
        foreach($list_pro0 as $i => $arr){
            $id = $arr['id_ord'];
            $name = $arr['name_cus'];
            $phone = $arr['phone_cus'];
            $date = $arr['date_ord'];
            $ship = $arr['ship_ord'];
            $stt = $arr['status_ord'];
            $cmt = $arr['comments'];
        ?>
                                <tr>
                                    <th ><?=$i+1?></th>
                                    <th ><?=$id?></th>
                                    <th><?=$name?></th>
                                    <th ><?=$phone?></th>   
                                    <th ><?=$date?></th>
                                    <th ><?=$ship?></th>
                                    <form method="POST">
                                        <th style="width: 100px;">
                                            <div class="form-check">
                                                <label class="form-check-label" for="radio1">
                                                    <input type="radio" class="form-check-input" name="status" value="Shipping" >Shipping
                                                </label>
                                                <label class="form-check-label" for="radio2">
                                                    <input type="radio" class="form-check-input" name="status" value="Shipped" checked>Shipped
                                                </label>
                                            </div>
                                        </th>
                                        <th><input type="text" name="cmt" value="<?=$cmt?>" placeholder="Chưa có ghi chú"></th>
                                        <th><button name="save" value="<?=$id?>" style="border: none;"><img src="img/updated.png" style="max-width: 30px"></button></th>
                                    </form>
                                </tr>
<?php
        }
    }elseif ($ac == 5) { ?>
                                <tr>
                                    <th >STT</th>
                                    <th>Mã Hóa Đơn</th>
                                    <th>Tên Người Dùng</th>
                                    <th class="product-price">SĐT Người Dùng</th>
                                    <th>Ngày Đặt</th>
                                    <th>Số ngày Chưa Giao</th>
                                    <th>Trạng Thái</th>
                                    <th>Ghi Chú</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        $sql0 = "SELECT id_ord, name_cus, phone_cus, date_ord, status_ord, ship_ord, comments, DATEDIFF(now(), date_ord) as left_day FROM RQLtiWBNIL.order INNER JOIN customer on customer.id_cus = order.id_cus WHERE status_ord = 'Shipping' ORDER BY left_day DESC LIMIT $index;";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $id = $name = $phone = $date = $stt = $cmt = $left_day = '';
        foreach($list_pro0 as $i => $arr){
            $id = $arr['id_ord'];
            $name = $arr['name_cus'];
            $phone = $arr['phone_cus'];
            $date = $arr['date_ord'];
            $left_day = $arr['left_day'];
            $stt = $arr['status_ord'];
            $cmt = $arr['comments'];
?>
                                <tr>
                                    <th><?=$i+1?></th>
                                    <th><?=$id?></th>
                                    <th><?=$name?></th>
                                    <th class="product-price"><?=$phone?></th>   
                                    <th><?=$date?></th>
                                    <th><?=$left_day?></th>
                                    <form method="POST">
                                        <th style="width: 100px;">
                                            <div class="form-check">
                                                <label class="form-check-label" for="radio1">
                                                    <input type="radio" class="form-check-input" name="status" value="Shipping" checked>Shipping
                                                </label>
                                                <label class="form-check-label" for="radio2">
                                                    <input type="radio" class="form-check-input" name="status" value="Shipped">Shipped
                                                </label>
                                            </div>
                                        </th>
                                        <th><input type="text" name="cmt" value="<?=$cmt?>" placeholder="Chưa có ghi chú"></th>
                                        <th><button name="save" value="<?=$id?>" style="border: none;"><img src="img/updated.png" style="max-width: 30px"></button></th>
                                    </form>
                                </tr>
<?php
        }
    }elseif ($ac == 6) { ?>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài Khoản Bình LUận</th>
                                    <th>Nội Dung Bình Luận</th>
                                    <th class="product-price">Thời Gian Bình Luận</th>
                                    <th>Mã Sản Phẩm</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        $sql0 = "SELECT id_cmt, user_cus, content_cmt, time_cmt, id_pro FROM RQLtiWBNIL.comments INNER JOIN customer on comments.id_cus = customer.id_cus";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $user = $content = $time = $id_pro = $id_cmt ='';
        foreach($list_pro0 as $i => $arr){
            $id_cmt = (int) $arr['id_cmt'];
            $id_pro = (int) $arr['id_pro'];
            $user = $arr['user_cus'];
            $content = $arr['content_cmt'];
            $time = $arr['time_cmt'];
?>
                                <tr>
                                    <th><?=$i+1?></th>
                                    <th><?=$user?></th>
                                    <th><?=$content?></th>
                                    <th class="product-price"><?=$time?></th>   
                                    <th><?=$id_pro?></th>
                                    <form method="POST">
                                        <th><button name="delete_cmt" value="<?=$id_cmt?>" style="border: none;"><img src="img/remove.png" style="max-width: 30px"></button></th>
                                    </form>
                                </tr>
<?php
        }
    }elseif ($ac == 7) { ?>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài Khoản Phản Hồi</th>
                                    <th>Nội Dung Phản Hồi</th>
                                    <th class="product-price">Thời Gian Phản Hồi</th>
                                    <th>Nội Dung Câu BL</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        $sql0 = "SELECT id_rep, user_cus, content_rep, time_rep, content_cmt FROM RQLtiWBNIL.replies INNER JOIN customer on replies.id_cus = customer.id_cus INNER JOIN comments on comments.id_cmt = replies.id_cmt";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $user = $content = $time = $id_rep = $content_cmt ='';
        foreach($list_pro0 as $i => $arr){
            $id_rep = (int) $arr['id_rep'];
            $user = $arr['user_cus'];
            $content = $arr['content_rep'];
            $content_cmt = $arr['content_cmt'];
            $time = $arr['time_rep'];
?>
                                <tr>
                                    <th><?=$i+1?></th>
                                    <th><?=$user?></th>
                                    <th><?=$content?></th>
                                    <th class="product-price"><?=$time?></th>   
                                    <th><?=$content_cmt?></th>
                                    <form method="POST">
                                    <th><button name="delete_rep" value="<?=$id_rep?>" style="border: none;"><img src="img/remove.png" style="max-width: 30px"></button></th>
                                    </form>
                                </tr>
<?php
        }
    }elseif ($ac == 8) { ?>
                                <tr>
                                    <th>STT</th>
                                    <th>Tài Khoản Bình Luận</th>
                                    <th>Nội Dung Bình Luận</th>
                                    <th class="product-price">Thời Gian Bình Luận</th>
                                    <th>Lượt Tương Tác</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        $sql0 = "SELECT comments.id_cmt, user_cus, content_cmt, time_cmt, count(*) as reps FROM RQLtiWBNIL.comments INNER JOIN customer on customer.id_cus = comments.id_cus INNER JOIN replies on replies.id_cmt = comments.id_cmt GROUP BY id_cmt ORDER BY reps DESC LIMIT 5";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $user = $content = $time = $id_cmt = $reps ='';
        foreach($list_pro0 as $i => $arr){
            $id_cmt = (int) $arr['id_cmt'];
            $user = $arr['user_cus'];
            $content = $arr['content_cmt'];
            $reps = (int) $arr['reps'];
            $time = $arr['time_cmt'];
?>
                                <tr>
                                    <th><?=$i+1?></th>
                                    <th><?=$user?></th>
                                    <th><?=$content?></th>
                                    <th class="product-price"><?=$time?></th>   
                                    <th ><?=$reps?></th>
                                    <form method="POST">
                                        <th><button name="delete_cmt" value="<?=$id_cmt?>" style="border: none;"><img src="img/remove.png" style="max-width: 30px"></button></th>
                                    </form>
                                </tr>
<?php
        }
    }elseif ($ac == 9) { ?>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Người Dùng</th>
                                    <th>Họ Và Tên</th>
                                    <th class="product-price">Số Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th>Tài Khoản</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        $sql0 = "SELECT id_cus, name_cus, phone_cus, address_cus, user_cus FROM RQLtiWBNIL.customer;";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        $user = $name = $phone = $id_cus = $add ='';
        foreach($list_pro0 as $i => $arr){
            $id_cus = (int) $arr['id_cus'];
            $user = $arr['user_cus'];
            $phone = $arr['phone_cus'];
            $name = $arr['name_cus'];
            $add = $arr['address_cus'];
?>
                                <tr>
                                    <th><?=$i+1?></th>
                                    <th><?=$id_cus?></th>
                                    <form method="POST">
                                        <th><input type="text" name="name_cus" value="<?=$name?>"></th>
                                        <th><input type="text" name="phone_cus" value="<?=$phone?>" style="max-width: 120px"></th>
                                        <th><input type="text" name="address_cus" value="<?=$add?>"></th>
                                        <th><?=$user?></th>
                                        <th><button name="save_cus" value="<?=$id_cus?>" style="border: none;"><img src="img/updated.png" style="max-width: 30px"></button></th>
                                        <th><button name="delete_cus" value="<?=$id_cus?>" style="border: none;"><img src="img/remove.png" style="max-width: 30px"></button></th>
                                    </form>
                                </tr>
<?php
        }
    }elseif ($ac == 1) { ?>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản Phẩm</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th class="product-price">Đơn Giá</th>
                                    <th>Lượt Tương Tác</th> 
                                </tr>
                            </thead>
                            <tbody>
<?php
        $sql0 = "SELECT id_pro,  count(*) as cmt FROM RQLtiWBNIL.comments GROUP BY id_pro ORDER BY cmt DESC LIMIT $index;";
        $list_pro0 = executeResult($sql0);
        // var_dump($list_pro0);
        foreach($list_pro0 as $i => $arr){
            $id_pro = (int) $arr['id_pro'];
            $cmt = (int) $arr['cmt'];
            $name = $img = $price = '';
            if($id_pro <= 100) {
                $sql = "SELECT name_pc, img_pc, price_pc FROM RQLtiWBNIL.computer WHERE id_pc = $id_pro";
                $rs = executeSingleResult($sql);
                $name = $rs['name_pc'];
                $img = $rs['img_pc'];
                $price = (int) $rs['price_pc'];
            }elseif($id_pro > 100 && $id_pro <200 ) {
                $sql = "SELECT name_acc, img_acc, price_acc FROM RQLtiWBNIL.accessories WHERE id_acc = $id_pro";
                $rs = executeSingleResult($sql);
                $name = $rs['name_acc'];
                $img = $rs['img_acc'];
                $price = (int) $rs['price_acc'];
            }else{
                $sql = "SELECT name_com, img_com, price_com FROM RQLtiWBNIL.components WHERE id_com = $id_pro";
                $rs = executeSingleResult($sql);
                $name = $rs['name_com'];
                $img = $rs['img_com'];
                $price = (int) $rs['price_com'];
            }
?>
                                <tr>
                                    <th><?=$i+1?></th>
                                    <th><img src="<?=$img?>" style="max-height: 200px"></th>
                                    <th><?=$name?></th>
                                    <th class="product-price"><?=number_format($price)?></th>   
                                    <th style="width: 150px;"><?=$cmt?></th>
                                </tr>
<?php
        }
    }elseif ($ac == 10) { ?>
<?php
    $rsday = array();
    $sumrsday = 0;
    $rsdaypc = array();
    for ($i = 2; $i<=8; $i++) {
        $sqlday[$i] = "SELECT sum(total_pro) as day from RQLtiWBNIL.orderdetail od where id_ord in
        (select id_ord from RQLtiWBNIL.order where year(date_ord) = year(now()) and month(date_ord) = month(now()) and dayofweek(date_ord) = $i)";
        $day[$i] = executeSingleResult($sqlday[$i]);
        if ($day[$i]['day'] == NULL) {
            $rsday[$i] = 0;
        }else {
            $rsday[$i] = (int) $day[$i]['day'];
        }   
    }
    for ($i = 2; $i <= 8; $i++) {
        $sumrsday += $rsday[$i];
    }
    for ($i = 2; $i <= 8; $i++) {
        if($sumrsday == 0) {
            $rsdaypc[$i] = 0;
        }else {
            $rsdaypc[$i] = 100*$rsday[$i]/$sumrsday;
        }
    }
    $rsweek = array();
    $sumrsweek = 0;
    $rsweekpc = array();
    $sqlweek[0] = "SELECT sum(total_pro) as week from RQLtiWBNIL.orderdetail od where id_ord in
    (select id_ord from RQLtiWBNIL.order where year(date_ord) = year(now()) and month(date_ord) = month(now()) and day(date_ord) between 1 and 7)";
    $sqlweek[1] = "SELECT sum(total_pro) as week from RQLtiWBNIL.orderdetail od where id_ord in
    (select id_ord from RQLtiWBNIL.order where year(date_ord) = year(now()) and month(date_ord) = month(now()) and day(date_ord) between 8 and 14)";
    $sqlweek[2] = "SELECT sum(total_pro) as week from RQLtiWBNIL.orderdetail od where id_ord in
    (select id_ord from RQLtiWBNIL.order where year(date_ord) = year(now()) and month(date_ord) = month(now()) and day(date_ord) between 15 and 21)";
    $sqlweek[3] = "SELECT sum(total_pro) as week from RQLtiWBNIL.orderdetail od where id_ord in
    (select id_ord from RQLtiWBNIL.order where year(date_ord) = year(now()) and month(date_ord) = month(now()) and day(date_ord) between 22 and 31)";
    for ($i = 0; $i<4; $i++) {
        $week[$i] = executeSingleResult($sqlweek[$i]);
        if ($week[$i]['week'] == NULL) {
            $rsweek[$i] = 0;
        }else {
            $rsweek[$i] = (int) $week[$i]['week'];
        }   
    }
    // var_dump($rsweek);
    for ($i = 0; $i < 4; $i++) {
        $sumrsweek += $rsweek[$i];
    }
    for ($i = 0; $i < 4; $i++) {
        if($sumrsweek == 0) {
            $rsweekpc[$i] = 0;
        }else {
            $rsweekpc[$i] = 100*$rsweek[$i]/$sumrsweek;
        }
    }
    $rsyear = array();
    $sumrsyear = 0;
    $rsyearpc = array();
    for ($i = 1; $i<=12; $i++) {
        $sqlyear[$i] = "SELECT sum(total_pro) as year from RQLtiWBNIL.orderdetail od where id_ord in
        (select id_ord from RQLtiWBNIL.order where year(date_ord) = year(now()) and month(date_ord) = $i)";
        $year[$i] = executeSingleResult($sqlyear[$i]);
        if ($year[$i]['year'] == NULL) {
            $rsyear[$i] = 0;
        }else {
            $rsyear[$i] = (int) $year[$i]['year'];
        }   
    }
    for ($i = 1; $i<=12; $i++) {
        $sumrsyear += $rsyear[$i];
    }
    for ($i = 1; $i<=12; $i++) {
        if($sumrsyear == 0) {
            $rsyearpc[$i] = 0;
        }else {
            $rsyearpc[$i] = 100*$rsyear[$i]/$sumrsyear;
        }
    }
    // var_dump($rsyearpc);
?>
        <div class="diagram-week">
            <div class="diagram-week-box">
                <span>Số tiền</br>(Triệu)</span>
                <i class="fas fa-caret-up up-icon"></i>
                <ul class="diagram-week-list">
<?php
    for ($i = 2; $i <= 8; $i++) {
?>
                    <li class="diagram-week-item" style="--percent: <?=$rsdaypc[$i]?>%">
                        <span><?=$rsday[$i]/1000000?></span>
                    </li>
<?php
    }
?>
                </ul>
                <i class="fas fa-caret-right right-icon"></i>
            </div>

            <div class="diagram-week-box1">
                <ul class="diagram-week-list1">
                    <li class="diagram-week-item1">Thứ 2</li>
                    <li class="diagram-week-item1">Thứ 3</li>
                    <li class="diagram-week-item1">Thứ 4</li>
                    <li class="diagram-week-item1">Thứ 5</li>
                    <li class="diagram-week-item1">Thứ 6<li>
                    <li class="diagram-week-item1">Thứ 7</li>
                    <li class="diagram-week-item1">Chủ nhật </li>
                </ul>
                <span>Thứ</span>
            </div>
        </div>

            <!--Month-->
        <div class="diagram-month">


            <div class="diagram-month-box">
                <span>Số tiền</br>(Triệu)</span>
                <i class="fas fa-caret-up up-icon"></i>
                <ul class="diagram-month-list">
<?php
    for ($i = 0; $i < 4; $i++) {
?>
                    <li class="diagram-month-item" style="--percent: <?=$rsweekpc[$i]?>%">
                        <span><?=$rsweek[$i]/1000000?></span>
                    </li>
<?php
    }
?>
                </ul>
                <i class="fas fa-caret-right right-icon"></i>
            </div>

            <div class="diagram-month-box1">
                <ul class="diagram-month-list1">
                    <li class="diagram-month-item1">Tuần 1</li>
                    <li class="diagram-month-item1">Tuần 2</li>
                    <li class="diagram-month-item1">Tuần 3</li>
                    <li class="diagram-month-item1">Tuần 4</li>

                </ul>
                <span>Tuần</span>
            </div>

            
        </div>

            <!--year-->

        <div class="diagram-year">
            <div class="diagram-year-box">
                <span>Số tiền</br>(Triệu)</span>
                <i class="fas fa-caret-up up-icon"></i>
                <ul class="diagram-year-list">
<?php
    for ($i = 1; $i <= 12; $i++) {
?>
                    <li class="diagram-year-item" style="--percent: <?=$rsyearpc[$i]?>%">
                        <span><?=$rsyear[$i]/1000000?></span>
                    </li>
<?php
    }
?>
                </ul>
                <i class="fas fa-caret-right right-icon"></i>
            </div>

            <div class="diagram-year-box1">
                <ul class="diagram-year-list1">
                    <li class="diagram-year-item1">Tháng 1</li>
                    <li class="diagram-year-item1">Tháng 2</li>
                    <li class="diagram-year-item1">Tháng 3</li>
                    <li class="diagram-year-item1">Tháng 4</li>
                    <li class="diagram-year-item1">Tháng 5</li>
                    <li class="diagram-year-item1">Tháng 6</li>
                    <li class="diagram-year-item1">Tháng 7</li>
                    <li class="diagram-year-item1">Tháng 8</li>
                    <li class="diagram-year-item1">Tháng 9</li>
                    <li class="diagram-year-item1">Tháng 10</li>
                    <li class="diagram-year-item1">Tháng 11</li>
                    <li class="diagram-year-item1">Tháng 12</li>
                </ul>
                <span>Tháng</span>
            </div>
        </div>

<?php
    }
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
        <div class="footer-top-area" style="margin-top: 20px;">
        <div class="zigzag-bottom">
        </div>
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
    <script src="js/shop.js"></script>
    <script>
        var a = document.getElementsByName('cmt');
        console.log(a[0]);
        // for(var i=0; i<a.length; i++) {
            a[0].setAttribute('placeholder', 'Chưa có ghi chú');
        // }
    </script>
  </body>
</html>