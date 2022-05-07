<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COVAC Login</title>
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

        <div class="content">
            <div class="login box">
                <form class="form" action="login.php" method="post">
                    <h2>LOGIN HERE</h2>

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <button class="btn"><a>LOGIN</a></button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>