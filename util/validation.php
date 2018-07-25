<?php
/**
 * User: Lucien Shui
 * Date: 2018/7/26
 * Time: 0:47
 */
$url = '';
if (isset($_POST['id'])) {
    $password_right = $_POST['password_right'];
    $password_user = $_POST['password_user'];
    if ($password_right == $password_user) {
        session_start();
        $_SESSION["{$_POST['id']}"] = $_POST['password_right'];
        $url = 'p/' . $_POST['id'];
    } else echo "<script> alert('密码错误') </script>";
}
header("Refresh:0;url=/" . $url);
?>