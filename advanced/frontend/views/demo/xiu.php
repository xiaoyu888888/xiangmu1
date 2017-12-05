<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<center>
<h3>修改数据</h3>
<body>
<form action="?r=demo/xiugai" method="post">
	<table>
	<input type="hidden" name="id" value="<?php echo $arr['id']?>">
		<tr>
			<td><input type="text" name="name" value="<?php echo $arr['name']?>"></td>
		</tr>
		<tr>
			<td><input type="text" name="sex" value="<?php echo $arr['sex']?>"></td>
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>	
</body>
</center>
</html>