<a id="menuShower" href="#" onclick="document.getElementsByTagName('nav')[0].style.display=(document.getElementsByTagName('nav')[0].style.display==='')?'block':''"><img src="assets/img/menu.png" width="20px"></a>
<header>
    <nav>
        <ul>
            <li><a href="index.php"><img src="assets/img/news.svg"></a></li>
            <li><a href="it.php">IT</a></li>
            <li><a href="fresh.php">Свежее</a></li>
            <li><a href="vulnerability.php">Уязвимости</a></li>
            <li><a href="allcategory.php">Интересные</a></li>
            <?php if($_COOKIE['login']!=null) print("<li><a onclick='clearCookie()'>Выход из ".$_COOKIE["login"]."</a></li>");
            else print "<li><a onclick='showLogin()' style='width:auto;'\" href=\"#\"><img src=\"assets/img/login.png\">Войти</a></li>";
            ?>
        </ul>
    </nav>
</header>