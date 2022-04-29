<?php
session_start();

if (isset($_SESSION['UserID']) && isset($_SESSION['userPassword'])) {



?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WELCOME TO COVAC</title>
    </head>

    <body>
        <h1>THIS IS USER HOMEPAGE</h1>
    </body>

    </html>


<?php

} else {

    header("Location: index.php");
    exit();
}


?>


<!-- <a href="logout.php">LOG OUT</a> -->