<?php
header("Content-type:text/html;charset=utf-8"); //设置编码
$conn = mysqli_connect('localhost','root','root','forum');
mysqli_set_charset($conn, 'utf8');
$id = $_GET['id'];
$sql = "select * from forum_post where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <div class="panel panel-default" style="margin-top: 10px">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $row['title'] ?></h3>
            </div>
            <div class="panel-body">
                <?php echo $row['description'] ?>
            </div>
            <hr>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td width="200px" style="text-align: center; height: auto;">
                            <a href="#"><img src="src/8.jpg" width="100px" height="100px"></a>
                            <p style="text-align: center"><?php echo $row['author'] ?></p>
                        </td>
                        <td style="height: auto">
                            <div style="min-height: 230px">
                                <div style="min-height: 200px; height: auto">
                                    <?php echo $row['content'] ?>
                                </div>
                                <div style="position: absolute; right: 50px;">
                                    <button class="btn btn-primary">赞</button>
                                    <button class="btn btn-danger">踩</button>
                                    <small><?php echo $row['release_time'] ?></small>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <form method="post" action="#">
                    <div class="form-group" style="padding:10px; margin: 0px">
                        <textarea class="form-control" placeholder="请输入你的评论" rows="10" style="resize: none;"></textarea>
                    </div>
                    <button class="btn btn-primary" style="margin-left: 10px; margin-bottom: 10px">提交</button>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-2"></div>


<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>