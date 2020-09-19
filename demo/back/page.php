<?php
session_start();
header("Content-type:text/html;charset=utf-8");
$page = isset($_GET['page']) ? $_GET['page'] : 1;   //接收页码
$page = !empty($page) ? $page : 1;

$conn = mysqli_connect('localhost', 'root', 'root', 'forum');
mysqli_set_charset($conn, 'utf8');

$perpage = 10;  //每页显示的数据个数

//最大页数和总记录数
$sql = "SELECT count(*) FROM forum_post";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$total = $row[0];   //获取记录条数
$total_page = ceil($total / $perpage);  //向上取整数，计算出页码数



//当下一页数大于最大页数
$page = $page > $total_page ? $total_page : $page;
//分页设置初始化
$start = ($page - 1) * $perpage;
$sql = "SELECT * FROM forum_post ORDER BY id DESC limit $start, $perpage";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
?>



