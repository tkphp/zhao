<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="<?php echo U('User/add');?>" method="post" enctype="multipart/form-data">
    邮箱：<input  type="text" id="mail" name="mail"/>
    标题：<input  type="text" id="title" name="title"/>
    内容<input  type="text" id="content" name="content"/>
    <input class="button" type="submit" value="发送" style="margin: 0 auto;display: block;"/>
 </form>

</body>
</html>