<?php
include 'back/page.php';
session_start();
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
	  
		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">推荐</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分类 <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">C</a></li>
		            <li><a href="#">C++</a></li>
		            <li><a href="#">Java</a></li>
		            <li><a href="#">PHP</a></li>
					<li><a href="#">Python</a></li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li>
                  <?php
                  if($_SESSION['username'] == ""){
                  ?>
                  <li><a href="login.html">Login</a></li>
                  <?php
                  }
                  else{
                  ?>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="#">个人中心</a></li>
                              <li><a href="#">退出</a></li>
                          </ul>
                      </li>
                  <?php } ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<div class="col-md-2"></div>
		<div class="col-md-7">

			<div class="page-header">
				<h1>最新帖子 
					<small>Subtext for header</small>
					<a href="post.html" class="btn btn-primary" style="float: right; margin-top: 15px;">发帖</a>
				</h1>
			</div>

			
			<?php
            if($num > 0){
                while($row = mysqli_fetch_array($result)) {
            ?>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <a href="content.php?id=<?php echo $row['id'] ?>"><h3 class="panel-title"><?php echo $row['title'] ?></h3></a>
			  </div>
			  <div class="panel-body">
			    <?php echo $row['description'] ?>
                  <br><br>
                  <small><?php echo $row['release_time'] ?></small>
			  </div>
			</div>
            <?php
                }
            }
            ?>

			<div style="text-align: center;">
				<nav aria-label="Page navigation">
				  <ul class="pagination">
					<li>
					  <a href="<?php echo "$_SERVER[PHP_SELF]?page=" . ($page - 1) ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>

                      <?php
                      for($i = 1; $i <= $total_page; $i++){
                          if ($i == $page) {    //当前页为显示页时加背景颜色
                              echo "<li class='active'><a href='$_SERVER[PHP_SELF]?page=$i'>$i</a></li>";
                          } else {
                              echo "<li><a href='$_SERVER[PHP_SELF]?page=$i'>$i</a></li>";
                          }
                      }
                      ?>

					<li>
					  <a href="<?php echo "$_SERVER[PHP_SELF]?page=" . ($page + 1) ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
		</div>
		<div class="col-md-2" style="margin-top: 12px;">
			<div class="page-header">
				<h3>阅读排行</h3>
			</div>
			<div class="list-group">
				<a href="#" class="list-group-item active">
					<span class="badge">14</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">13</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">12</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">11</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">10</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">9</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">8</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">7</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">6</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">5</span>Dapibus ac facilisis in
				</a>
				<a href="#" class="list-group-item">
					<span class="badge">4</span>Dapibus ac facilisis in
				</a>
			</div>
		</div>
		

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
  </body>
</html>