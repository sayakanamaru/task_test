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

$dsn='mysql:dbname=taskmanager;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if(isset($_POST["sort"])) //2回目以降
{
	if("name_s"==$_POST["sort"]){
		$sql = "SELECT * FROM task_table ORDER BY name ASC"; //名前順に並び替え
	}
	else if("status_s"==$_POST["sort"]){
		$sql = "SELECT * FROM task_table ORDER BY status ASC"; //ステータス順
	}
	else if("deadline_s"==$_POST["sort"]){
		$sql = "SELECT * FROM task_table ORDER BY deadline ASC"; //期限順
	}
	else if("priority_s"==$_POST["sort"]){
			
		$sql = "SELECT * FROM task_table ORDER BY priority ASC"; //優先度順
	}
	else if("code_s"==$_POST["sort"]){
		$sql='SELECT * FROM task_table WHERE 1'; //追加順（デフォルト）
	
	}
}
else{
$sql='SELECT * FROM task_table WHERE 1'; //初回
}

$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

//var_dump(!empty($_POST['sort']));

print '<h2 style="color:#FFFFFF"><p style="background-color:#339999">課題リスト</p></h2>';
print '<p><a href = "/task/t_add.php">リスト追加</a></p>';

print '<table border="2" bordercolor="#CCCCFF" width="70%">';
print '<tr>';
print '<td width="220" align = "center" valign = "middle">課題</td>';
print '<td width="220" align = "center" valign = "middle">担当者</td>';
print '<td width="100" align = "center" valign = "middle">ステータス</td>';
print '<td width="100" align = "center" valign = "middle">期限</td>';
print '<td width="100" align = "center" valign = "middle">優先度</td>';
print '<td width="30" align = "center" valign = "middle" colspan="3">操作</td>';
print '</tr>';

while(true)
{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	//if("priority_s"==$_POST["sort"]){
	//	$pri=array('1'=>'高', '2'=>'中', '3'=>'低');
	//	ksort($pri);
	//}

	print '<tr><td>'.$rec['task'].'</td>';
	print '<td>'.$rec['name'].'</td>';
	print '<td align = "center" valign = "middle">'.$rec['status'].'</td>';
	print '<td>'.$rec['deadline'].'</td>';
	
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
	

	print '<td align = "center" valign = "middle colspan="3""><a href = "/task/t_detail.php?action=detail&code='.$rec['code'].'"> 詳細 </a>';
	print '<a href = "/task/t_edit.php?action=edit&code='.$rec['code'].'">  修正  </a>';
	print '<a href = "/task/t_delete.php?action=delete&code='.$rec['code'].'"> 削除 </a></td></tr>';
}
print '<form action="t_disp.php" method="post">';
print '<input type="radio" name="sort" value="code_s"'. (array_key_exists('sort', $_POST) && $_POST['sort'] == 'code_s' ? 'checked="checked"' : '') . '>追加順';
print '<input type="radio" name="sort" value="name_s"'. (array_key_exists('sort', $_POST) && $_POST['sort'] == 'name_s' ? 'checked="checked"' : '') .' >担当者順';
print '<input type="radio" name="sort" value="status_s"'. (array_key_exists('sort', $_POST) && $_POST['sort'] == 'status_s' ? 'checked="checked"' : '') .' >ステータス順';
print '<input type="radio" name="sort" value="deadline_s"'. (array_key_exists('sort', $_POST) && $_POST['sort'] == 'deadline_s' ? 'checked="checked"' : '') .' >期限順';
print '<input type="radio" name="sort" value="priority_s"'. (array_key_exists('sort', $_POST) && $_POST['sort'] == 'priority_s' ? 'checked="checked"' : '') .' >優先度順 ';
print '<input type="submit" value="並べ替え">';



print '</form>';

}
catch (Exception $e)
{
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}
print '</table>';
?>

</body>
</html>