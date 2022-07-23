<?php

// берем расширение загруженного файла
$extension = pathinfo($_FILES['image_file']['name'])['extension'];

// делаем новое уникальное имя для файла
$name = uniqid() . "." . $extension;

// берем путь временного файла
$temp_filename = $_FILES['image_file']['tmp_name'];

// сохраняем файл в папку images
move_uploaded_file($temp_filename, 'images/' . $name);

/* Сохраняем пост в базу */

// подготавливаем поля для базы
$title = $_POST['title'];
$image = 'images/' . $name;
$text = $_POST['text'];
$date = time();

// добавляем в базу
$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
$statement = $pdo->prepare("INSERT INTO posts (title, image, text, date) VALUES (:title, :image, :text, :date)");
$statement->execute(['title' => $title, 'image' => $image, 'text' => $text, 'date' => $date]);

// редирект на admin.php
header("Location: admin.php");