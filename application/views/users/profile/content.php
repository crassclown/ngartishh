<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<table border=1>
	<tr>
		<th>Nama</th>
		<th>Email</th>
	</tr>
	<?php 
		foreach($profile as $p)
		{
	?>
	<tr>
		<td><?php echo $p->fullname; ?></td>
		<td><?php echo $p->email; ?></td>
	</tr>
	<?php } ?>
</table><br><br>
<table border=1>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Desc</th>
	</tr>
	<?php 
		foreach($content as $c)
		{
	?>
	<tr>
		<td><?php echo $c->Id; ?></td>
		<td><?php echo $c->title; ?></td>
		<td><?php echo $c->desc; ?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
