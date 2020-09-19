<?php
header("Content-type:text/html;charset=utf-8"); //设置编码
$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];
$release_time = date("Y-m-d H:i:s");

$conn = mysqli_connect('localhost','root','root','forum');
mysqli_set_charset($conn,'utf8');


$sql = "INSERT forum_post (title, description, content, release_time) VALUES ('$title', '$description', '$content', '$release_time')";
$result = mysqli_query($conn, $sql);
if($result) {
    echo "<script>alert('发布成功');location='../index.php'</script>";
}
else {
    echo "<script>alert('发布失败')</script>";
}
