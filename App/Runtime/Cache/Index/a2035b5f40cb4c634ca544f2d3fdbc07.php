<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//Dtr XHTML 1.0 thansitional//EN" "http://www.w3.org/th/xhtml1/Dtr/xhtml1-thansitional.dtr">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="device-width">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css"/>
    <title>维修预约</title>
    <script src="__PUBLIC__/Js/jquery-3.1.1.min.js"></script>
    <script src="__PUBLIC__/layer/mobile/layer.js"></script>

    <!--mobiscroll-->
    <script src="__PUBLIC__/mobiscroll/js/mobiscroll.core-2.5.2.js" type="text/javascript"></script>
    <script src="__PUBLIC__/mobiscroll/js/mobiscroll.core-2.5.2-zh.js" type="text/javascript"></script>

    <link href="__PUBLIC__/mobiscroll/css/mobiscroll.core-2.5.2.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/mobiscroll/css/mobiscroll.animation-2.5.2.css" rel="stylesheet" type="text/css" />
    <script src="__PUBLIC__/mobiscroll/js/mobiscroll.datetime-2.5.1.js" type="text/javascript"></script>
    <script src="__PUBLIC__/mobiscroll/js/mobiscroll.datetime-2.5.1-zh.js" type="text/javascript"></script>

    <!-- S 可根据自己喜好引入样式风格文件 -->
    <script src="__PUBLIC__/mobiscroll/js/mobiscroll.android-ics-2.5.2.js" type="text/javascript"></script>
    <link href="__PUBLIC__/mobiscroll/css/mobiscroll.android-ics-2.5.2.css" rel="stylesheet" type="text/css" />
    <!-- E 可根据自己喜好引入样式风格文件 -->

    <style>
        /*去除小三角*/
        select{
            -webkit-appearance: none;
            -webkit-tap-highlight-color: #fff;
            outline: 0;
        }
    </style>
</head>
<body>
<div class="main">
    <div class="head">
        <img src="__PUBLIC__/Images/维修单1.png"/>
        <div class="png">
            <img src="__PUBLIC__/Images/维修单3.png"/>
        </div>
        <div class="content">
            <form action="<?php echo U(MODUEL_NAME.'/Index/addRepair');?>" method="post">
                <table style="width: 100%;float: left;">
                    <tr class="table">
                        <th width='30%'>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th>
                        <td width='70%'><input type="text" class="inputs" name="name" placeholder="你的大名" /></td>
                    </tr>
                    <tr class="table">
                        <th>联系方式：</th>
                        <td><input type="tel" class="inputs" name="link" placeholder="长号或者短号" /></td>
                    </tr>
                    <tr class="table">
                        <th >宿&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;舍：</th>
                        <td>
                            <select name="dept" id="dept" class="inputs">
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                                <option value="C3">C3</option>
                                <option value="C4">C4</option>
                                <option value="C5">C5</option>
                                <option value="C6">C6</option>
                                <option value="C7">C7</option>
                                <option value="C8">C8</option>
                                <option value="C9">C9</option>
                                <option value="C10">C10</option>
                                <option value="C11">C11</option>
                                <option value="C12">C12</option>
                                <option value="C13">C13</option>
                                <option value="C14">C14</option>
                                <option value="C15">C15</option>
                                <option value="C16">C16</option>
                                <option value="C17">C17</option>
                                <option value="C18">C18</option>
                                <option value="C19">C19</option>
                                <option value="C20">C20</option>
                                <option value="C21">C21</option>

                            </select>
                        </td>
                    </tr>
                    <tr class="table">
                        <th>预约时间：</th>
                        <td><input type="text" class="inputs" name="time" placeholder="请选择送修时间" id="time" /></td>
                    </tr>
                    <tr class="table">
                        <td><div class="input"><div class="word">问题详情：</div>
                            <textarea class="input" rows="3" cols="50" name="desc" placeholder="描述电脑问题"></textarea></div></td>
                    </tr>
                    <tr class="table">
                        <th><input class="post" type="button" value="" id="order"/></th>
                    </tr>
                </table>
            </form>

        </div>
    </div>

</div>
<script>
    //异步提交
    $("#order").click(function () {
        var time = $("input[name=time]").val();
        var name = $("input[name=name]").val();
        var link = $("input[name=link]").val();
        var desc = $("textarea[name=desc]").val();
        var dept = $('#dept').val();
        var url = "<?php echo U(GROUP_NAME.'/Index/addRepair');?>";
        layer.open({
            type:2,
            shadeClose: false
        });
        $.ajax({
            type:"POST",
            data:{"name":name,"link":link,"desc":desc,"time":time,"dept":dept},
            url:url,
            success:function (status) {
                layer.closeAll();
                if (status == 1){
                    layer.open({
                        skin:"msg",
                        time:4,
                        content:"<span style='font-size:4em;line-height: 1.8em;'>预约成功，请等待联系</span>"
                    });
                }else{
                    layer.open({
                        skin:"msg",
                        time:3,
                        content:"<span style='font-size:4em;line-height: 1.8em;'>抱歉，预约失败，请换一个姿势预约(填写完整信息)</span>"
                    })
                }
            }
        })

    });

    //mobiscroll
    $(function () {
        //根据屏幕大小设置弹窗大小,时间选择
        var width = parseInt($(window).width());
        var height;
        if (width < 1024){
            width = 230;
            height = 90
        }else{
            width = 250;
            height = 70
        }
        var now = new Date(),
                max = new Date(now.getFullYear() + 100, now.getMonth(), now.getDate());

        $('#time').mobiscroll().date({
            theme: 'android-ics light',
            display: 'modal',
            max: max,
            setText: '确定',
            cancelText: '清空',
            lang:'zh',
            startYear: (new Date()).getFullYear(),
            endYear: (new Date()).getFullYear() + 1,
            width:width,
            height:height
        });

        //宿舍选择
        $('#dept').mobiscroll().select({
            theme:'android-ics light',
            lang:'zh',
            dispaly:bottom
        })
    });

</script>
</body>
</html>