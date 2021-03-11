<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/choose_type_of_post.css">
	<title>Fitem / сайт бюро находок</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-black">
		<!-- logo -->
		<a href="index.php" class="navbar-brand"><img src="img/icons/logo.svg" alt="Fitem"></a>
		
		<!-- Toggle button -->
		<button class="navbar-toggler" data-toggle="collapse" data-target="#myColNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<!-- Элементы navbar -->
		<div class="collapse navbar-collapse" id="myColNavbar">
			<ul class="navbar-nav ml-auto">
				<?php if(isset($_COOKIE['user']) == ""): ?>
				<li class="nav-item"><a href="login.html" class="nav-link"><button class="navbar-button-add-item"><span class="navbar-button-add-item-icon"><img src="img/icons/ic-baseline-add.svg" alt=""></span> Подать объявление </button></a></li>
				<?php else: ?>
				<li class="nav-item"><a href="add-item.php" class="nav-link"><button class="navbar-button-add-item"><span class="navbar-button-add-item-icon"><img src="img/icons/ic-baseline-add.svg" alt=""></span> Подать объявление </button></a></li>
				<?php endif; ?>
				<?php if(isset($_COOKIE['user']) == ""): ?>
				<li class="nav-item"><a class="nav-link" href="login.html"><button class="navbar-button-login">Войти</button></a></li>
				<li class="nav-item"><a class="nav-link" href="register.html"><button class="navbar-button-register">Регистрация</button></a></li>
				<?php else: ?>
				<!-- <h2>Привет <?=$_COOKIE['user']?> <a href="modules/exit.php">Выйти</a></h2> -->
				<li class="nav-item" data-toggle="dropdown"><a class="nav-link" href="#"><button class="navbar-button-user"><span class="navbar-button-user-name" name="user_name"><?=$_COOKIE['user']?></span><span class="navbar-button-user-icon"><img src="img/icons/user.svg" alt=""></span></button></a></li>
				<div class="dropdown-menu dropdown-menu-right" style="margin-right: 120px; top: 0; margin-top: 75px;">
				    <a class="dropdown-item" href="#">Profile</a>
				    <a class="dropdown-item" href="#">Notifications</a>
				    <a class="dropdown-item" href="#">Settings</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="modules/exit.php">Exit</a>
			 	 </div>
				<?php endif; ?>


			</ul>
		</div>
	</nav>
</body>
</html>