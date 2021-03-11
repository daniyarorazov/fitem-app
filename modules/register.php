<?php 
	
	//Инициализации переменных
	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	if(mb_strlen($email) < 0 || mb_strlen($email) > 90) {
		echo "Недопустимая длина email!";
		exit();
	} else if(mb_strlen($name) < 1 || mb_strlen($name) > 50) {
		echo "Недопустимая длина имени!";
		exit();
	} else if(mb_strlen($password) < 4 || mb_strlen($password) > 24) {
		echo "Недопустимая длина пароля (от 4 до 24 символов)!";
		exit();
	} 

	$password = md5($password);

	$mysql = new mysqli('localhost', 'root', '', 'fitem-register-bd');
	$mysql->query("INSERT INTO `users` (`email`, `password`, `name`) VALUES('$email', '$password', '$name')");
	$mysql->close();

	header('Location: ../index.php');

 ?>