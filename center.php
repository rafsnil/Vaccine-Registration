<?php

session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: index.php");
}

?>

<?php include "db_connection.php"; ?>
<?php error_reporting(0); ?>



<?php

if (isset($_POST['submit'])) {

    $centerID = $_POST['centerID'];
    $name =  $_POST['name'];
    $address = $_POST['address'];
    $vaccineName =  $_POST['vaccineName'];

    $sql1 = "INSERT INTO vaccinecenter (centerID, name, address)
             VALUES ('$centerID','$name','$address')";
    $result1 = mysqli_query($db_connection, $sql1);

    $sql2 = "INSERT INTO vaccineinfo (centerID, vaccineName)
             VALUES ('$centerID','$vaccineName')";
    $result2 = mysqli_query($db_connection, $sql2);

    if (($result1 && $result2) == true) {

        echo '<script>alert("Center Updated!")</script>';
    } else {

        echo '<script>alert("Could not be Updated!")</script>';
    }
}

?>










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

        <div class="infoupdate">

            <form class="forminfoupdate" method="post">
                <h3>ADD CENTER WITH VACCINE</h3>

                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <input type="text" name="centerID" placeholder="Center ID" required />
                <input type="text" name="name" placeholder="Center Name" required />
                <input type="text" name="address" placeholder="Center Address" required />
                <input type="text" name="vaccineName" placeholder="Vaccine Name" required />
                <button class="btn1" name="submit"><a>ADD</a></button>
            </form>

        </div>


        <div class="tablecontainer" id="welcomenai">

            <h3>CENTER AND VACCINE INFORMATION:</h3>
            <table class="table1">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Center ID</th>
                        <th>Center Name</th>
                        <th>Address</th>
                        <th>Vaccine Name</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $sql = "SELECT vc.centerID, vc.name, vc.address, vi.vaccineName
                                FROM vaccinecenter vc, vaccineinfo vi
                                WHERE vc.centerID = vi.centerID";

                    $result = mysqli_query($db_connection, $sql);

                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            $serial++;
                            $centerID = $row['centerID'];
                            $name = $row['name'];
                            $address = $row['address'];
                            $vaccineName = $row['vaccineName'];

                            echo '<tr>
                              <th>' . $serial . '</th>
                              <td>' . $centerID . '</td>
                              <td>' . $name . '</td>
                              <td>' . $address . '</td>
                              <td>' . $vaccineName . '</td>
                              <td><button class="btn1" id="remove""><a href="deletecenter.php?deleteid=' . $centerID . '">REMOVE</a></button></td>
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