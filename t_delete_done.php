<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title> 課題管理表</title>
</head>
<body>

<?php

try
{

$task_code=$_POST['code'];

$dsn='mysql:dbname=taskmanager;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM task_table WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$task_code;
$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

削除しました。<br />
<br />
<a href="t_disp.php"> 戻る</a>

</body>
</html>