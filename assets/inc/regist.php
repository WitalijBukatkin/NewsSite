<div class="regist">
    <form class="form" action="assets/php/regist.php" method="post">
        <div class="close">
            <span onclick="document.getElementsByClassName('regist')[0].style.display='none'">&times;</span>
        </div>
        <div id="message-error" style='color: red'>
            <?php
            if($_SESSION["type"]=="regist"){
                if(isset($_SESSION["message-error"])){
                    print('<h4 style="padding-left: 20px; padding-top: 20px;">'.$_SESSION["message-error"].'</h4>');
                    print("<script>document.getElementsByClassName('regist')[0].style.display='block';</script>");
                }
                session_destroy();
            }
            ?>
        </div>
        <div class="container">
            <h1>Регистрация</h1>
            <hr>
            <label><b>Логин</b><input type="text" placeholder="Логин" name="login" required></label>
            <label><b>Пароль</b><input type="password" placeholder="Пароль" name="passwd" required></label>
            <label><b>Повторите пароль</b><input type="password" placeholder="Повторите пароль" name="repeat-passwd" required></label>
            <label><b>Фамилия</b><input type="text" placeholder="Фамилия" name="fn" required></label>
            <label><b>Имя</b><input type="text" placeholder="Имя" name="ln" required></label>
            <label><b>Почта</b><input type="email" placeholder="Почта" name="email" required></label>
            <label><b>Возраст</b><input type="text" placeholder="Возраст" name="age" required></label>
            <label><b>Телефон</b><input type="text" placeholder="Телефон" name="phone" required></label>
            <div class="clearfix">
                <button type="button" onclick="document.getElementsByClassName('regist')[0].style.display='none'" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>