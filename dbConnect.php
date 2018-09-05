<?php

$db_host ='localspencer'; //database is installed on php server
$db_user = 'spencer'; //username - to login to mysql
$db_password = 'southhills#'; //password to login to mysql
$db_name ='spencer'; //name of the database within mysql
$conn = new mysqli($db_host, $db_user, $db_password,$db_name);
 if ($conn->connect_error){
   die("Connection Failed: " . $conn->connect_error);
 }?>
