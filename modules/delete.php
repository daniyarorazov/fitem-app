<?php
  require '../configDB.php';

  $id = $_GET['id'];

  $sql = 'DELETE FROM `list_items` WHERE `id` = ?';
  $query = $pdo->prepare($sql);
  $query->execute([$id]);

  header('Location: ../index.php');
?>

