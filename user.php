<?php

session_start();
error_reporting(0);

if (!isset($_SESSION['UserID'])) {
  header("Location: index.php");
}

?>

<?php include "db_connection.php"; ?>


<?php

$username = $_SESSION['UserID'];
$password = $_SESSION['userPassword'];

$sql = "SELECT * FROM registration_info WHERE UserID ='$username' AND userPassword = '$password' ";

$result = mysqli_query($db_connection, $sql);

if ($result) {
  $row = mysqli_fetch_assoc($result);

  $bcnum = $row['BirthCertificate'];
  $name = $row['FullName'];
  $dob = $row['dateOfBirth'];
  $number = $row['phoneNum'];
  $email = $row['email'];
  $address = $row['address'];
  $gender = $row['gender'];
}


$sql1 = "SELECT * FROM vaccine_appointment WHERE BirthCertificate = '$bcnum' AND dose_order = '1' ";

$result1 = mysqli_query($db_connection, $sql1);

if ($result1) {
  $row = mysqli_fetch_assoc($result1);

  $firstdosedate = $row['vaccineSchedule'];
  $vaccinename1 = $row['vaccineName'];
  $vaccinecenter = $row['centerID'];
}

$sql2 = "SELECT name FROM vaccinecenter WHERE centerID = '$vaccinecenter'";

$result2 = mysqli_query($db_connection, $sql2);

if ($result2) {
  $row = mysqli_fetch_assoc($result2);
  $centername = $row['name'];
}

$sql3 = "SELECT vaccineSchedule, vaccineName FROM vaccine_appointment WHERE BirthCertificate = '$bcnum' AND dose_order = '2' ";

$result3 = mysqli_query($db_connection, $sql3);

if ($result3) {
  $row = mysqli_fetch_assoc($result3);

  $seconddosedate = $row['vaccineSchedule'];
  $vaccinename2 = $row['vaccineName'];
}

$sql4 = "SELECT vaccineSchedule, vaccineName FROM vaccine_appointment WHERE BirthCertificate = '$bcnum' AND dose_order = '3' ";

$result4 = mysqli_query($db_connection, $sql4);

if ($result4) {
  $row = mysqli_fetch_assoc($result4);

  $thirddosedate = $row['vaccineSchedule'];
  $vaccinename3 = $row['vaccineName'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>COVAC Login</title>
  <link rel="stylesheet" href="CSS/iazdanul.css" />
</head>

<body>
  <div class="main">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo">COVAC</h2>
      </div>
      <div class="menu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="contact.php">CONTACT</a></li>
          <li>
            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">SURPRISE!</a>
          </li>
        </ul>
      </div>
      <div class="righty"><a href="logout.php">LOG OUT</a></div>
    </div>
    <!--navibar-->

    <div class="userinfobox">
      <div class="wcbox">
        <!--this will show a welcome note to the user & if possible use BE to show his/her user name-->
        <h2 class="wctxt">Welcome <?php echo $_SESSION['UserID']; ?></h2>
      </div>
      <div class="infobox">
        <!--this box will contain general info-->
        <div class="ib">
          <h3>Full Name:</h3>
          <div class="ibbox"><?php echo $name ?></div>
        </div>
        <div class="ib">
          <h3>Gender:</h3>
          <div class="ibbox"><?php echo $gender ?></div>
        </div>
        <div class="ib">
          <h3>Date of Birth(YYYY-MM-DD):</h3>
          <div class="ibbox"><?php echo $dob ?></div>
        </div>
        <div class="ib">
          <h3>Address:</h3>
          <div class="ibbox">
            <?php echo $address ?>
          </div>
        </div>
        <div class="ib">
          <h3>Phone number:</h3>
          <div class="ibbox"><?php echo $number ?></div>
        </div>
        <div class="ib">
          <h3>Email address:</h3>
          <div class="ibbox"><?php echo $email ?></div>
        </div>
        <div class="ib">
          <h3>Appointment Information:</h3>
        </div>
      </div>
      <div class="vacbox">
        <!--vaccine date, name, center-->
        <table class="vbtable">
          <tr>
            <th class="vbhead">Vaccine Dose</th>
            <th class="vbhead">Vaccine Date<br />(YYYY-MM-DD)</th>
            <th class="vbhead">Vaccine Name</th>
            <th class="vbhead">Vaccine Center</th>
          </tr>
          <tr>
            <td class="vbbody">first dose</td>
            <td class="vbbody"><?php echo $firstdosedate ?></td>
            <td class="vbbody"><?php echo $vaccinename1 ?></td>
            <td class="vbbody"><?php echo $centername ?></td>
          </tr>
          <tr>
            <td class="vbbody">second dose</td>
            <td class="vbbody"><?php echo $seconddosedate ?></td>
            <td class="vbbody"><?php echo $vaccinename2 ?></td>
            <td class="vbbody"><?php echo $centername ?></td>
          </tr>
          <tr>
            <td class="vbbody">booster dose</td>
            <td class="vbbody"><?php echo $thirddosedate ?></td>
            <td class="vbbody"><?php echo $vaccinename3 ?></td>
            <td class="vbbody"><?php echo $centername ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>

</html>