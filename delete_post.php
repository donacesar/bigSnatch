<?php

$id = $_GET['id']; 

$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
// выцепляем картинку из базы select либо массив по id, либо поле по (where id)
$statement = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$statement->execute(['id' => $id]);
$post = $statement->fetch(PDO::FETCH_ASSOC); //извелечь
unlink($post['image']);

$statement = $pdo->prepare("DELETE FROM posts WHERE id =:id");  //подготовить
$statement->execute(['id' => $id]);     //выполнение

// редирект на admin.php
header("Location: admin.php");
?>
