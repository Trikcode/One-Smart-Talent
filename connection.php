<?php
session_start();
$db_host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'onesmartalent';

$conn = mysqli_connect($db_host, $username, $password, $db_name);
 if(!$conn){
          die('Could not Connect MySql Server:');
        }
 
?>

