<?php
session_start();

require "config.php";

// ambil data 
$paintings = get_from_db(
  "SELECT * FROM products
  WHERE id LIKE '%painting%'"
);
$tools = get_from_db(
  "SELECT * FROM products
  WHERE id LIKE '%tool%'"
);




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="app/style.css?v=<?= time(); ?>">

  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <title> Home | Tarvita Pastel </title>
</head>

<body>

  <div class="page-wrapper">

    <?php include "header.php"; ?>

    <div class="content-wrapper">

      <?php include "sidebar.php"; ?>

      <div class="main-content">

        <div class="intro">
          <div class="container">

            <div class="img"></div>

            <div class="description">
              <div>
                Welcome to
                <h1 style="font-weight: lighter;"> Tarvita Pastel </h1>
              </div>

              <div>
                Provide your needs for the beauty of arts.
              </div>

              <div>
                Love of beauty is taste.<br>
                The creation of beauty is art. <br>

                <i> - Ralph Waldo Emerson </i>
              </div>

            </div>

          </div>
        </div>

        <div class="content">

          <?php
          $contents = [
            ["Paintings", "Decorate your room with our pantings.", $paintings],
            ["Tools", "Create your own painting with our stuffs.", $tools]
          ]
          ?>

          <?php foreach ($contents as $content) { ?>

            <section class="category wrapper">
              <!-- category title -->
              <h1 style="font-weight: 700;"> <?= $content[0] ?> </h1>
              <p> <?= $content[1] ?> </p>

              <!-- produk -->
              <div class="products container">
                <?php for ($i = 0; $i < 2; $i++) { ?>
                  <a href="products.php?product=<?= $content[2][$i]["id"]; ?>">
                    <div class="product">
                      <div class="img" style="background-image: url('img/products/<?= $content[2][$i]["image"] ?>')"></div>

                      <div class="description">
                        <div> <b> <?= $content[2][$i]["name"]; ?> </b> </div>
                        <div> <?= $content[2][$i]["description"]; ?> </div>
                        <div> <b> IDR <?= $content[2][$i]["price"]; ?> </b> </div>
                      </div>
                    </div>

                  </a>
                <?php } ?>
                <a href="products.php?search=all">
                  <div class="product more">
                    <img src="img/load.png" alt="load">
                    <p> More </p>
                  </div>
                </a>

              </div>

            </section>

          <?php } ?>

        </div>

      </div>


    </div>


    <?php include "footer.php"; ?>
  </div>

  <script src="app/app.js?v=<?= time(); ?>"></script>
  <script src="app/jquery.js"></script>


</body>

</html>