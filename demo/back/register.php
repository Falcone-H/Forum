<?php
session_start();
header("Content-type:text/html;charset=utf-8");    //设置编码
$conn = mysqli_connect('localhost','root','root','forum');
mysqli_set_charset($conn, 'utf8');
$phone = $_POST['reg_phone'];
$password = md5($_POST['reg_password']);
$email = trim($_POST['reg_email']); //移除两侧空白字符
$username = $_POST['reg_username'];
$reg_time = date("Y-m-d H:i:s");
$sql = "SELECT * FROM forum_user WHERE phone=$phone";
$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
if($row) {
    echo "<script>alert('该手机号已被注册');location='../login.html'</script>";
}
else {
    $sql = "INSERT forum_user (phone,password,email,username,reg_time) VALUES ('$phone','$password','$email','$username','$reg_time')";
    $result = mysqli_query($conn, $sql);
    $_SESSION['phone'] = $phone;
    $_SESSION['username'] = $username;
    $_SESSION['islogin'] = 1;
    echo "<script>alert('注册成功');location='../index.php'</script>";
}