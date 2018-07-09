<?php session_start()?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новости</title>
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="assets/css/slider.css" rel="stylesheet">
    <link href="assets/css/artikel.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/regist.css" rel="stylesheet">
    <link href="assets/css/comments.css" rel="stylesheet" >
    <script src="assets/js/slider.js"></script>
</head>
<body>
    <?php
        include "assets/inc/header.php";
        include "assets/inc/login.php";
        include "assets/inc/regist.php";
        include "assets/inc/connect.php";
        include "assets/inc/comments.php";

        $artikel=$_GET["artikel"];
        if($artikel<=0 || $artikel>$db->query("select count(id) from artikel;")->fetch_row()[0])
            print '<script>showSite(1)</script>';
        list($id, $name, $author, $date, $subject, $image)=$db->query("select artikel.*, images.image from artikel, images where artikel.id=$artikel and images.artikel=$artikel and images.block=0")->fetch_row();
        print "<script>let siteIndex=$artikel;</script>";
    ?>

    <div class="slider">
        <div class="container">
            <a href="<?php print "artikel.php?artikel=$artikel"; ?>" class="slide" style="display: block">
                <?php
                    print "<img src='data:image/jpeg;base64,".base64_encode($image)."' style='width:100%; max-height: 600px'>";
                    print "<div class='slide-header'>$name</div>";
                    print "<div>Тема $subject | Дата $date | $author</div>";
                ?>
            </a>
            <a class="prev" onclick="showSite(--siteIndex)">&#10094;</a>
            <a class="next" onclick="showSite(++siteIndex)">&#10095;</a>
        </div>
    </div>

    <div class="artikel">
        <?php
            $query=$db->query("select name, block, content from contents where artikel=$artikel");
            while(list($name, $block, $content)=$query->fetch_row()){
                print "<div class='block$block'>";
                if($name!=null) print "<h2>$name</h2>";
                print "<p>$content<p/>";
                $images=$db->query("select image from images where artikel=$artikel and block = $block");
                while(list($image)=$images->fetch_row())
                    print '<div align="center"><img src="data:image/jpeg;base64,'.base64_encode($image).'"/></div>';
                print "</div>";
            }
        ?>
    </div>

    <div align="center" class="comments">

    </div>

    <div class="comments-container">
        <h2>Комментарии<button onclick="document.getElementsByClassName('comments')[0].style.display='block'">Добавить</button></h2>
        <?php
            $query=$db->query("select  text, login from comments where artikel=$artikel");
            while(list($text, $login)=$query->fetch_row()){
                print "<div class='comment-block'>";
                print "    <h3>$login</h3>";
                print "    <p>$text</p>";
                print "</div>";
            }
        ?>
    </div>
    <?php include "assets/inc/footer.php" ?>
</body>
</html>