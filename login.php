 <?php
  session_start();
  include "db_connection.php";

  if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registration_info WHERE UserID ='$username' AND userPassword = '$password' ";

    $result = mysqli_query($db_connection, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);

      if ($row['UserID'] === $username && $row['userPassword'] === $password) {
        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['userPassword'] = $row['userPassword'];

        header("Location: user.php");
        exit();
      } else {

        header("Location: index.php?error=Incorrect Username or Password");
        exit();
      }
    } else if ($username == "admin" && $password == "admin420") {

      $_SESSION['UserID'] = $username;
      $_SESSION['userPassword'] = $password;

      header("Location: admin.php");
      exit();
    } else {

      header("Location: index.php?error=Incorrect Username or Password");
      exit();
    }
  } else {

    header("Location: index.php");
    exit();
  }

  ?>


 