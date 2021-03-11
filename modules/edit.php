<?php 
	require '../configDB.php';
//Delete

  $id = $_GET['id'];

  $sql = 'DELETE FROM `list_items` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);




//Edit
  
$user_name = $_POST['user_name'];
$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$country = $_POST['country'];
$city = $_POST['city'];
$street = $_POST['street'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$sql = 'INSERT INTO list_items(id, user_name, name, description, category, city, street, phone, email) VALUES(:id, :user_name, :name, :description, :category, :city, :street, :phone, :email)';

$query = $pdo->prepare($sql);
  
$query->execute(['id' => $id, 'user_name' => $user_name, 'name' => $name, 'description' => $description, 'category' => $category, 'city' => $city, 'street' => $street, 'phone' => $phone, 'email' => $email]);

header('Location: ../index.php');




?>