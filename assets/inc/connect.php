<?php
$db=new mysqli("localhost:3306", "root");
$db->select_db('newssite');
$db->set_charset('utf8');