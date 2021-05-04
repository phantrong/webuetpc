<?php
    session_start();
    require_once('dbhelp.php');
    if (!isset($_SESSION['pass'])) {
        $_SESSION['pass'] = array();
    }
    $error = false;
    $sucess = 0;
    // var_dump($_GET);
    if (!empty($_GET)) {
        if($_GET['action'] == 'submit') {
            $user = $_POST['user'];
            $phone = $_POST['phone'];
            $sql = "SELECT phone_cus FROM web_maytinh.customer WHERE user_cus = '$user'";
            $rs = executeSingleResult($sql);
            if (empty($rs)) {
                $error = "Tài Khoản không tồn tại!";
            } else {
                if ($phone  == $rs['phone_cus']) {
                    $sucess = 1;
                    $_SESSION['pass'][0] = $user;
                } else {
                    $error = 'Số điện thoại không chính xác!';
                }
            }
            // var_dump($rs); exit;
        }
        elseif($_GET['action'] == 'save') {
            // var_dump($_GET['action']); exit;    
            if(empty($_POST['pass_cus']) || strlen($_POST['pass_cus'])<6 || strlen($_POST['pass_cus'])>24) {
                $error = "Bạn chưa nhập Mật Khẩu hoặc chưa đủ yêu cầu!";
                $sucess = 1;
            }
            elseif(empty($_POST['pass_check']) || $_POST['pass_cus'] != $_POST['pass_check']) {
                $error = "Bạn chưa nhập Mật Khẩu hoặc chưa đủ yêu cầu!";
                $sucess = 1;
            }else {
                $pass_cus = $_POST['pass_cus'];
                $pass_hash = password_hash($pass_cus, PASSWORD_BCRYPT);
                $user_check = $_SESSION['pass'][0];
                // var_dump($user_check); exit;
                $sql = "UPDATE web_maytinh.customer SET pass_cus = '$pass_hash' WHERE user_cus = '$user_check';";
                execute($sql);
                $sucess = 3;
            }
        }
        elseif($_GET['action'] == 'repass') {
            $sucess = 2;
        }elseif($_GET['action'] == 'pass') {
                $user_check = $_SESSION['login']['user']['user_cus'];
                $pass = $_POST['pass'];
                $sql = "SELECT pass_cus FROM web_maytinh.customer WHERE user_cus = '$user_check'";
                $rs = executeSingleResult($sql);
                // var_dump($rs); exit;
                $pass_hash = $rs['pass_cus'];
                if (!password_verify($pass,$pass_hash)) {
                    $error = "Mật Khẩu không chính xác!";
                    $sucess = 2;
                }
                elseif(empty($_POST['pass_cus']) || strlen($_POST['pass_cus'])<6 || strlen($_POST['pass_cus'])>24 ) {
                    $error = "Bạn chưa nhập Mật Khẩu hoặc chưa đủ yêu cầu!";
                    $sucess = 2;
                }
                elseif(empty($_POST['pass_check']) || $_POST['pass_cus'] != $_POST['pass_check']) {
                    $error = "Bạn chưa nhập Mật Khẩu hoặc chưa đủ yêu cầu!";
                    $sucess = 2;
                }else {
                    $pass_cus = $_POST['pass_cus'];
                    $pass_hash = password_hash($pass_cus, PASSWORD_BCRYPT);
                    // var_dump($pass_cus); exit;
                    $sql = "UPDATE web_maytinh.customer SET pass_cus = '$pass_hash' WHERE user_cus = '$user_check';";
                    execute($sql);
                    $sucess = 3;  
                }
        }
    }
    // var_dump($sucess);
?>

<html>
<head>
<?php
// var_dump(empty($error)); exit;
if ($sucess == 3) {
?>
    <div style="text-align: center; height: 500px;">
            <img src="img/checked.png" style="max-height: 150px">
            <h1>Đổi Mật Khẩu Thành Công!</h1>
            <a href="login.php" style="color: white">
                <button style="background-color: rgb(52, 207, 86);border-radius: 20px; border-color: white;  width: 100px;text-align: center;height: 40px;position: relative;">
                Đăng Nhập
                </button>
            <a>
    </div>
<?php
}
elseif ($sucess == 1) {
?>
    <title>Đổi Mật Khẩu</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    <body>
        <div class="loginbox">
        <img src="img/avatar.png" class="avatar">
            <h1>Đổi Mật Khẩu</h1>
            <form action="pass.php?action=save" method="POST">
                <p title="Yêu cầu độ dài ít nhất 6 kí tự! và nhiều nhất 24 kí tự!">Mật Khẩu Mới</p>
                <input type="password" name="pass_cus" placeholder="Nhập mật khẩu mới">
                <p>Xác Nhận Mật Khẩu Mới</p>
                <input type="password" name="pass_check" placeholder="Nhập lại mật khẩu">
                <h6 class="msg"><?=$error?></h6>
                <input type="submit" name="" value="Xác Nhận">
            </form>
        </div>
<?php
    // echo("<script>location.href = 'login.php';</script>");
} elseif($sucess == 2) {
?>
    <title>Đổi Mật Khẩu</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    <body>
        <div class="loginbox" style="height: 450px;">
        <img src="img/avatar.png" class="avatar">
            <h1>Đổi Mật Khẩu</h1>
            <form action="pass.php?action=pass" method="POST">
                <p>Mật Khẩu Hiện Tại</p>
                <input type="password" name="pass" placeholder="Nhập mật khẩu hiện tại">
                <p title="Yêu cầu độ dài ít nhất 6 kí tự và nhiều nhất 24 kí tự!">Mật Khẩu Mới</p>
                <input type="password" name="pass_cus" placeholder="Nhập mật khẩu mới">
                <p>Xác Nhận Mật Khẩu Mới</p>
                <input type="password" name="pass_check" placeholder="Nhập lại mật khẩu">
                <h6 class="msg"><?=$error?></h6>
                <input type="submit" name="" value="Xác Nhận">
            </form>
        </div>
<?php
} else {
?>
    <title>Quên Mật Khẩu</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    <body>
        <div class="loginbox">
        <img src="img/avatar.png" class="avatar">
            <h1>Tìm Lại Mật Khẩu</h1>
            <form action="pass.php?action=submit" method="POST">
                <p>Tên Đăng Nhập</p>
                <input type="text" name="user" placeholder="Nhập tên người dùng">
                <p>Số Điện Thoại Đăng Kí</p>
                <input type="text" name="phone" placeholder="Nhập số điện thoại">
                <h6 class="msg"><?=$error?></h6>
                <input type="submit" name="" value="Tìm Lại">
                <a href="register.php">Chưa có tài khoản?</a>
            </form>
        </div>
<?php
}
?>
</body>
</head>
</html>