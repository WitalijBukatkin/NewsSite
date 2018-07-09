<?php
/**
 * Created by PhpStorm.
 * User: vitalijbukatkin
 * Date: 14.06.2018
 * Time: 11:28
 */

session_start();

$artikel=$_POST['artikel'];
$text=$_POST['text'];

$login=$_COOKIE["login"];
$passwd=$_COOKIE["passwd"];

$_SESSION["type"]="comments";

header("Location: ../../artikel.php?artikel=$artikel");

include "../inc/connect.php";

if($login==null || $passwd==null){
    $_SESSION["message-error"]="Вы не авторизировались!<script>document.getElementsByClassName('login')[0].style.display='block';</script>";
    return;
}

$query=$db->query("select id from users where login='$login' and passwd='$passwd';");
if($query->fetch_row()==null) {
    $_SESSION["message-error"] = "Username or Password is incorrect!";
    return;
}

if(!$db->query("insert into comments values (null, '$artikel', '$text', '$login')")) {
    $_SESSION["message-error"] = "Комментарий почему то не добавлен!";
    return;
}

$db->close();