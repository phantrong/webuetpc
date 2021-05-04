<?php
// for develop
$db = array (
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'Trong15102001',
    'dbname' => 'web_maytinh'
);
// for host
// $db = array (
//     'server' => 'remotemysql.com',
//     'username' => 'kDAbiPc3dp',
//     'password' => 'bTRRNViojv',
//     'dbname' => 'kDAbiPc3dp'
// );

$conn = mysqli_connect($db['server'], $db['username'], $db['password'], $db['dbname']);

if(!$conn) {
    die('Kết nối không thành công'. mysqli_connect_error($conn));
}
echo 'Kết Nối Thành Công';