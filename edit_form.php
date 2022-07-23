<?php

$id = $_GET['id'];
// var_dump($id);
$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
$statement = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$statement->execute(['id' => $id]);
// $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
$post = $statement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <title>Edit post</title>
</head>
<body>
    <div class="col-md-8">       
            <div class="blog_box">
    <form action="edit_post.php" method="post" enctype="multipart/form-data">
        <div class="form-outline">
            <label class="form-label" for="typeText">+ post title...</label>            
            <input type="text" required="required" id="typeText" class="form-control" name="title" value="<?= $post['title']?>"/>
        </div>
        <br>
        <div class="form-outline">
        <label class="form-label" for="customFile">+ image</label>
        <img src="<?= $post['image']; ?>" class="img-responsive-edit" alt=""/>
        <input type="file" required="required" id="customFile" name="image_file" >
    </div>
        <br>
        <div class="form-outline">
            <label class="form-label" for="textAreaExample">+post content...</label>
            <textarea required="required" class="form-control" id="textAreaExample" rows="4" name="text"><?= $post['text']?></textarea>
        </div>
        <br>
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <input href="edit_form.php" type="submit" class="btn btn-success" value="release post">
    </form>	
    </div>
    </div>	
</body>
</html>