<? //include("bd.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="windows-1251">
<title>Документ без названия</title>
</head>

<body>


<form method="post">
Ваше ФИО: <input name="fio"><br>
Ваш телефон: <input name="phone"><br>
Ваш email: <input name="phone"><br>
<input type="submit" name="submit" value="Отправить заявку">
</form>


<?
if(isset($_POST['submit'])) {
	
		mail("feomatar@list.ru","Заявка","Имя: ".$_POST['fio']."<br>Телефон: ".$_POST['phone']."<br>Email: ".$_POST['email'],"From: ".$_POST['name']." <robot@robot.ru>\r\ncontent-type:text/html; charset=windows-1251\r\n");
		
}

phpinfo();
?>


</body>
</html>
