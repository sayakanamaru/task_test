<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>課題管理表</title>
</head>
<body>


<h2 style="color:#FFFFFF"><p style="background-color:#339999">課題リスト追加</p></h2>
<form method="post" action="t_add_done.php">

課題<br />
<input type="text" name="task" size="30" style="width:400px"><br />
担当者<br />
<input type="text" name="name" size="30" style="width:400px"><br />
進捗状況<br />
<textarea name="info" size="1000" style="width:400px; height:300px;" >
</textarea><br />
ステータス<br/>
<select name='status'>
<option value='   完了'>完了</option>
<option value='     進行中'>進行中</option>
<option value='    未着手'>未着手</option>
<option value=' 中止'>中止</option>
<option value='  保留'>保留</option>
</select><br/>
期限<br/>
<input type="date" name="deadline"><br/>
優先度<br/>
<select name='priority'>
<option value='    高'>高</option>
<option value='   中'>中</option>
<option value='  低'>低</option>
<option value=' -'>-</option>
</select><br/>
<br/><br/>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="登録">
</form>

</body>
</html>
