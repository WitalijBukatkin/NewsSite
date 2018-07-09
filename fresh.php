<?php session_start();?>
<!DOCTYPE HTML>
<html>
<head lang="en">
    <meta charset="utf-8" />
    <title>Новости</title>
    <link href="assets/css/main.css" rel="stylesheet" />
    <link href="assets/css/header.css" rel="stylesheet" />
    <link href="assets/css/footer.css" rel="stylesheet" />
    <link href="assets/css/newsblocks.css" rel="stylesheet" />
    <link href="assets/css/login.css" rel="stylesheet" >
    <link href="assets/css/regist.css" rel="stylesheet" >
</head>
<body>
<?php
include "assets/inc/header.php";
include "assets/inc/login.php";
include "assets/inc/regist.php";
include "assets/inc/connect.php";
?>
<h2 align="center">Свежее</h2>

<div class="news">
        <?php
            $query=$db->query("select artikel.id, artikel.header, contents.content, images.image from artikel, images, contents where images.block=0 and artikel.id=images.artikel and contents.block=1 and artikel.id=contents.artikel order by artikel.id desc limit 15;");
            while(list($id, $header, $content, $image)=$query->fetch_row()){
                print "<a href='artikel.php?artikel=$id'>";
                print "    <h2>$header</h2>";
                print "    <img src='data:image/jpeg;base64,".base64_encode($image)."' style='width: 100%; max-height: 150px;'>";
                print "<p>";
                foreach(explode(' ', $content) as $key => $i)
                    if($key<40) print $i.' '; else break;
                print "...</p></a>";
            }
        ?>
    </div>
<?php include "assets/inc/footer.php" ?>
</body>
</html>