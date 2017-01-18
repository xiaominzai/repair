<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传类</title>
</head>
<body>
<form action="<?php echo U(GROUP_NAME.'/Index/upload');?>" method="post" enctype="multipart/form-data">
    <input type="file" name="iso">
    <input type="submit" value="提交">
</form>
</body>
</html>