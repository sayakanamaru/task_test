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
$code=$_POST['code'];
$task=$_POST['task'];
$name=$_POST['name'];
$info=$_POST['info'];

$code=htmlspecialchars($code,ENT_QUOTES,'UTF-8');
$task=htmlspecialchars($task,ENT_QUOTES,'UTF-8');
$name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
$info=htmlspecialchars($info,ENT_QUOTES,'UTF-8');
	if($task == "" || $name == "" || $info == "")
	{
		print '一部入力されていません<br />';
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>';
	}
	else	
	{

		$dsn='mysql:dbname=taskmanager;host=localhost;charset=utf8';
		$user='root';
		$password='';
		$dbh=new PDO($dsn,$user,$password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql='UPDATE task_table SET task=?,name=?,info=? WHERE code=?';
		$stmt=$dbh->prepare($sql);
		$data[]=$task;
		$data[]=$name;
		$data[]=$info;
		$data[]=$code;
		$stmt->execute($data);

		$dbh=null;
	}

}
	catch (Exception $e)
	{
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}

	?>

	修正しました。<br />
	<br />
	<a href="t_disp.php"> 戻る</a>

	</body>
	</html>