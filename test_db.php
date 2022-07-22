<?php 

$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql" );

$statement = $pdo->prepare(("SELECT * FROM posts"));
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
 var_dump($posts);

function d ($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
};

 d($posts);

