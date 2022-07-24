<?php

// если картинку не заграужали, берем ее имя из второго скрытого инпута old_image
// иначе добавляем image как обычно
if (empty($_FILES['image_file']['name'])) {

    $image = $_POST['old_image'];

} else {

    // удаляем файл старой кортинки
    unlink($_POST['old_image']);

// берем расширение загруженного файла
    $extension = pathinfo($_FILES['image_file']['name'])['extension'];

// делаем новое уникальное имя для файла
    $name = uniqid() . "." . $extension;

// берем путь временного файла
    $temp_filename = $_FILES['image_file']['tmp_name'];

// сохраняем файл в папку images
    move_uploaded_file($temp_filename, 'images/' . $name);

    $image = 'images/' . $name;
}

// подготавливаем поля для базы
$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$date = time();

// обновляем пост в базе
$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
$statement = $pdo->prepare("UPDATE  posts SET title=:title, image=:image, text=:text, date=:date WHERE id=:id");
$statement->execute(['title' => $title, 'image' => $image, 'text' => $text, 'date' => $date, 'id' => $id]);

// редирект на admin.php
header("Location: admin.php");
