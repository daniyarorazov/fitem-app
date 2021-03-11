<?php 
	require 'configDB.php';
	// $id = $_GET['id'];
 //    // $sql = 'SELECT * FROM `list_items` WHERE `id` = ?';
	// // $query = $pdo->query($sql);
	// $query = $pdo->query('SELECT * FROM `list_items` ORDER BY `id`  DESC');
	// $query = $pdo->prepare($sql);
  	// $query->execute([$id]);



  $id = $_GET['id'];
  $sql = 'SELECT * FROM `list_items` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);
  $row = $query->fetch(PDO::FETCH_OBJ);
  $user_name = $row->user_name;
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/add-item.css">
	<title>Fitem / сайт бюро находок</title>
</head>
<body>

<header>
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
	

</header>
	

<main>
	
<div class="section section-main">
	<h2 class="section-main-title">Подать объявление!</h2>
</div>

<div class="section section-img">
	<div class="row">
		<div class="col-lg-auto section-img-first-block">
			<span class="section-img-block">
				<img src="img/icons/ic-baseline-add.svg" alt="" class="section-img-block-icon">
			</span>
		</div>
		<div class="col-lg-auto section-img-second-block">
			<h2 class="section-img-title">Основная фотография.</h2>
			<span class="section-img-subtitle">Чтобы добавить нажмите на +</span>
		</div>
	</div>
</div>

<hr class="section-line">
<form action="modules/edit.php?id=<?php echo $id; ?>" method="POST">
	<div class="section section-main-information">
		<div class="row section-main-information-title">
			<input type="text" name="user_name" value="<?=$_COOKIE['user']?>" style="display: none;">
			<h2 class="section-main-information-title-text">Заголовок <span>*</span></h2>
			<input type="text" class="section-main-information-title-input main-input" name="name" value="<?php echo $row->name ?>">
		</div>
		<div class="row section-main-information-description">
			<h2 class="section-main-information-description-text">Описание <span>*</span></h2>
			<textarea class="section-main-information-description-input main-input" name="description"><?php echo $row->description; ?></textarea> 
		</div>
	</div>

<hr class="section-line">


<div class="section section-category">
	<h2 class="section-category-title">Категория</h2>
	<input class="main-input" type="text" name="category" value="<?php echo $row->category ?>">
</div>

<hr class="section-line">


<div class="section section-media">
	<h2 class="section-media-title">Доп. фотография</h2>
	<input class="main-input" type="text">
</div>

<hr class="section-line">


<div class="section section-contacts">
	
		<h2 class="section-contacts-country">Страна</h2>
		<input type="text" class="main-input" name="country" id="item-country" value="<?php echo $row->country ?>"> <br>
		<h2 class="section-contacts-city">Город</h2>
		<input type="text" class="main-input" name="city" id="item-city" value="<?php echo $row->city ?>"> <br>
		<h2 class="section-contacts-street">Улица</h2>
		<input type="text" class="main-input" name="street" id="item-street" value="<?php echo $row->street ?>"> <br>
		<h2 class="section-contacts-phone">Номер телефона</h2>
		<input type="phone" class="main-input" name="phone" id="item-phone" value="<?php echo $row->phone ?>"> <br>
		<h2 class="section-contacts-email">E-mail</h2>
		<input type="text" class="main-input" name="email" id="item-email" value="<?php echo $row->email ?>"> <br>
		<input type="submit" class="btn btn-primary section-contacts-button" id="itemAdd" value="Добавить!">
	</form>
</div>
</main>


<footer class="footer-section">
	<div class="footer-section-name-company">
		<span>Fitem | &copy; Copyright 2019 </span>
	</div>
	<div class="footer-section-content row">
			<div class="col-lg-auto footer-section-content-block">
				<span class="footer-section-content-block-form">
					<img src="img/icons/Social icons/ant-design_mail-outline.svg" alt="mail" class="footer-section-content-block-form-icon">
				</span>
			</div>
			<div class="col-lg-auto">
				<span class="footer-section-content-block-form">
					<img src="img/icons/Social icons/ant-design_google-circle-fill.svg" alt="google" class="footer-section-content-block-form-icon">
				</span>
			</div>
			<div class="col-lg-auto">
				<span class="footer-section-content-block-form">
					<img src="img/icons/Social icons/ant-design_instagram-outline.svg" alt="instagram" class="footer-section-content-block-form-icon">
				</span>
		</div>
	</div>
</footer>


<!-- <?php  // $mysql = new mysqli('localhost', 'root', '', 'fitem-register-bd');
  // $user_name = $_POST['user_name'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $street = $_POST['street'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];


  // if($task == '') { //Если перменная $task пустая, то выполняется функция
  //   echo 'Введите само задание';
  //   exit(); //Прекращение скрипта
  // }

  require '../configDB.php'; //Импортируем configDB.php в этот скрипт

  $sql = 'INSERT INTO test(name, description, category, country, city, street, phone, email) VALUES(:name, :description, :category, :country, :city, :street, :phone, :email)';

  // $sql = 'INSERT INTO list_items(user_name, name, description, category, country, city, street, phone, email) VALUES(:user_name, :name, :description, :category, :country, :city, :street, :phone, :email)'; //Получаем sql запрос



  $query = $pdo->prepare($sql);
  // $query->execute(['name' => $name, 'description' => $description, 'category' => $category, 'country' => $country, 'city' => $city, 'street' => $street, 'phone' => $phone, 'email' => $email]);

  // $query->execute(['user_name' => $user_name,  'name' => $name, 'description' => $description, 'category' => $category, 'country' => $country, 'city' => $city, 'street' => $street, 'phone' => $phone, 'email' => $email]);

   $query->execute(['name' => $name, 'description' => $description, 'category' => $category, 'country' => $country, 'city' => $city, 'street' => $street, 'phone' => $phone, 'email' => $email]);
 ?> -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script/script.js"></script>





</body>
</html>