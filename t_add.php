<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>課題管理表</title>
</head>
<body>

<h2 style="color:#FFFFFF"><p style="background-color:#339999">課題リスト追加</p></h2>

<form method="post" action="t_add_done.php">
	課題名<br />
	<input type="text" name="task" size="30" style="width:300px"><br />

	担当者名<br />
	<input type="text" name="name" size="30" style="width:300px"><br />

	進捗状況<br />
	<textarea name="info"  style="width:300px; height:300px;" >
	</textarea><br />

	<input type="submit" value="登録">
	<input type="button" onclick="history.back()" value="戻る">
</form>


</body>
</html>


