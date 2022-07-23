<?php

$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
$statement = $pdo->prepare(("SELECT * FROM posts"));
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
// $id = $_GET SELECT id WHERE id = :id;
var_dump($_GET); die;
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
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline">
            <label class="form-label" for="typeText">+ post title...</label>            
            <input type="text" required="required" id="typeText" class="form-control" name="title" value="<?= $posts[0]['title']?>"/>
        </div>
        <br>
        <div class="form-outline">
        <label class="form-label" for="customFile">+ image</label>
        <img src="<?= $posts[0]['image']; ?>" class="img-responsive-edit" alt=""/>
        <input type="file" required="required" id="customFile" name="image_file" >
    </div>
        <br>
        <div class="form-outline">
            <label class="form-label" for="textAreaExample">+post content...</label>
            <textarea required="required" class="form-control" id="textAreaExample" rows="4" name="text"><?= $posts[0]['text']?></textarea>
        </div>
        <br>
        <input type="hidden" name="id" value="<?=$posts?>">
        <input href="edit_form.php" type="submit" class="btn btn-success" value="release post">
    </form>	
    </div>
    </div>	
</body>
</html>