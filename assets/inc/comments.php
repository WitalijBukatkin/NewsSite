<div class="comments">
    <form class="form" action="assets/php/comments.php" method="post">
        <div class="close">
            <span onclick="document.getElementsByClassName('comments')[0].style.display='none'">&times;</span>
        </div>
        <div id="message-error" style='color: red'>
            <?php
            if($_SESSION["type"]=="comments"){
                if(isset($_SESSION["message-error"])){
                    print('<h4 style="padding-left: 20px; padding-top: 20px;">'.$_SESSION["message-error"].'</h4>');
                    print("<script>document.getElementsByClassName('comments')[0].style.display='block';</script>");
                }
                session_destroy();
            }
            ?>
        </div>
        <div class="container">
            <h1>Комментарий</h1>
            <input type="hidden" name="artikel" value="<?php print $_GET["artikel"]; ?>"/>
            <textarea name="text"></textarea>
            <div class="clearfix">
                <button type="button" onclick="document.getElementsByClassName('comments')[0].style.display='none'" class="cancelbtn">Отмена</button>
                <button type="submit" class="signupbtn">Добавить</button>
            </div>
        </div>
    </form>
</div>