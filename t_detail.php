<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>課題管理表</title>
</head>
<body>

<?php

try
{

$code=$_GET['code'];

$dsn='mysql:dbname=taskmanager;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT * FROM task_table WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$task=$rec['task'];
$name=$rec['name'];
$info=$rec['info'];

$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<h2 style="color:#FFFFFF"><p style="background-color:#339999">課題詳細</p></h2><br />
<table>
<tr>
<td align = "center" valign = "middle">コード</td>
<td align = "center" valign = "middle">タスク</td>
<td align = "center" valign = "middle">担当者</td>
<td align = "center" valign = "middle">進捗状況</td>
</tr>
<tr>
<td align = "center" valign = "middle"><?php print $code; ?></td>
<td align = "center" valign = "middle"><?php print $task; ?></td>
<td align = "center" valign = "middle"><?php print $name; ?></td>
<td align = "center" valign = "middle"><?php print $info; ?></td>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>
</table>
</body>
</html>