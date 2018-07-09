<?php
/**
 * Created by PhpStorm.
 * User: vitalijbukatkin
 * Date: 14.06.2018
 * Time: 11:28
 */
header("Location: ../../index.php");

session_start();

$login=$_POST['login'];
$passwd=$_POST['passwd'];
$repeat_passwd=$_POST['repeat-passwd'];
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$email=$_POST['email'];
$age=$_POST['age'];
$phone=$_POST['phone'];

$_SESSION["type"]="regist";

include "../inc/connect.php";

if($passwd!=$repeat_passwd){
    $_SESSION["message-error"]="Пароли не совпадают";
    return;
}

if(!$db->query("insert into users values(null, '$login', '$passwd', '$fn', '$ln', '$email', '$age', '$phone', null, null);")){
    $_SESSION["message-error"]="Ошибка добавления пользователя!";
}

$db->close();