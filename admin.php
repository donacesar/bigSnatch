<?php

$pdo = new PDO("mysql:host=localhost; dbname=bigsnatch", "mysql", "mysql");
$statement = $pdo->prepare(("SELECT * FROM posts ORDER BY id DESC"));
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>BC Big Snatch</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <script src="js/jquery.min.js"></script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700|Orbitron:400,500,700,900'
          rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--Animation-->
    <script src="js/wow.min.js"></script>
    <link href="css/animate.css" rel='stylesheet' type='text/css'/>
    <script>
        new WOW().init();
    </script>

</head>
<body>
<!----- start-header---->
<div class="banner two" id="home">
    <div class="header-bottom">
        <div class="fixed-header">
            <div class="container">
                <div class="logo">
                    <a href="blog.php"><h1>BC Big Snatch</h1></a>
                </div>
                <span class="menu"> </span>
                <div class="top-menu">
                    <nav class="navigation">
                        <ul class="cl-effect-16">
                            <li><a href="blog.php">Blog</a></li>
                            <li><a class="active" href="admin.php">Admin</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- script for menu -->
                <script>
                    $("span.menu").click(function () {
                        $(".top-menu").slideToggle("slow", function () {
                            // Animation complete.
                        });
                    });
                </script>
                <!-- script for menu -->
                <script>
                    $(document).ready(function () {
                        var navoffeset = $(".header-bottom").offset().top;
                        $(window).scroll(function () {
                            var scrollpos = $(window).scrollTop();
                            if (scrollpos >= navoffeset) {
                                $(".header-bottom").addClass("fixed");
                            } else {
                                $(".header-bottom").removeClass("fixed");
                            }
                        });
                    });
                </script>
                <!-- <div class="clearfix"></div> -->
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row single-top">
        <div class="col-md-8">
            <div class="blog_box">

                <form action="create_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-outline">
                        <label class="form-label" for="typeText">+ post title...</label>
                        <input type="text" required="required" id="typeText" class="form-control" name="title"/>
                    </div>
                    <br>
                    <div class="form-outline">
                        <label class="form-label" for="customFile">+ image</label>
                        <input type="file" required="required" id="customFile" name="image_file"/>
                    </div>
                    <br>
                    <div class="form-outline">
                        <label class="form-label" for="textAreaExample">+post content...</label>
                        <textarea required="required" class="form-control" id="textAreaExample" rows="4" name="text"></textarea>
                    </div>
                    <br>
                    <input type="submit"  class="btn btn-success" value="release post">
                    <br><br><br>
                </form>

                <?php foreach ($posts as $post): ?>
                    <div class="blog_box">
                        <div class="blog_grid">
                            <h3 class="wow rollIn animated" data-wow-delay="0.4s"><?= $post['title']; ?></h3>
                            <img src="<?= $post['image']; ?>" class="img-responsive" alt=""/>
                            <div class="singe_desc">
                                <p><?= $post['text']; ?></p>
                                <div class="comments">
                                    <ul class="links">
                                        <li>
                                            <i class="blog_icon1"></i><br><span><?= date('M d, Y', $post['date']); ?></span>
                                        </li>
                                        <li><a href="#"><i class="blog_icon3"> </i><br><span><?= (int)($post['likes']); ?></span></a>
                                        <li><a href="edit_form.php?id=<?=$post['id']; ?>"><input type="submit" class="btn btn-info" value="Edit"></a></li>
                                        <li><a href="#"><input type="submit" class="btn btn-danger" value="Delete"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <ul class="dc_pagination dc_paginationA dc_paginationA06 wow fadeInDownBig animated animated"
                    data-wow-delay="0.4s">
                    <li><a href="#" class="current">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">19</a></li>
                    <li><a href="#">20</a></li>
                    <li><a href="#" class="current">Next</a></li>
                </ul>
            </div>
            <!-- <div class="clearfix"></div> -->
        </div>
    </div>
</div>
<!----footer--->
<div class="footer">
    <div class="container">
        <div class="f-grids">
            <div class="col-md-4 footer-grid wow fadeInUpBig animated animated" data-wow-delay="0.3s">
                <div class="opening_hours">
                    <ul class="times">
                        <h3>Opening<span class="opening">Hours</span></h3>
                        <li><i class="calender"> </i><span class="week">Monday</span>
                            <div class="hours">h.6:00-h.24:00</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                        <li><i class="calender"> </i><span class="week">Tuesday</span>
                            <div class="hours">h.6:00-h.24:00</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                        <li><i class="calender"> </i><span class="week">Wednesday</span>
                            <div class="hours">h.6:00-h.24:00</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                        <li><i class="calender"> </i><span class="week">Thrusday</span>
                            <div class="hours">h.6:00-h.24:00</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                        <li><i class="calender"> </i><span class="week">Friday</span>
                            <div class="hours">h.6:00-h.24:00</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                        <li><i class="calender"> </i><span class="week">Saturday</span>
                            <div class="hours">h.6:00-h.24:00</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                        <li><i class="calender"> </i><span class="week">Sunday</span>
                            <div class="hours">Closed</div>
                            <!-- <div class="clearfix"></div> -->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 footer-grid wow fadeInUpBig animated animated" data-wow-delay="0.2s">
                <h3>contact<span class="opening">info</span></h3>
                <ul class="address">
                    <li>123, new street, 129907 London</li>
                    <li>023 456 23456</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--start-smoth-scrolling-->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!--start-smoth-scrolling-->
<script type="text/javascript">
    $(document).ready(function () {
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover"
                                                                         style="opacity: 1;"> </span></a>
</body>
</html>