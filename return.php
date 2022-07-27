<?php

$id = $_POST['id'];
$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
$statement = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$statement->execute(['id' => $id]);
$post = $statement->fetch(PDO::FETCH_ASSOC);

$likes = (int)$post['likes'];
$likes++;

$statement = $pdo->prepare("UPDATE posts SET likes=:likes WHERE id=:id");
$statement->execute(['id' => $id, 'likes' => $likes]);

echo $likes;
