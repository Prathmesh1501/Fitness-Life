<?php
    //start session
    session_start();

//Create Constants to store Non Repeating values
define('SITEURL','http://localhost/Fitness_Life/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME', 'fitness_life');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());  //Selecting Database


?>