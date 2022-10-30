<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="app/style.css?v=<?= time(); ?>">

  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">

  <title> About Us | Tarvita Pastel </title>

</head>

<body>
  <div class="page-wrapper about-us-page">

    <?php include "header.php"; ?>

    <div class="content-wrapper">

      <?php include "sidebar.php"; ?>

      <div class="main-content">

        <div class="content">
          <h1> Contact Us </h1>

          <div class="profile container">
            <div class="img photo"></div>
            <div class="description">
              <table cellspacing="10">

                <tr>
                  <td> Nama </td>
                  <td>
                    <center> : </center>
                  </td>
                  <td> Aziizah Oki Shofrina </td>
                </tr>

                <tr>
                  <td> NIM </td>
                  <td>
                    <center> : </center>
                  </td>
                  <td> 2109106004 </td>
                </tr>

                <tr>
                  <td> Email </td>
                  <td>
                    <center> : </center>
                  </td>
                  <td> aoshofrina@gmail.com </td>
                </tr>

              </table>
            </div>

          </div>
        </div>

      </div>

    </div>

    <?php include "footer.php"; ?>
  </div>


  <script src="app/jquery.js?v=<?= time(); ?>"></script>
  <script src="app/app.js?v=<?= time(); ?>"></script>

</body>

</html>