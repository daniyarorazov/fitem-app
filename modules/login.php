<?php 

	$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	$password = md5($password);
	
	$mysql = new mysqli('localhost', 'root', '', 'fitem-register-bd');

	$result = $mysql->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
	$user = $result->fetch_assoc();
	if(count($user) == 0) {
		echo "Такой пользователь не найден!";
		exit();
	}

	setcookie('user', $user['name'], time() + 3600, "/");
	
	$mysql->close();

	header('Location: ../index.php');

 ?>