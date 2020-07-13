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

$task_code=$_GET['code'];

$dsn='mysql:dbname=taskmanager;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT task,name,info FROM task_table WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$task_code;
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

課題管理表修正<br />

<form method="post" action="t_edit_done.php">
<input type="hidden"name="code" value="<?php print $task_code; ?>">
課題名<br />
<input type="text" name="task" style="width:200px" value="<?php print $task; ?>"><br />
担当者<br />
<input type="text" name="name" style="width:200px" value="<?php print $name; ?>"><br />
進捗状況<br />
<input type="text" name="info" style="width:200px" value="<?php print $info; ?>"><br />
<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="ＯＫ">
</form>