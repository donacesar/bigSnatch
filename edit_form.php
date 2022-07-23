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
            <input type="text" id="typeText" class="form-control" name="title"/>
          </div>
        <br>
        <div class="form-outline">
        <label class="form-label" for="customFile">+ image</label>
        <input type="file" class="form-control" id="customFile" name="image_file"/>
    </div>
        <br>
        <div class="form-outline">
            <label class="form-label" for="textAreaExample">+post content...</label>
            <textarea class="form-control" id="textAreaExample" rows="4" name="text"></textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-success" value="release post">
    </form>	
    </div>
    </div>	
</body>
</html>