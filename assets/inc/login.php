<script src="assets/js/login.js"></script>
<div class="login">
    <form class="form" action="assets/php/login.php" method="post">
        <div class="close">
            <span onclick="document.getElementsByClassName('login')[0].style.display='none'">&times;</span>
        </div>
        <div id="message-error" style='color: red'>
            <?php
            if($_SESSION["type"]=="login"){
                if(isset($_SESSION["message-error"])){
                    print('<h4 style="padding-left: 20px; padding-top: 20px;">'.$_SESSION["message-error"].'</h4>');
                    print("<script>document.getElementsByClassName('login')[0].style.display='block';</script>");
                }
                session_destroy();
            }
            ?>
        </div>
        <div class="container">
            <label><b>Имя пользователя</b><input type="text" placeholder="Введите имя пользователя" name="login" required></label>
            <label><b>Пароль</b><input type="password" placeholder="Введите пароль" name="passwd" required></label>
            <a href="#" onclick="document.getElementsByClassName('regist')[0].style.display='block';">У меня нет пароля! Но есть деньги</a>
            <button type="submit">Войти</button>
        </div>
    </form>
</div>