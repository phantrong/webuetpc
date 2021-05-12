<?php
    // var_dump($_POST);
    // var_dump($_GET['action']);
    // var_dump($pass_cus); exit;
    $error = false;
    $sucess = false;
    if (!empty($_GET)) {
        if(empty($_POST['name_cus'])) {
            $error = "Bạn chưa nhập Họ Và Tên!";
        }
        elseif(empty($_POST['phone_cus'])) {
            $error = "Bạn chưa nhập Số Điện Thoại!";
        }
        elseif(empty($_POST['address_cus']) || strlen($_POST['address_cus'])<10) {
            $error = "Bạn chưa nhập Địa Chỉ hoặc Địa Chỉ của bạn chưa cụ thể!";
        }
        elseif(empty($_POST['user_cus']) || strlen($_POST['user_cus'])<6 || strlen($_POST['pass_cus'])>24) {
            $error = "Bạn chưa nhập Tên Đăng Nhập hoặc chưa đủ yêu cầu!";
        }
        elseif(empty($_POST['pass_cus']) || strlen($_POST['pass_cus'])<6 || strlen($_POST['pass_cus'])>16) {
            $error = "Bạn chưa nhập Mật Khẩu hoặc chưa đủ yêu cầu!";
        }
        elseif(empty($_POST['pass_check']) || $_POST['pass_cus'] != $_POST['pass_check']) {
            $error = "Bạn chưa nhập Mật Khẩu hoặc chưa đủ yêu cầu!";
        }
        if($error == false) {
            $sucess = true;
        }
    }
?>
<html>
<head>
<?php
// var_dump(empty($error)); exit;
if ($sucess) {
        
        require_once('dbhelp.php');
        $pass_cus = password_hash($_POST['pass_cus'], PASSWORD_BCRYPT);
        // var_dump($pass_cus); exit;
        $sql = "INSERT INTO RQLtiWBNIL.customer (name_cus, phone_cus, address_cus, user_cus, pass_cus) VALUE ('".$_POST['name_cus']."', '".$_POST['phone_cus']."', '".$_POST['address_cus']."', '".$_POST['user_cus']."', '$pass_cus')";
        execute($sql);
        // unset($_POST);
?>
        <div style="text-align: center; height: 500px;">
            <img src="img/checked.png" style="max-height: 150px">
            <h1>Đăng Kí Thành Công!</h1>
            <a href="login.php" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Đăng Nhập
                </button>
            <a>
        </div>
<?php
} else {
?>
<title>Đăng Kí Tài Khoản</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
<body>
    <div class="registerbox" style="height: 700px;">
    <img src="img/avatar.png" class="avatar">
        <h1>Đăng Kí Tài Khoản</h1>
        <form action="register.php?action=submit" method="POST">
            <p>Họ và Tên</p>
            <input type="text" name="name_cus" placeholder="Nhập đầy đủ họ tên">
            <p>Số Điện Thoại</p>
            <input type="text" name="phone_cus" placeholder="Nhập số điện thoại">
            <p title="Yêu Cầu Địa Chỉ phải cụ thể!">Địa Chỉ</p>
            <input type="text" name="address_cus" placeholder="Nhập địa chỉ giao hàng">
            <p title="Yêu Cầu độ dài ít nhất 6 kí tự và nhiều nhất 16 kí tự!">Tên Đăng Nhập</p>
            <input type="text" name="user_cus" placeholder="Nhập tên người dùng">
            <p title="Yêu Cầu độ dài ít nhất 6 kí tự và nhiều nhất 24 kí tự!">Mật Khẩu</p>
            <input type="password" name="pass_cus" placeholder="Nhập mật khẩu">
            <p>Nhập lại Mật Khẩu</p>
            <input type="password" name="pass_check" placeholder="Nhập lại mật khẩu">
            <h6><?=$error?></h6>
            <input type="submit" name="" value="Đăng Kí" style="margin-bottom: 10px">
            <a href="login.php">Đã có tài khoản?</a>
        </form>
        
    </div>
<?php
}
?>
</body>
</head>
</html>