<?php
    session_start();
    require_once('dbhelp.php');
    $error = false;
    $sucess = false;
    // var_dump($_GET['action'] == 'logout');
    if (!empty($_GET)) {
        if ($_GET['action'] == 'submit') {
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            // $sql = "SELECT pass_cus FROM kDAbiPc3dp.customer WHERE user_cus = '$user'";
            $sql = "SELECT pass_cus FROM web_maytinh.customer WHERE user_cus = '$user'";
            $rs = executeSingleResult($sql);
            // var_dump($rs); exit;
            if (empty($rs)) {
                $error = "Tài Khoản không tồn tại!";
            } else {
                $pass_hash = $rs['pass_cus'];
                if (password_verify($pass,$pass_hash)) {
                    $sucess = true;
                } else {
                    $error = 'Mật Khẩu không chính xác!';
                }
            }
        }
        elseif ($_GET['action'] == 'logout') {
            $_SESSION['login'] = array();
            echo("<script>location.href = 'login.php';</script>");
        }
        // var_dump($rs); exit;
    }
?>

<html>
<head>
<?php
// var_dump(empty($error)); exit;
if ($sucess) {
    // $sql = "SELECT * FROM kDAbiPc3dp.customer WHERE user_cus = '$user'";
    $sql = "SELECT * FROM web_maytinh.customer WHERE user_cus = '$user'";
    $rs = executeSingleResult($sql);
    $_SESSION['login']['user'] = $rs;
    // $_SESSION['login']['url'] = '';
    // var_dump($rs); exit;
    // $url = $_SESSION['login']['url'];
    // var_dump($url); exit;
    echo("<script>location.href = 'index.php';</script>");
} else {
?>
<title>Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
<body>
    <div class="loginbox">
    <img src="img/avatar.png" class="avatar">
        <h1>Đăng Nhập</h1>
        <form action="login.php?action=submit" method="POST">
            <p>Tên Đăng Nhập</p>
            <input type="text" name="user" placeholder="Nhập tên người dùng">
            <p>Mật Khẩu</p>
            <input type="password" name="pass" placeholder="Nhập mật khẩu">
            <h6><?=$error?></h6>
            <input type="submit" name="" value="Đăng Nhập">
            <a href="pass.php">Quên Mật Khẩu?</a><br>
            <a href="register.php">Chưa có tài khoản?</a></br>
            <a href="loginadmin.php">Bạn là quản trị viên?</a>
        </form>
        
    </div>
<?php
}
?>
</body>
</head>
</html>