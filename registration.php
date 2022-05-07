<?php

include 'db_connection.php';
error_reporting(0);

if (isset($_POST['submit'])) {

    $fullname     = $_POST['fullname'];
    $email        = $_POST['email'];
    $phonenum     = $_POST['phonenum'];
    $dob          = $_POST['dob'];
    $bcnum        = $_POST['bcnum'];
    $gender       = $_POST['gender'];
    $address      = $_POST['address'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $password1    = $_POST['password1'];

    $sql = "SELECT BirthCertificate FROM registration_info WHERE BirthCertificate ='$bcnum'";

    $result = mysqli_query($db_connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Already registered with this Birth Certificate!")</script>';
    }

    if ($username == 'admin') {
        echo '<script>alert("Bruh WTF? Who do you think you are? You are not an admin. Go change your user name RIGHT NOW!")</script>';
    }

    $sql1 = "SELECT BirthCertificate FROM registration_info WHERE userID ='$username'";

    $result1 = mysqli_query($db_connection, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        echo '<script>alert("User Name Taken! Use a different User Name.")</script>';
    }

    if ($password != $password1) {
        echo '<script>alert("Password Mismatch!")</script>';
    }

    $sql1 = "INSERT INTO registration_info (BirthCertificate, UserID, userPassword, FullName, dateOfBirth, phoneNum, email, address, gender )
    VALUES ('$bcnum', '$username', '$password', '$fullname', '$dob', '$phonenum', '$email', '$address', '$gender')";
    $result1 = mysqli_query($db_connection, $sql1);

    $sql2 = "INSERT INTO unvaccinated (BirthCertificate)
     VALUES ('$bcnum')";
    $result2 = mysqli_query($db_connection, $sql2);

    if ($result1 && $result2) {
        header("Location: index.php?error= REGISTRATION SUCCESSFUL");
    } else {
        echo '<script>alert("Oops! Something went wrong!")</script>';
    }
}
