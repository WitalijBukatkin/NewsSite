<?php
/**
 * Created by PhpStorm.
 * User: vitalijbukatkin
 * Date: 14.06.2018
 * Time: 11:28
 */
header("Location: ../../index.php");

session_start();

include "../inc/connect.php";

$login=$_POST['login'];
$pas=$_POST['passwd'];

$_SESSION["type"]="login";

$query=$db->query("select id from users where login='$login' and passwd='$pas';");

if($query->fetch_row()==null)
    $_SESSION["message-error"]="Username or Password is incorrect!";
else{
    setcookie("login", $login, null, "/");
    setcookie("passwd", $pas, null, "/");
}

$db->close();