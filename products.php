<?php
session_start();

require "config.php";
require "searching.php";

if (!isset($_SESSION["mode"])) {
  echo "<script>
          alert('Please login as user or admin first!');
          document.location.href = 'login.php?mode=User';
        </script>";
}

if (!isset($_GET["mode"])) {
  $_GET["mode"] = "read";
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
  <title>Products | Tarvita Pastel </title>
</head>

<body>

  <div class="page-wrapper products-page">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <?php include "sidebar.php"; ?>

      <div class="main-content">

        <div class="content">
          <h1> Products </h1>
          <form action="" method="GET" class="search wrapper">
            <input type="text" name="mode" value="<?= $_GET["mode"]; ?>" hidden>
            <input type="search" name="search" id="search" class="form-input" placeholder="Search">
            <button type="submit" class="search-logo img"> </button>
          </form>

          <!-- hasil searching -->
          <?php if (!isset($_GET["product"])) { ?>

            <div class="category wrapper">
              <p style="text-align:left;"> Hasil pencarian: <?= $_GET["search"]; ?>. </p>

              <div class="products container">

                <!-- search produk -->
                <?php
                
                // produk tidak ada
                if (count($products) == 0) {
                  echo "Product not found.<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

                  // produk ada
                } else { ?>

                  <?php foreach ($products as $product) { ?>
                    <a href="products.php?mode=<?= $_GET["mode"]; ?>&search=<?= $_GET["search"]; ?>&product=<?= $product["id"]; ?>">
                      <div class="product">
                        <div class="img" style="background-image: url('img/products/<?= $product["image"] ?>')">

                          <!-- ---------------------------- EDIT PRODUK ---------------------------- -->
                          <?php if (isset($_GET["mode"]) && $_GET["mode"] == "edit") { ?>
                            <div class="btn-wrapper">
                              <a href="edit-product.php?product=<?= $product["id"]; ?>"> <button class="edit-btn"></button> </a>
                              <?php 
                              $id = $product["id"]; $name = $product["name"];
                              echo "<a onClick=\"javascript: return confirm('Are you sure you want to delete $name?');\" 
                                    href='delete-product.php?product=$id'>
                                      <button class='delete-btn'></button>
                                    </a>"; ?>
                              <!-- <a href="delete-product.php?product=<?= $product["id"]; ?>"> <button class="delete-btn"></button> </a> -->
                            </div>
                          <?php } ?>

                        </div>

                        <div class="description">
                          <div> <b> <?= $product["name"]; ?> </b> </div>
                          <div> <?= $product["description"]; ?> </div>
                          <div> <b> IDR <?= $product["price"]; ?> </b> </div>
                        </div>
                      </div>
                    </a>
                  <?php } ?>
                  <!-- endfor -->

                <?php } ?>
                <!-- /else -->

              </div> <!-- /products container -->
            </div> <!-- /category wrapper-->

          <!-- tampilkan informasi produk -->
          <?php } else {

            include "product.php";
          } ?>
          <!-- /else -->

        </div>
      </div> <!-- /content -->

    </div> <!-- /main-content -->
  </div> <!-- /content-wrapper -->

  <?php include "footer.php"; ?>
  </div> <!-- /page-wrapper -->


  <script src="app/app.js?v=<?= time(); ?>"></script>
  <script src="app/jquery.js"></script>
</body>

</html>