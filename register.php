<?php

session_start();
require "config.php";

if (isset($_POST["register"])) {

  if (register_user()) {
    echo "<script> document.location.href = 'login.php'; </script>";
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
  <title> Register | Tarvita Pastel </title>
</head>

<body>
  <div class="page-wrapper">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <?php include "sidebar.php"; ?>

      <div class="main-content">
        <div class="content">
          <h1> Register sebagai User </h1>
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

              <!-- konfirmasi -->
              <tr>
                <td> <label for="konfirmasi"> Konfirmasi Password* </label> </td>
                <td><center>:</center></td>
                <td><input type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi Password" class="form-input" required></td>
              </tr>

              <!-- phone -->
              <tr>
                <td> <label for="phone"> Phone* </label> </td>
                <td><center>:</center></td>
                <td><input type="text" name="phone" id="phone" placeholder="Phone" class="form-input" required></td>
              </tr>

              <!-- address -->
              <tr>
                <td> <label for="address"> Address* </label> </td>
                <td><center>:</center></td>
                <td><textarea name="address" id="address" class="form-input" placeholder="Address" required></textarea></td>
              </tr>

              <!-- submit -->
              <tr>
                <td colspan="3">
                  <center><button type="submit" name="register"> Register Now </button></center>
                </td>
              </tr>
              
              <tr>
                <td colspan="3">
                  <center><a href="login.php"> Already have an account? <br> Login now! </a></center>
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