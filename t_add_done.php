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
	//パラメータ取得
	$task=$_POST['task'];
	$name=$_POST['name'];
	$info=$_POST['info'];
	$status=$_POST['status'];
	$deadline=$_POST['deadline'];
	$priority=$_POST['priority'];

	$task=htmlspecialchars($task,ENT_QUOTES,'UTF-8');
	$name=htmlspecialchars($name,ENT_QUOTES,'UTF-8');
	$info=htmlspecialchars($info,ENT_QUOTES,'UTF-8');
	$status=htmlspecialchars($status,ENT_QUOTES,'UTF-8');
	$priority=htmlspecialchars($priority,ENT_QUOTES,'UTF-8');



	//エラーチェック
	if($task == "" || $name == "" || $info == "" || $deadline =="")
	{
		print '一部入力されていません<br />';
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>';
	}
	else	
	{

	//登録処理をする
	$dsn='mysql:dbname=taskmanager;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	//データベースに登録する
	$sql='INSERT INTO task_table (task,name,info,status,deadline,priority) VALUES (?,?,?,?,?,?)';
	$stmt=$dbh->prepare($sql);
	$data[]=$task;
	$data[]=$name;
	$data[]=$info;
	$data[]=$status;
	$data[]=$deadline;
	$data[]=$priority;
	$stmt->execute($data);

	//データベース接続をきる
	$dbh=null;

	//一覧画面に遷移する
	header( "Location: http://localhost/task/t_disp.php" ) ;

	}

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。<br />';
	print '<a href="t_add.php"> 戻る</a>';
	exit();

}

?>

</body>
</html

