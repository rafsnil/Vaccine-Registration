<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "project";

$db_connection = mysqli_connect($host, $user, $password, $db_name);

if ($db_connection == false) {
    die("Unable to connect to the DataBase");
}
