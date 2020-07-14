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
$status=$rec['status'];
$deadline=$rec['deadline'];

$dbh=null;

}
catch(Exception $e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<h2 style="color:#FFFFFF"><p style="background-color:#339999">課題詳細</p></h2><br />
<table border="2" bordercolor="#CCCCFF" width="100%">
<tr>
<td width="70" align = "center" valign = "middle">コード</td>
<td width="100" align = "center" valign = "middle">課題</td>
<td width="100" align = "center" valign = "middle">担当者</td>
<td width="300" align = "center" valign = "middle">進捗状況</td>
<td width="100" align = "center" valign = "middle">ステータス</td>
<td width="100" align = "center" valign = "middle">期限</td>
<td width="100" align = "center" valign = "middle">優先度</td>
</tr>
<tr>
<td align = "center" valign = "middle"><?php print $code; ?></td>
<td align = "center" valign = "middle"><?php print $task; ?></td>
<td align = "center" valign = "middle"><?php print $name; ?></td>
<td align = "center" valign = "middle"><?php print $info; ?></td>
<td align = "center" valign = "middle"><?php print $status; ?></td>
<td align = "center" valign = "middle"><?php print $deadline; ?></td>

<?php
if($rec['priority']=='    高')
	{
		print '<td bgcolor="#FF9999"align = "center" valign = "middle">'.$rec['priority'].'</td>';
	}
	else if($rec['priority']=='   中')
	{
		print '<td bgcolor="#FFFF66"align = "center" valign = "middle">'.$rec['priority'].'</td>';
	}
	else if($rec['priority']=='  低')
	{
		print '<td bgcolor="#66FF66"align = "center" valign = "middle">'.$rec['priority'].'</td>';
	}
	else if($rec['priority']==' -')
	{
		print '<td bgcolor="#DDDDDD"align = "center" valign = "middle">'.$rec['priority'].'</td>';
	}
?>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>
</table>
</body>
</html>