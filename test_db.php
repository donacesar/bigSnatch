<?php 

$pdo = new PDO("mysql:host=localhost; dbname=bigsnach", "mysql", "mysql" );

$statement = $pdo->prepare(("SELECT * FROM posts"));
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($posts);
