<?php

session_start();

if (!isset($_SESSION['UserID'])) {
    header("Location: index.php");
}

?>

<?php include "db_connection.php"; ?>
<?php error_reporting(0); ?>



<?php



if (isset($_GET['deleteid'])) {

    $centerID = $_GET['deleteid'];

    $sql1 = "DELETE 
             FROM vaccineinfo
             WHERE centerID = '$centerID'";

    $result1 = mysqli_query($db_connection, $sql1);   //boolean return

    $sql2 = "DELETE 
             FROM vaccinecenter
             WHERE centerID = '$centerID'";

    $result2 = mysqli_query($db_connection, $sql2);   //boolean return


    if ($result1 == true && $result2 == true) {

        echo '<script>alert("Removed Successfully!", "center.php");
        window.location.href="center.php";
        </script>';
    }
}
?>