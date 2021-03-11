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
  $main_image = $row->main_image;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/info-item.css">
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
	<?php if(isset($_COOKIE['user']) == $user_name): ?>
	<div class="header-subblock">
		<img src="img/user_images_post/<?php echo $id; ?>/<?php echo $main_image; ?>" alt="" class="header-subblock-main-img-item">

		<!-- Title of item -->
		<h2 class="header-subblock-title">
			<?php echo $row->name; ?></h2>
		<div class="row header-subblock-info-about-item">

			<!-- Date upload -->
			<div class="col-lg-auto">
				<span class="header-subblock-info-about-item-date-upload">Дата публикации: <?php echo "24.02.2018";  ?></span>
			</div>

			<!-- Geolocation -->
			<div class="col-lg-auto  header-subblock-info-about-item-block2">
				<span class="header-subblock-info-about-item-geolocation"><?php  echo $row->city; ?></span>
				<span class="header-subblock-info-about-item-geolocation-icon"><img src="img/icons/geolocation-mark-red.svg" alt=""></span>
			</div>

			<div class="col-lg-auto  header-subblock-info-about-item-block3"  style="display: flex; float: right;">
				<a href="modules/delete.php?id=<?php echo $id; ?>"><input type="submit"  class="btn btn-danger" value="Удалить"></a>
			</div>

			<div class="col-lg-auto  header-subblock-info-about-item-block4"  style="display: flex; float: right;">
				<a href="edit-item.php?id=<?php echo $id; ?>"><input type="submit"  class="btn btn-primary" value="Изменить"></a>
			</div>
			
		</div>
	</div>
	<?php else: ?>
	
	<div class="header-subblock">
		<img src="img/card-img-item.png" alt="" class="header-subblock-main-img-item">

		<!-- Title of item -->
		<h2 class="header-subblock-title">
			<?php echo $row->name; ?></h2>
		<div class="row header-subblock-info-about-item">

			<!-- Date upload -->
			<div class="col-lg-auto">
				<span class="header-subblock-info-about-item-date-upload">Дата публикации: <?php echo "24.02.2018";  ?></span>
			</div>

			<!-- Geolocation -->
			<div class="col-lg-auto  header-subblock-info-about-item-block2">
				<span class="header-subblock-info-about-item-geolocation"><?php  echo $row->city; ?></span>
				<span class="header-subblock-info-about-item-geolocation-icon"><img src="img/icons/geolocation-mark-red.svg" alt=""></span>
			</div>

			
		</div>
	</div>
	<?php endif; ?>
</header>
	
<!-- Main content block -->

<main>
	<div class="section section-main-block">
		<div class="section-main-block-description">
			<h2 class="section-main-block-description-title">Описание</h2>
			<p class="section-main-block-description-text"><?php echo $row->description; ?></p>
		</div>
		<div class="section-main-block-characteristics">
			<h2 class="section-main-block-characteristics-title">Характеристика</h2>
			<p class="section-main-block-characteristics-list">Цвет телефона: <span>Черный</span></p>
			<p class="section-main-block-characteristics-list">Чехол: <span>Нет</span></p>
			<p class="section-main-block-characteristics-list">Царапины, поломки: <span>была трещина возле фронтальной камеры.</span></p>
			<p class="section-main-block-characteristics-list">Фон блокировки: <span>Иллюстрация из Star Wars, а именно Звезда Смерти на фоне космоса.</span></p>

		</div>
		<div class="section-main-block-feedback">
			<h2 class="section-main-block-feedback-title">Связаться с пользователем</h2>
			<div class="section-main-block-feedback-icons"><span><img src="img/icons/Contact icons/feather-phone.svg" alt=""></span><p><?php  echo $row->phone ?></p></div>
			<div class="section-main-block-feedback-icons"><span><img src="img/icons/Contact icons/ic-outline-email.svg" alt=""></span><p><?php echo $row->email ?></p></div>
			<div class="section-main-block-feedback-icons-user"><p><?php echo $row->user_name; ?></p><span><img src="img/icons/Contact icons/fe-user.svg" alt=""></span></div>
			<div class="section-main-block-feedback-form-to-message">
				<input type="text" class="section-main-block-feedback-form-to-message-name" placeholder="Имя">
				<textarea type="text" class="section-main-block-feedback-form-to-message-text" placeholder="Текст сообщения"></textarea>
				<button class="section-main-block-feedback-form-to-message-send-button">Отправить!</button>
			</div>
		</div>
		<div class="section-main-block-next-item">
			<span class="section-main-block-next-item-subblock"><a href="#" class="section-main-block-next-item-subblock-text">Следующее объявление</a><img src="img/icons/next-arrow.svg" alt="" class="section-main-block-next-item-subblock-icon"></span>
		</div>
	</div>
</main>




<footer class="footer-section section">
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


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="script/script.js"></script>
</body>
</html>