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
    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
<script src="__PUBLIC__/js/echarts.js"></script>
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>数据表单</h3>
            <!-- page start-->
            <div id="morris">
                <div class="row mt">
                    <div class="col-lg-6">
                        <div class="content-panel" id="month" style="width:892px;height: 436px;" >
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-panel" id="quarter" style="width:892px;height: 436px;">

                        </div>
                    </div>
                </div>
                <div class="row mt">
                    <div class="col-lg-6">
                        <div class="content-panel" id="dept" style="width: 892px;height: 436px;">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content-panel" id="handle" style="width:892px;height: 436px;">

                        </div>
                    </div>
                </div>

            </div>
            <!-- page end-->
        </section>
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
<script>
    //月份数据显示
    var month = echarts.init(document.getElementById('month'));
    month.setOption({
        title: {
            text: '月份提交维修'
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['趋势','数量']
        },
        xAxis: {
            data: []
        },
        yAxis: {},
        series: [{
            name: '数量',
            type: 'bar',
            data: []
        },
            {
                name:'趋势',
                type:'line',
                data:[]
            }
        ]
    });
    month.showLoading();
    $.get("<?php echo U(GROUP_NAME.'/Char/showMonth');?>").done(function (data) {
        month.hideLoading();
        //填入数据
        month.setOption({
            xAxis: {
                data: data.x
            },
            series: [{
                // 根据名字对应到相应的系列
                name: '数量',
                data: data.y
            },
                {
                    name:"趋势",
                    data:data.y
                }
            ]
        });
    });


    //季度数据显示
    var quartry = echarts.init(document.getElementById('quarter'));
    quartry.setOption({
        title:{
            text:"季度提交"
        },
        tooltip:{
            trigger: 'axis'
        },
        legend:{
            data:['数量','趋势']
        },
        xAxis:{
            data:[]
        },
        yAxis:{},
        series:[{
            name:"数量",
            type:"bar",
            data:[]
        },{
            name:"趋势",
            type:"line",
            data:[]
        }
        ]
    });
    quartry.showLoading();
    $.get("<?php echo U(GROUP_NAME.'/Char/showQuarter');?>").done(function (resule) {
        quartry.hideLoading();
        quartry.setOption({
            xAxis:{
                data: resule.x
            },
            series:[{
                name:"数量",
                data: resule.y
            },{
                name:"趋势",
                data:resule.y
            }]
        });
    });

    //宿舍分析
    var dept = echarts.init(document.getElementById('dept'));
    dept.setOption({
        title:{
          text:"宿舍分布"
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series : [
            {
                name: '宿舍分布',
                type: 'pie',
                radius: '55%',
                data:[]
            }
        ]
    });
    dept.showLoading();
    $.get("<?php echo U(GROUP_NAME.'/Char/showDept');?>").done(function (result) {
        dept.hideLoading();
        dept.setOption({
            series:[{
                data:result
            }]
        })
    });

    //处理人分析
    var handle = echarts.init(document.getElementById('handle'));
    handle.setOption({
        title:{
          text:'管理员维修比例'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        series:[{
            name:"处理人分布",
            type:"pie",
            radius:"55%",
            data:[]
        }]
    });
    handle.showLoading();
    $.get("<?php echo U(GROUP_NAME.'/Char/showHandle');?>").done(function (result) {
        handle.hideLoading();
        handle.setOption({
            series:[{
                data:result
            }]
        })
    })
</script>

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