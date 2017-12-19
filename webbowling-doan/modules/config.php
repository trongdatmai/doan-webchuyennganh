<?php
// code đổ dữ liệu sql vào websever admin
$objPdo = new PDO("mysql:host=localhost; dbname=dtbbowling", "root", "") or die('DATABASE CHẾT CMNR :(');
$objPdo->query("set names 'utf8' ");
?>