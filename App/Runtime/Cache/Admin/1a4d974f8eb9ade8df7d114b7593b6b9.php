<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>维修后台</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="__PUBLIC__/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/assets/css/style.css" rel="stylesheet">
    <link href="__PUBLIC__/assets/css/style-responsive.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--自己的js文件-->
    <script src="__PUBLIC__/js/login.js"></script>
    <script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
    <script src="__PUBLIC__/layer/layer.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/css/style.css">
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>维修后台</b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="javascript:void(loginout('<?php echo U(GROUP_NAME."/Index/loginout");?>'))" >退出登录</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><img src="__PUBLIC__/assets/img/ui-sam.jpg" class="img-circle" width="60"></p>
                <h5 class="centered">菜单栏</h5>

                <li class="mt">
                    <a href="<?php echo U(GROUP_NAME.'/Index/index');?>" >
                        <i class="fa fa-dashboard"></i>
                        <span>主页</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="<?php echo U(GROUP_NAME.'/Index/haveRepair');?>" >
                        <i class="fa fa-cogs"></i>
                        <span>已维修好</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="<?php echo U(GROUP_NAME.'/Index/allRepair');?>" >
                        <i class="fa fa-cogs"></i>
                        <span>所有预约</span>
                    </a>
                </li>

                <!--根据权限显示节点-->
                <?php if($power == 1): ?><li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-th"></i>
                            <span>管理员管理</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?php echo U(GROUP_NAME.'/Char/index');?>">视图</a></li>
                            <li class="sub-menu"><a href="<?php echo U(GROUP_NAME.'/Index/trash');?>" >回收站</a></li>
                            <li><a  href="<?php echo U(GROUP_NAME.'/Admin/index');?>">管理员列表</a></li>

                        </ul>
                    </li><?php endif; ?>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

<!--script for this page-->

<!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-md-12">
				<div class="content-panel">
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-angle-right"></i> 未处理维修</h4>
						<hr>
						<thead>
						<tr>
							<th><i class="fa fa-bullhorn"></i>名字</th>
							<th class="hidden-phone"><i class="fa fa-question-circle"></i>联系方式</th>
							<th><i class="fa fa-bookmark"></i>取件时间</th>
							<th><i class=" fa fa-edit"></i>处理状态</th>
                            <th>处理人</th>
							<th>宿舍</th>
							<th>编辑</th>
						</tr>
						</thead>
						<tbody>
						<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
								<td><?php echo ($v["name"]); ?></td>
								<td class="hidden-phone"><?php echo ($v["link"]); ?></td>
								<td><?php echo (date("m月d日",$v["time"])); ?></td>
								<td>
                                    <span class="label label-info label-mini handle">
                                        <?php if($v["handle"] == 1): ?>已处理
                                            <?php else: ?>
                                            未处理<?php endif; ?>
                                    </span>
								</td>
                                <td class="admin"><?php echo ($v["admin"]); ?></td>
								<td><?php echo ($v["dept"]); ?></td>
								<td>
									<?php if($v["handle"] == 1): ?><button class="btn btn-success btn-xs" onclick="update(<?php echo ($v["id"]); ?>,1,this,'<?php echo U(GROUP_NAME."/Index/handle");?>')">更改处理</button>
										<?php else: ?>
										<button class="btn btn-success btn-xs" onclick="update(<?php echo ($v["id"]); ?>,0,this,'<?php echo U(GROUP_NAME."/Index/handle");?>')">更改处理</button><?php endif; ?>
									<button class="btn btn-primary btn-xs" onclick="layer1('<?php echo U(GROUP_NAME."/Index/detail",array('id' => $v["id"]));?>')">详情</button>
									<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o " onclick="del(<?php echo ($v["id"]); ?>,this,'<?php echo U(GROUP_NAME."/Index/del");?>')"></i></button>
								</td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
                    <div class="page"><?php echo ($page); ?></div>
				</div><!-- /content-panel -->
			</div><!-- /col-md-12 -->
		</div><!-- /row -->

	</section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->



<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        2016 - libmill
        <a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="__PUBLIC__/assets/js/jquery.js"></script>
<script src="__PUBLIC__/assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="__PUBLIC__/assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="__PUBLIC__/assets/js/jquery.scrollTo.min.js"></script>
<script src="__PUBLIC__/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="__PUBLIC__/assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="__PUBLIC__/assets/js/common-scripts.js"></script>
</body>
</html>