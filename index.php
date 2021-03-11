<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
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
				<li class="nav-item"><a href="choose_type_of_post.php" class="nav-link"><button class="navbar-button-add-item"><span class="navbar-button-add-item-icon"><img src="img/icons/ic-baseline-add.svg" alt=""></span> Подать объявление </button></a></li>
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
	<div class="header-subblock">
		<div class="search-form">
		<input type="text" class="header-subblock-search-form" id="header-search-form" placeholder="Например: Потерян паспорт...">
		<span class="header-subblock-search-icon"><img src="img/icons/fe-search.svg" alt=""></span>
		</div>
		<button class="header-subblock-button-search">Искать</button>
	</div>

</header>
	
<!-- Main content block -->

<main>
	<div class="section section-list">
		<h2 class="section-list-title">Объявления</h2>

		<!-- List -->
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="">
  			<li class="nav-item">
    			<a class="nav-link active tab-missing" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Пропажи</a>
  			</li>
  			<li class="nav-item">
    			<a class="nav-link tab-found" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Найдено</a>
  			</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
  			<div class="tab-pane show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<?php 
					require 'configDB.php';

					$array_items = array();
					$increment = 0;
					$query = $pdo->query('SELECT * FROM `list_items` ORDER BY `id` DESC');
					while($row = $query->fetch(PDO::FETCH_OBJ)) {

					//variables
					$id = $row->id;
					$main_image = $row->main_image;
					$name = $row->name;
					$category = $row->category;
					$country = $row->country;

					
					if ($category == '') {
						$category = "Неизвестно";
					} 

					if ($country == '') {
						$country = "Неизвестно";
					} 
					


						// array_push($array_items, '');
						echo '<div class="item-card">
					<a href="info-item.php?id='.$row->id.'" id="card-link-click">
					<div class="row">
						<div class="col-lg-auto">
							<div class="item-card-header">
								<div class="item-card-header-image">
									
										<img src="img/user_images_post/'.$id.'/'.$main_image.'" alt="">
									
								</div>
							</div>
						</div>
						<div class="col-lg-auto">
							<div class="item-card-body">
								<div class="item-card-first-row row">
									<h2 class="item-card-first-row-title" id="block-title">
										'.mb_strimwidth($name, 0, 20, "...").' <!-- Note: In this row must be a PHP code-->
									</h2>
									<span class="item-card-first-row-date-published">
										Дата публикации: 12.08.2019 <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-second-row row">
									<span class="item-card-second-row-type-item-card">
										'.$category.' <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-thirth-row row">
									<span class="item-card-thirth-row-geolocation-info">
										'.$country.' <span class="item-card-thirth-row-geolocation-info-form"><img src="img/icons/geolocation-mark-red.svg" alt=""></span> <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
							</div>
						</div>
					</div>
					</a>
				</div>';
					// array_push($array_items, );
					// $increment++;
				// 	echo 
				
				}

				// $array_reversed = array_reverse($array_items);
				
				// for ($i = 0; $i < $increment; $i++) {
				// 	echo $array_reversed[$i];
				// }

				// array_reverse($array_items, true); 
				

				 ?>
			</div>

  			<div class="tab-pane pane2" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  				<div class="item-card">
					<div class="row">
						<div class="col-lg-auto">
							<div class="item-card-header">
								<div class="item-card-header-image">
									<img src="img/Example.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg-auto">
							<div class="item-card-body">
								<div class="item-card-first-row row">
									<h2 class="item-card-first-row-title">
										Найден IPhone X <!-- Note: In this row must be a PHP code-->
									</h2>
									<span class="item-card-first-row-date-published">
										Дата публикации: 12.08.2019 <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-second-row row">
									<span class="item-card-second-row-type-item-card">
										Электроника / Телефоны <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-thirth-row row">
									<span class="item-card-thirth-row-geolocation-info">
										Караганда <span class="item-card-thirth-row-geolocation-info-form"><img src="img/icons/geolocation-mark-red.svg" alt=""></span> <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item-card">
					<div class="row">
						<div class="col-lg-auto">
							<div class="item-card-header">
								<div class="item-card-header-image">
									<img src="img/Example.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg-auto">
							<div class="item-card-body">
								<div class="item-card-first-row row">
									<h2 class="item-card-first-row-title">
										Найден IPhone X <!-- Note: In this row must be a PHP code-->
									</h2>
									<span class="item-card-first-row-date-published">
										Дата публикации: 12.08.2019 <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-second-row row">
									<span class="item-card-second-row-type-item-card">
										Электроника / Телефоны <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-thirth-row row">
									<span class="item-card-thirth-row-geolocation-info">
										Караганда <span class="item-card-thirth-row-geolocation-info-form"><img src="img/icons/geolocation-mark-red.svg" alt=""></span> <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item-card">
					<div class="row">
						<div class="col-lg-auto">
							<div class="item-card-header">
								<div class="item-card-header-image">
									<img src="img/Example.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg-auto">
							<div class="item-card-body">
								<div class="item-card-first-row row">
									<h2 class="item-card-first-row-title">
										Найден IPhone X <!-- Note: In this row must be a PHP code-->
									</h2>
									<span class="item-card-first-row-date-published">
										Дата публикации: 12.08.2019 <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-second-row row">
									<span class="item-card-second-row-type-item-card">
										Электроника / Телефоны <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-thirth-row row">
									<span class="item-card-thirth-row-geolocation-info">
										Караганда <span class="item-card-thirth-row-geolocation-info-form"><img src="img/icons/geolocation-mark-red.svg" alt=""></span> <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="item-card">
					<div class="row">
						<div class="col-lg-auto">
							<div class="item-card-header">
								<div class="item-card-header-image">
									<img src="img/Example.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg-auto">
							<div class="item-card-body">
								<div class="item-card-first-row row">
									<h2 class="item-card-first-row-title">
										Найден IPhone X <!-- Note: In this row must be a PHP code-->
									</h2>
									<span class="item-card-first-row-date-published">
										Дата публикации: 12.08.2019 <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-second-row row">
									<span class="item-card-second-row-type-item-card">
										Электроника / Телефоны <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
								<div class="item-card-thirth-row row">
									<span class="item-card-thirth-row-geolocation-info">
										Караганда <span class="item-card-thirth-row-geolocation-info-form"><img src="img/icons/geolocation-mark-red.svg" alt=""></span> <!-- Note: In this row must be a PHP code-->
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
  			</div>
			</div>
			<button class="section-list-button-for-list">
				Посмотреть все
			</button>
	</div>
	<div class="section section-categories">
		<h2 class="section-categories-title">Популярные категории! 
		<div class="section-categories-block row">
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
		</div>
		<div class="section-categories-block row">
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
		</div>
		<div class="section-categories-block row">
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
			<div class="col-lg-auto block-row"><img src="img/categories-icons/documents.svg" alt=""><span>Документы</span></div>
		</div>
	</div>
	<div class="section section-row-buttons">
		<a class="section-row-block-buttons-link"><button class="section-row-buttons-add-item"><span class="section-row-buttons-add-item-icon"><img src="img/icons/ic-baseline-add.svg" alt=""></span> Подать объявление </button></a>
		<a class="section-row-block-buttons-link"><button class="section-row-buttons-info"><span class="navbar-button-info-icon"><img src="img/icons/ic-baseline-question.svg" alt=""></span> Инструкция </button></a>
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
<script src="script/libraries/clamp.min.js"></script>
<script src="script/script.js"></script>
<script>
	var header = document.getElementsByTagName('body')[0].getElementsByTagName('h1')[0],
            paragraph = document.getElementsByTagName('body')[0].getElementsByTagName('div')[0];
            
        $clamp(header, {clamp: 1, useNativeClamp: false});
        $clamp(paragraph, {clamp: 10, useNativeClamp: false, animate: true});
</script>
</body>
</html>