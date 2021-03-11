<?php 

require '../configDB.php';

$user_name = $_POST['user_name'];
$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$country = $_POST['country'];
$city = $_POST['city'];
$street = $_POST['street'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$main_image = $_FILES['main_image']['name'];


echo $main_image;
echo 'test';

// $sql = 'INSERT INTO list_items(main_image, user_name, name, description, category, city, street, phone, email) VALUES(:main_image, :user_name, :name, :description, :category, :city, :street, :phone, :email)';

// $query = $pdo->prepare($sql);
  
// $query->execute(['main_image' => $main_image, 'user_name' => $user_name, 'name' => $name, 'description' => $description, 'category' => $category, 'city' => $city, 'street' => $street, 'phone' => $phone, 'email' => $email]);

// $query = $pdo->query('SELECT * FROM `list_items` ORDER BY `id` DESC');

// $row = $query->fetch(PDO::FETCH_OBJ);

// mkdir('../img/user_images_post/'. $row->id);

// $target_file = '../img/user_images_post/'. $row->id . '/';
$target = "../img/".basename($main_image);

// $target = $target_file.basename($main_image); 

move_uploaded_file($_FILES['main_image']['tmp_name'], $target);

//Uploading image to folder




?>