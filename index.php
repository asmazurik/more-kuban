<? //include("bd.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>�������� ��� ��������</title>
</head>

<body>


<form method="post">
���� ���: <input name="fio"><br>
��� �������: <input name="phone"><br>
��� email: <input name="phone"><br>
<input type="submit" name="submit" value="��������� ������">
</form>


<?
if(isset($_POST['submit'])) {
	
		mail("feomatar@list.ru","������","���: ".$_POST['fio']."<br>�������: ".$_POST['phone']."<br>Email: ".$_POST['email'],"From: ".$_POST['name']." <robot@robot.ru>\r\ncontent-type:text/html; charset=windows-1251\r\n");
		
}

phpinfo();
?>


</body>
</html>
