<?php session_start(); ?>


<?php include "db_connection.php"; ?>
<?php error_reporting(0); ?>

<?php
$BirthCertificate = $_GET['updateid'];

if (isset($_POST['submit'])) {

    $centerID = $_POST['centerID'];
    $second_dose_date = $_POST['second_dose_date'];

    $sql1 = "UPDATE first_dose_done
             SET second_dose_date = '$second_dose_date'
             WHERE BirthCertificate = '$BirthCertificate'";
    $result1 = mysqli_query($db_connection, $sql1);   //boolean return


    $sql2 = "INSERT second_dose_done (BirthCertificate)
           VALUES ('$BirthCertificate')";
    $result2 = mysqli_query($db_connection, $sql2);   //boolean return


    $sql3 = "INSERT vaccine_appointment (BirthCertificate, vaccineSchedule, centerID, dose_order)
            VALUES ('$BirthCertificate','$second_dose_date','$centerID','2')";
    $result3 = mysqli_query($db_connection, $sql3);


    $sql4 = "  SELECT vaccineName
             FROM vaccineinfo
             WHERE centerID = '$centerID'";
    $result4 = mysqli_query($db_connection, $sql4);  //obejct return

    $row4 = mysqli_fetch_assoc($result4);

    if ($result4) {
        $vaccineName = $row4['vaccineName'];
    }

    $sql5 = "UPDATE vaccine_appointment
          SET vaccineName = '$vaccineName'
          WHERE centerID = '$centerID' AND BirthCertificate = '$BirthCertificate'";
    $result5 = mysqli_query($db_connection, $sql5); //boolean return


    // $sql6 = "DELETE
    //          FROM unvaccinated
    //          WHERE BirthCertificate = '$BirthCertificate'";
    // $result6 = mysqli_query($db_connection, $sql6);



    if (($result1 && $result2 && $result3 && $result5) == true) {

        header("Location: update_form2.php?error=Updated Successfully!");
        exit();
    } else {

        header("Location: update_form2.php?error=COULD NOT BE UPDATED!");
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
                <h2><span class="noticemesenpai">SECOND DOSE</span> UPDATE</h2>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>

                <input type="text" name="centerID" placeholder="Center ID" required />

                <input type="date" name="second_dose_date" required />

                <button name="submit" class="btn"><a>ASSIGN</a></button>
            </form>
        </div>
        <!--end of container div -->
    </div>
</body>

</html>