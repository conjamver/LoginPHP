<?php
$server = "localhost";
$username = "root";
$password="";
$db = "loginphp";

//create connection
$conn = mysqli_connect($server, $username, $password, $db);

//check connection
if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
    
?>