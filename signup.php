<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>COVAC Registration</title>
  <link rel="stylesheet" href="CSS/niloy.css" />
</head>

<body>
  <div class="main">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo">COVAC</h2>
      </div>
      <div class="menu">
        <ul class="navi">
          <li class="navilist"><a href="index.php">HOME</a></li>
          <li class="navilist"><a href="about.php">ABOUT</a></li>
          <li class="navilist"><a href="contact.php">CONTACT</a></li>
          <li class="navilist">
            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">SURPRISE!</a>
          </li>
        </ul>
      </div>
      <div class="righty"><a href="signup.php">SIGN UP</a></div>
    </div>

    <div class="container">
      <form class="f2" action="registration.php" method="post">
        <h2>SIGN UP</h2>

        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <input type="text" id="fullname" name="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>" required />

        <input type="email" id="email" name="email" placeholder="xyz@gmail.com" value="<?php echo $email; ?>" required />

        <input type="text" id="phonenum" name="phonenum" placeholder="Phone Number" value="<?php echo $phonenum; ?>" required />

        <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>" required />

        <input type="text" id="bcnum" name="bcnum" placeholder="Birth Certificate Number" value="<?php echo $bcnum; ?>" required />

        <input type="text" name="gender" placeholder="Gender" value="<?php echo $gender; ?>" required />

        <input type="text" id="address" name="address" placeholder="Address" value="<?php echo $address; ?>" required />

        <div class="partition">
          <input type="text" id="username" name="username" placeholder="User Name" value="<?php echo $username; ?>" required />

          <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required />

          <input type="password" id="password1" name="password1" placeholder="Re-Enter Password" value="<?php echo $_POST['password1']; ?>" required />
        </div>

        <button name="submit" class="btn"><a>SUBMIT</a></button>
      </form>
    </div>
    <!--end of container div -->
  </div>
</body>

</html>