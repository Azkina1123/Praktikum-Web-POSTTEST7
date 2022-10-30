<?php

session_start();
require "config.php";

if (!isset($_SESSION["mode"]) || $_SESSION["mode"] != "admin") {
  echo "<script>
          alert('Please login as admin first!');
          document.location.href = 'login.php?mode=Admin';
        </script>";
}

// ganti zona waktu
date_default_timezone_set("Asia/Singapore");

if (isset($_POST["submit"])) {
  if (add_to_db()) {
    header("Location: index.php");
  } else {
    echo "<script> alert('Add product failed!') </script>";
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
  <title> Add a Product | Tarvita Pastel </title>
</head>

<body>
  <div class="page-wrapper add-product-page">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <?php include "sidebar.php"; ?>

      <div class="main-content">

        <div class="content">

          <h1> New Product </h1>
          <?php if (isset($_GET["product"])) { ?>
            <p> <u> <?= $_GET["product"]; ?> </u> </p>
          <?php } ?>

          <table cellspacing="20">

            <!-- pilih jenis produk -->
            <?php if (!isset($_GET["product"])) { ?>

              <form action="" method="GET" class="form container">
                <!-- jenis produk -->
                <tr>
                  <td> <label for="product"> Product* </label> </td>
                  <td>
                    <center> : </center>
                  </td>
                  <td>
                    <select name="product" class="form-input" style="width: 150px;">
                      <option value="painting"> Painting </option>
                      <option value="tool"> Tool </option>
                    </select>
                    <button type="submit" style="width: 50px;"> OK </button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br><br><br><br><br><br><br><br><br><br>
                  </td>
                </tr>
              </form>

              <!-- isi data produk -->
            <?php } else { ?>

              <form action="" method="POST" enctype="multipart/form-data" class="form container">
                <!-- tanggal update -->
                <tr>
                  <td> <label for="datetime"> Added at* </label> </td>
                  <td> <center> : </center> </td>
                  <td>
                    <input type="datetime-local" name="datetime" id="datetime" value="<?= date("Y-m-d h:i"); ?>" class="form-input">
                  </td>
                </tr>

                <!-- nama produk -->
                <tr>
                  <td> <label for="name"> Name* </label> </td>
                  <td> <center> : </center> </td>
                  <td> <input type="text" name="name" placeholder="Name" id="name" required maxlength="50" autocomplete="off" class="form-input"> </td>

                </tr>

                <!-- harga produk -->
                <tr>
                  <td> <label for="number"> Price* </label> </td>
                  <td> <center> : </center> </td>
                  <td> <input type="number" name="price" placeholder="Price" id="number" required min="0" class="form-input"> </td>
                </tr>

                <!-- deskripsi product -->
                <tr>
                  <td> <label for="desc"> Description* </label> </td>
                  <td> <center> : </center> </td>
                  <td>
                    <textarea name="desc" id="desc" cols="15" rows="3" maxlength="100" required autocomplete="off" class="form-input" placeholder="Max 100 characters"></textarea>
                  </td>
                </tr>

                <!-- jumlah stok awal -->
                <tr>
                  <td> <label for="stock"> Stock* </label> </td>
                  <td> <center> : </center> </td>
                  <td> <input type="number" name="stock" placeholder="Stock" id="stock" required min="0" class="form-input" required> </td>
                </tr>

                <!-- berat bersih -->
                <tr>
                  <td> <label for="net"> Net* </label> </td>
                  <td> <center> : </center> </td>
                  <td> <input type="number" step="0.01" name="net" placeholder="Net (g)" id="net" min="0" class="form-input" required> </td>
                </tr>

                <!-- size -->
                <tr>
                  <td> <label for="size"> Size* </label> </td>
                  <td> <center> : </center> </td>
                  <td>
                    <label for="w"> w:</label>
                    <input type="number" step="0.01" name="width" id="w" placeholder="cm" min="0" class="form-input" style="width: 70px;" required>
                    <label for="h"> h:</label>
                    <input type="number" step="0.01" name="height" id="h" placeholder="cm" min="0" class="form-input" style="width: 70px;" required>
                  </td>
                </tr>

                <!-- jika jenis produknya painting -->
                <?php if ($_GET["product"] == "painting") { ?>

                  <!-- frame-->
                  <tr>
                    <td> <label for="frame"> Frame* </label> </td>
                    <td> <center> : </center> </td>
                    <td>
                      <input type="radio" name="frame" id="yes" value="Yes"> <label for="yes"> Yes </label> &nbsp;
                      <input type="radio" name="frame" id="no" value="No" checked> <label for="no"> No </label>
                    </td>
                  </tr>

                  <!-- teknik -->
                  <tr>
                    <td> <label for="technic"> Technic* </label> </td>
                    <td> <center> : </center> </td>
                    <td>
                      <select name="technic" id="technic" class="form-input">
                        <option value="Unknown"> Unknown </option>
                        <option value="Oil Painting"> Oil Painting </option>
                        <option value="Watercolor Painting"> Watercolor Painting </option>
                        <option value="Fine Painting"> Fine Painting </option>
                      </select>
                    </td>
                  </tr>

                <?php } else if ($_GET["product"] == "tool") { ?>

                  <!-- material -->
                  <tr>
                    <td> <label for="material"> Material* </label> </td>
                    <td> <center> : </center> </td>
                    <td> <input type="text" name="material" placeholder="Material" id="material" min="0" class="form-input"> </td>
                  </tr>

                  <!-- pack -->
                  <tr>
                    <td> <label for="pack"> Packing List* </label> </td>
                    <td> <center> : </center> </td>
                    <td> <textarea name="pack" id="pack" cols="15" rows="3" class="form-input" placeholder="1 pcs brush, etc" maxlength="100"></textarea> </td>
                  </tr>

                <?php } ?>
                
                <!-- nama image -->
                <tr>
                  <td> <label for="image_name"> Image's Name* </label> </td>
                  <td> <center> : </center> </td>
                  <td> <input type="text" name="image_name" id="image_name" placeholder="Optional" class="form-input" required> </td>
                </tr>

                <!-- image -->
                <tr>
                  <td> <label for="image"> Upload Image* </label> </td>
                  <td> <center> : </center> </td>
                  <td> <input type="file" name="image" id="image" accept="image/*" class="form-input" required> </td>
                </tr>

                <!-- tombol submit -->
                <tr>
                  <td colspan="4">
                    <center> <button type="submit" name="submit"> Add Product </button> </center>
                  </td>
                </tr>


              </form>
            <?php } ?>
          </table>
        </div>

      </div>

    </div>

    <?php include "footer.php"; ?>
  </div>


  <script src="app/jquery.js?v=<?= time(); ?>"></script>
  <script src="app/app.js?v=<?= time(); ?>"></script>

</body>

</html>