<?php
session_start();
header("Content-type:text/html;charset=utf-8"); //设置网页编码
$conn = mysqli_connect('localhost','root','root','forum'); //连接数据库
mysqli_set_charset($conn,'utf8'); //设定字符集
$phone = $_POST['phone'];
$password = $_POST['password'];
if($phone == ''){
    echo "<script>console.log('请输入账户');location='".$_SERVER['HTTP_REFERER']."'</script>";
    exit();
}
if($password == ''){
    echo "<script>console.log('请输入密码');location='".$_SERVER['HTTP_REFERER']."'</script>";
    exit();
}


$sql = "SELECT * FROM forum_user WHERE phone=$phone";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if($row) {
    if($password != ($row['password']) || $phone != ($row['phone'])) {
        echo "<script>alert('密码错误');location='../index.php'</script>";
        exit;
    }
    else {
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['islogin'] = true;
        echo "<script>alert('登录成功');location='../index.php'</script>";
    }
}
else {
    echo "<script>alert('您输入的用户不存在');location='../index.php'</script>";
    exit;
}

?>
