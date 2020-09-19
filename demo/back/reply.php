<?php
header("Content-type:text/html;charset=utf-8"); //设置编码
$id=$_GET['id'];
$reply_author=$_POST['reply_author'];
$reply=$_POST['reply'];
$reply_time=date("Y-m-d H:i:s");
// 创建连接
$conn = mysqli_connect("localhost", "root", "root", "forum");
mysqli_set_charset($conn,'utf8'); //设定字符集

//$sql="update tiopic set reply_author='$reply_author',reply='$reply',reply_time='$reply_time' WHERE id='$id'";
$que=mysqli_query($conn,$sql);
if($que){
    echo "<script>alert('回复成功');location.href='thread.php?id=1';</script>";
}else{
    echo "<script>alert('你的回复好像有点小问题.....');location.href='thread.php';</script>";
}
?>