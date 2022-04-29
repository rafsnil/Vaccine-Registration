<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>COVAC Registration</title>
  <link rel="stylesheet" href="CSS/style.css" />
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
          <li><a href="#">ABOUT</a></li>
          <li><a href="#">CONTACT</a></li>
          <li>
            <a href="https://www.youtube.com/watch?v=xvFZjo5PgG0">SURPRISE!</a>
          </li>
        </ul>
      </div>
      <div class="righty"><a href="signup.php">SIGN UP</a></div>
    </div>

    <div class="container">
      <form class="f2" method="post">
        <h2>SIGN UP</h2>

        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required />

        <input type="email" id="email" name="email" placeholder="xyz@gmail.com" required />

        <input type="text" id="phonenum" name="phonenum" placeholder="Phone Number" required />

        <input type="date" id="dob" name="dob" required />

        <input type="text" id="bcnum" name="bcnum" placeholder="Birth Certificate Number" required />

        <input type="text" name="gender" placeholder="Gender" required />

        <input type="text" id="address" name="address" placeholder="Address" required />

        <div class="partition">
          <input type="text" id="username" name="username" placeholder="User Name" required />

          <input type="password" id="password" name="password" placeholder="Password" required />

          <input type="password" id="password1" name="password1" placeholder="Re-Enter Password" required />
        </div>

        <button class="btn" type="submit"><a href="#">SIGN UP</a></button>
      </form>
    </div>
    <!--end of wrap div -->
  </div>
</body>

</html>