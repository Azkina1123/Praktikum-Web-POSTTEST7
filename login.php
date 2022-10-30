<?php

session_start();
require "config.php";

$mode = (isset($_GET["mode"])) ? $_GET["mode"] :  "User";

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];
  if ($mode == "Admin" && $username == "admin" && $password == "123") {
    $_SESSION["mode"] = "admin";
    $_SESSION["username"] = $username;
    echo "<script>
            alert('Anda berhasil masuk sebagai admin!');
            document.location.href = 'index.php';
          </script>";
  } 

  if ($mode == "User" && login_user()) {
    $_SESSION["mode"] = "user";
    $_SESSION["username"] = $username;
    echo "<script> document.location.href = 'index.php'; </script>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="app/style.css?v=<?= time(); ?>">

  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <title> Login | Tarvita Pastel </title>
</head>

<body>
  <div class="page-wrapper login">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <?php include "sidebar.php"; ?>

      <div class="main-content">
        <div class="content">

          <h1> Login sebagai <?= $mode; ?> </h1>
          <p> <a href="login.php?mode=<?= ($mode == "User") ? "Admin" : "User"; ?>">
            Login sebagai <?= ($mode == "User") ? "Admin" : "User"; ?>
          </a> </p>

          <table cellspacing="10">
            <form action="" method="POST">
              <!-- username -->
              <tr>
                <td> <label for="username"> Username* </label> </td>
                <td><center>:</center></td>
                <td><input type="text" name="username" id="username" required placeholder="Username" class="form-input"></td>
              </tr>

              <!-- password -->
              <tr>
                <td> <label for="password"> Password* </label> </td>
                <td><center>:</center></td>
                <td><input type="password" name="password" id="password" required placeholder="Password" class="form-input"></td>
              </tr>

              <!-- submit -->
              <tr>
                <td colspan="3">
                  <center><button type="submit" name="login"> Login </button></center>
                </td>
              </tr>

              <tr>
                <td colspan="3">
                  <center><a href="register.php"> Don't have an account yet? <br> Register now! </a></center>
                </td>
              </tr>

            </form>
          </table>

        </div>
      </div>
    </div>

    <?php include "footer.php"; ?>

  </div>

  <script src="app/app.js?v=<?= time(); ?>"></script>
  <script src="app/jquery.js"></script>
</body>

</html>