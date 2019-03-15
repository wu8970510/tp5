<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\tp5\public/../application/index\view\index\index.html";i:1551923709;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
		<table border='1' width='60%' align='center'>
		<tr>
			<th>ID</th>
			<th>name</th>
			<th>SEX</th>
		</tr>

		<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<tr>
			<td><?php echo $vo['id']; ?></td>
			<td><?php echo $vo['name']; ?></td>
			<td><?php if($vo['sex']==1): ?>男<?php else: ?>女<?php endif; ?></td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
			
		</table>
</body>
	<script>
		$.post('<?php echo url("qingqiu"); ?>');
	</script>
</html>