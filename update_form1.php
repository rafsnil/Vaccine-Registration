<?php session_start(); ?>


<?php include "db_connection.php"; ?>
<?php error_reporting(0); ?>


<?php
$BirthCertificate = $_GET['updateid'];

if (isset($_POST['submit'])) {

  $centerID = $_POST['centerID'];
  $firstDoseDate = $_POST['firstDoseDate'];

  $sql1 = "UPDATE unvaccinated
           SET firstDoseDate = '$firstDoseDate'
           WHERE BirthCertificate = '$BirthCertificate'";
  $result1 = mysqli_query($db_connection, $sql1);   //boolean return

  $sql8 = "INSERT vaccine_appointment (BirthCertificate)
           VALUES ('$BirthCertificate')";
  $result8 = mysqli_query($db_connection, $sql8);   //boolean return

  $sql2 = "UPDATE vaccine_appointment
           SET vaccineSchedule = '$firstDoseDate'
           WHERE BirthCertificate = '$BirthCertificate'";
  $result2 = mysqli_query($db_connection, $sql2);  //boolean return

  $sql3 = "INSERT INTO first_dose_done (BirthCertificate)
           VALUES ('$BirthCertificate')";
  $result3 = mysqli_query($db_connection, $sql3); //boolean return

  $sql4 = "UPDATE vaccine_appointment
           SET centerID = '$centerID'
           WHERE BirthCertificate = '$BirthCertificate'";
  $result4 = mysqli_query($db_connection, $sql4); //boolean return

  $sql5 = "  SELECT vaccineName
             FROM vaccineinfo
             WHERE centerID = '$centerID'";
  $result5 = mysqli_query($db_connection, $sql5);  //obejct return

  $row5 = mysqli_fetch_assoc($result5);

  if ($result5) {
    $vaccineName = $row5['vaccineName'];
  }

  $sql6 = "UPDATE vaccine_appointment
          SET vaccineName = '$vaccineName'
          WHERE centerID = '$centerID' AND BirthCertificate = '$BirthCertificate'";
  $result6 = mysqli_query($db_connection, $sql6); //boolean return

  $sql7 = "UPDATE vaccine_appointment
           SET dose_order = '1'
           WHERE BirthCertificate = '$BirthCertificate'";
  $result7 = mysqli_query($db_connection, $sql7); //boolean return


  if (($result1 && $result2 && $result3 && $result4 && $result6 && $result7 && $result8) == true) {

    header("Location: update_form1.php?error=Updated Successfully!");
    exit();
  } else {

    header("Location: update_form1.php?error=COULD NOT BE UPDATED!");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>COVAC Registration</title>
  <script src="https://kit.fontawesome.com/4b16512cb7.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/niloy.css" />
</head>

<body>
  <div class="main2">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo">COVAC</h2>
      </div>
      <div class="menu">
        <ul class="navi">
          <li class="navilist"><a href="admin.php">HOME</a></li>
          <li class="navilist"><a href="about.php">ABOUT</a></li>
          <li class="navilist"><a href="contact.php">CONTACT</a></li>
          <li class="navilist">
            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">SURPRISE!</a>
          </li>
        </ul>
      </div>
      <div class="righty"><a href="logout.php">LOG OUT</a></div>
    </div>

    <input type="checkbox" id="check">
    <label for="check">

      <i class="fas fa-bars" id="checker"></i>
      <i class="fas fa-times" id="canceler"></i>

    </label>

    <div class="sidebar">
      <header>MANAGEMENT PANEL</header>
      <ul class="utility">
        <li>
          <a class="uti" href="center.php"><i class="fa-solid fa-hospital"></i>CENTERS</a>
        </li>
        <li>
          <a class="uti" href="firstdose.php"><i class="fa-solid fa-syringe"></i>FIRST DOSE</a>
        </li>
        <li>
          <a class="uti" href="seconddose.php"><i class="fa-solid fa-syringe"></i>SECOND DOSE</i></a>
        </li>
        <li>
          <a class="uti" href="boosterdose.php"><i class="fa-solid fa-syringe"></i></i>BOOSTER DOSE</a>
        </li>


      </ul>
    </div>

    <div class="container" id="updateform1">
      <form class="f2" method="post">
        <h2><span class="noticemesenpai">FIRST DOSE</span> UPDATE</h2>

        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <input type="text" name="centerID" placeholder="Center ID" required />

        <input type="date" name="firstDoseDate" required />

        <button name="submit" class="btn"><a>ASSIGN</a></button>
      </form>
    </div>
    <!--end of container div -->
  </div>
</body>

</html>