<?php

require "config.php";

// ganti zona waktu
date_default_timezone_set("Asia/Singapore");

$id = $_GET["product"];

if (preg_match("/painting/i", $id)) {
  $product_type = "painting";
} else if (preg_match("/tool/i", $id)) {
  $product_type = "tool";
}

$product = get_from_db("SELECT * FROM products WHERE id='$id'")[0];

if (isset($_POST["submit"])) {

  if (update_to_db()) {
    header("Location: products.php?mode=read&product=$id");
  } else {
    echo "<script> alert('Edit product failed!') </script>";
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
  <title> Edit a Product | Tarvita Pastel </title>
</head>

<body>
  <div class="page-wrapper add-product-page">
    <?php include "header.php"; ?>

    <div class="content-wrapper">
      <?php include "sidebar.php"; ?>

      <div class="main-content">

        <div class="content">

          <h1> Edit Product </h1>
          <p> <u> <?= $product_type; ?> </u> </p>

          <table cellspacing="20">
            <form action="" method="POST" enctype="multipart/form-data" class="form container">
              <input type="text" name="id" value="<?= $product["id"]; ?>" hidden>
              <input type="text" name="prev_img" value="<?= $product["image"]; ?>" hidden>

              <!-- tanggal update -->
              <tr>
                <td> <label for="datetime"> Released at* </label> </td>
                <td> <center> : </center> </td>
                <td> <input type="datetime" name="datetime" id="datetime" value="<?= $product["released_date"]; ?>" readonly class="form-input"> </td>
              </tr>

              <!-- nama produk -->
              <tr>
                <td> <label for="name"> Name* </label> </td>
                <td> <center> : </center> </td>
                <td> <input type="text" name="name" placeholder="Name" id="name" required maxlength="50" autocomplete="off" class="form-input" value="<?= $product["name"]; ?>"> </td>
              </tr>

              <!-- harga produk -->
              <tr>
                <td> <label for="number"> Price* </label> </td>
                <td> <center> : </center> </td>
                <td> <input type="number" name="price" placeholder="Price" id="number" required min="0" class="form-input" value="<?= $product["price"]; ?>"> </td>
              </tr>

              <!-- deskripsi product -->
              <tr>
                <td> <label for="desc"> Description* </label> </td>
                <td> <center> : </center> </td>
                <td> <textarea name="desc" id="desc" cols="15" rows="3" maxlength="100" required autocomplete="off" class="form-input" placeholder="Max 100 characters"><?= $product["description"]; ?></textarea> </td>
              </tr>

              <!-- jumlah stok awal -->
              <tr>
                <td> <label for="stock"> Stock* </label> </td>
                <td> <center> : </center> </td>
                <td> <input type="number" name="stock" placeholder="Stock" id="stock" required min="0" class="form-input" value="<?= $product["stock"]; ?>"> </td>
              </tr>

              <!-- berat bersih -->
              <tr>
                <td> <label for="net"> Net* </label> </td>
                <td> <center> : </center> </td>
                <td> <input type="number" step="0.01" name="net" placeholder="Net (g)" id="net" min="0" class="form-input" value="<?= $product["net"]; ?>" required> </td>
              </tr>

              <!-- size -->
              <tr>
                <td> <label for="size"> Size* </label> </td>
                <td> <center> : </center> </td>
                <td>
                  <label for="w"> w:</label>
                  <input type="number" step="0.01" name="width" id="w" placeholder="cm" min="0" class="form-input" style="width: 70px;" value="<?= $product["width"]; ?>" required>
                  <label for="h"> h:</label>
                  <input type="number" step="0.01" name="height" id="h" placeholder="cm" min="0" class="form-input" style="width: 70px;" value="<?= $product["height"]; ?>" required>
                </td>
              </tr>

              <!-- jika jenis produknya painting -->
              <?php if ($product_type == "painting") { ?>

                <!-- frame-->
                <tr>
                  <td> <label for="frame"> Frame* </label> </td>
                  <td> <center>:</center> </td>
                  <td>
                    <input type="radio" name="frame" id="yes" value="Yes" <?php if ($product["frame"] == "Yes") {
                                                                            echo "checked";
                                                                          } ?>> <label for="yes"> Yes </label> &nbsp;
                    <input type="radio" name="frame" id="no" value="No" <?php if ($product["frame"] == "No") {
                                                                          echo "checked";
                                                                        } ?>> <label for="no"> No </label>
                  </td>
                </tr>

                <!-- teknik -->
                <tr>
                  <td> <label for="technic"> Technic* </label> </td>
                  <td> <center>:</center> </td>
                  <td>
                    <select name="technic" id="technic" class="form-input">
                      <option value="Unknown" <?php if ($product["technic"] == "Unknown") {
                                                echo "selected";
                                              } ?>> Unknown </option>
                      <option value="Oil Painting" <?php if ($product["technic"] == "Oil Painting") {
                                                      echo "selected";
                                                    } ?>> Oil Painting </option>
                      <option value="Watercolor Painting" <?php if ($product["technic"] == "Watercolor Painting") {
                                                            echo "selected";
                                                          } ?>> Watercolor Painting </option>
                      <option value="Fine Painting" <?php if ($product["technic"] == "Fine Painting") {
                                                      echo "selected";
                                                    } ?>> Fine Painting </option>
                    </select>
                  </td>
                </tr>

              <?php } else if ($product_type == "tool") { ?>

                <!-- material -->
                <tr>
                  <td> <label for="material"> Material* </label> </td>
                  <td> <center>:</center> </td>
                  <td> <input type="text" name="material" placeholder="Material" id="material" min="0" class="form-input" value="<?= $product["material"]; ?>"> </td>
                </tr>

                <!-- pack -->
                <tr>
                  <td> <label for="pack"> Packing List* </label> </td>
                  <td> <center>:</center> </td>
                  <td> <textarea name="pack" id="pack" cols="15" rows="3" class="form-input" placeholder="1 pcs brush, etc" maxlength="100"><?= $product["packing_list"]; ?></textarea> </td>
                </tr>

              <?php } ?>

              <!-- nama image -->
              <tr>
                <td> <label for="image_name"> Image's Name </label> </td>
                <td> <center> : </center> </td>
                <td> <input type="text" name="image_name" id="image_name" placeholder="Optional" class="form-input" value="<?= get_img_name($product["id"]); ?>" required> </td>
              </tr>

              <!-- image -->
              <tr>
                <td> <label for="image"> Upload Image </label> </td>
                <td> <center> : </center> </td>
                <td>
                    <img src="img/products/<?= $product["image"]; ?>" alt="<?= $product["image"]; ?>" width="180px"> <br>
                    <input type="file" name="image" id="image" accept="image/*" class="form-input"> 
                </td>
              </tr>

              <!-- tombol submit -->
              <tr>
                <td colspan="4">
                  <center> <button type="submit" name="submit"> Edit Product </button> </center>
                </td>
              </tr>


            </form>
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