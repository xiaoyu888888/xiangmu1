
<?php
	use yii\widgets\LinkPager;
	use yii\web\Session;
?>
<?php
$session = Yii::$app->session;
	$username = $session->get('username');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<center>
	<h3>欢迎<span style="color: blue"><?php echo $username?></span>登录</h3>
	<a href="?r=demo/add">添加</a>
	<a href="?r=login/login">返回登录</a>
<body>
	<table border="1">
		<tr>
		<th>ID</th>
			<th>姓名</th>
			<th>内容</th>
			<th>操作</th>
		</tr>
		<?php foreach ($res as $key => $value) { ?>
			<tr>
				<td><?php echo $value['id']?></td>
				<td><?php echo $value['name']?></td>
				<td><?php echo $value['sex']?></td>
				<td><a href="?r=demo/del&id=<?php echo $value['id'];?>">删除</a>|<a href="?r=demo/xiu&id=<?php echo $value['id'];?>">修改</a></td>
			</tr>
			
		<?php }?>
	</table>
	
<?= LinkPager::widget([ 
    'pagination' => $pages, 
    'nextPageLabel' => '下一页', 
    'prevPageLabel' => '上一页', 
]); ?>

</body>
</center>
</html>

