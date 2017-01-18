<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>登录 - 维修管理后台</title>

    <!-- Bootstrap core CSS -->
    <link href="__PUBLIC__/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="__PUBLIC__/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="__PUBLIC__/assets/css/style.css" rel="stylesheet">
    <link href="__PUBLIC__/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- js placed at the end of the document so the pages load faster -->
      <script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
  <script src="__PUBLIC__/assets/js/bootstrap.min.js"></script>

	  <!--自己的js文件-->
      <script src="__PUBLIC__/js/login.js"></script>
      <script src="__PUBLIC__/layer/layer.js"></script>
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">

		      <form	method="post" class="form-login" action="<?php echo U('Login/login');?>">
		        <h2 class="form-login-heading">维修管理后台</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="用户名" autofocus="autofocus" name="username">
		            <br>
		            <input type="password" class="form-control" placeholder="登录密码" name="password">
                    <br>
		            <button class="btn btn-theme btn-block" type="button" id="login">
                        <i class="fa fa-lock"></i> 登 录
                    </button>
                    <script>

                    </script>
		            <hr>

		            <div class="login-social-link centered">
		            <p>管理后台</p>
		            </div>
		            <div class="registration">
		                libmill.com
		            </div>

		        </div>
		      </form>

	  	</div>
	  </div>



    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="__PUBLIC__/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("__PUBLIC__/assets/img/login-bg.jpg", {speed: 500});
        //登录验证
        $("#login").click(function () {
            var username = $("input[name=username]").val();
            var password = $("input[name=password]").val();
            var url = "<?php echo U(GROUP_NAME.'/Login/login');?>";

            if (username == ""){
                layer.tips('请填写用户名', 'input[name=username]',{tips:1});
            }else if(password == ""){
                layer.tips("请填写密码","input[name=password]",{tips:1});
            }else{
                layer.open({
                    type:3
                });
                $.ajax({
                    type:"POST",
                    url:url,
                    data:{"username":username,"password":password},
                    success:function (result) {
                        layer.closeAll();
                        if(!result.check_username){
                            layer.tips("用户名不存在","input[name=username]",{tips:1});
                            $("input[name=username]").focus();
                        }else if(!result.check_password){
                            layer.tips("密码错误","input[name=password]",{tips:1});
                            $("input[name=password]").focus();
                        }else{
                            window.location.href="/repair3.1/index.php/Admin/Index/index";
                        }
                    }

                });
            }
        });
    </script>


  </body>
</html>