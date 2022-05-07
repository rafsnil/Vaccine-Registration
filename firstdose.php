<?php

session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: index.php");
}

?>

<?php include "db_connection.php"; ?>
<!-- <?php error_reporting(0); ?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN HOME</title>
    <script src="https://kit.fontawesome.com/4b16512cb7.js" crossorigin="anonymous"></script>

    <link href="CSS/niloy.css" rel="stylesheet" type="text/css" />
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

        <div class="welcome">

            <h1>ISSUE <span class="noticemesenpai">FIRST DOSE</span> DATE AND VACCINE CENTER</h1>

        </div>

        <div class="tablecontainer">

            <h3>USERS INFORMATION:</h3>
            <table class="table1">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Birth Certificate No.</th>
                        <th>Full Name</th>
                        <th>First Dose Date</th>
                        <th>Assign Date & Center</th>
                    </tr>
                </thead>
                <tbody>

                    <?php


                    $sql = "SELECT uv.BirthCertificate, ri.FullName, uv.firstDoseDate
                           FROM unvaccinated uv, registration_info ri
                           WHERE uv.BirthCertificate = ri.BirthCertificate";

                    // $sql = "SELECT un.BirthCertificate, ri.FullName, ap.vaccineSchedule, ap.centerID
                    // FROM registration_info ri, vaccine_appointment ap, unvaccinated uv
                    // WHERE ri.BirthCertificate = uv.BirthCertificate AND ri.BirthCertificate = ap.BirthCertificate AND ap.dose_order = '1'";

                    $result = mysqli_query($db_connection, $sql);

                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            $serial++;
                            $fullname = $row['FullName'];
                            $bcnum = $row['BirthCertificate'];
                            $date = $row['firstDoseDate'];

                            echo '<tr>
                              <th>' . $serial . '</th>
                              <td>' . $bcnum . '</td>
                              <td>' .  $fullname . '</td>
                              <td>' .  $date . '</td>
                              <td>
                              <button class="btn1"><a href="update_form1.php?updateid=' . $bcnum . '">UPDATE</a></button>
                          </td>
                          </tr>';
                        }
                    }


                    ?>

                </tbody>
            </table>
        </div>





    </div><!-- END OF Table Container -->





</body>

</html>