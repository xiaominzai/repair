<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="table-responsive">
    <?php if(is_array($list)): foreach($list as $key=>$v): ?><h4 class="mb"><i class="fa fa-angle-right"></i>信息详情<span style="float:right;font-size: 15px">提交时间:<?php echo (date("Y-m-d H:i",$v["submit"])); ?></span></h4>
        <form class="form-horizontal style-form" method="get">
            <table class="table">
                <tbody>
                <tr class="first">
                    <th>姓名</th>
                    <td><?php echo ($v["name"]); ?></td>
                    <th>联系方式</th>
                    <td colspan="2"><?php echo ($v["link"]); ?></td>
                </tr>
                <tr class="first">
                    <th>预约时间</th>
                    <td><?php echo ($v["time"]); ?></td>
                    <th>宿舍</th>
                    <td colspan="2"><?php echo ($v["dept"]); ?></td>
                </tr>
                <tr class="first" style="height: 300px;">
                    <th style="vertical-align : middle;">问题描述</th>
                    <td colspan="4"><?php echo ($v["desc"]); ?></td>

                </tr>
                </tbody>
            </table>
        </form><?php endforeach; endif; ?>

</div>
</body>
</html>