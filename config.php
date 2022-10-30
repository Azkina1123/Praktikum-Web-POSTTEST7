<?php

$con = mysqli_connect("localhost", "root", "", "tarvita_pastel");

function create_id($product_type) {
  if ($product_type == "painting") {
    $paintings = get_from_db(
      "SELECT id FROM products
      WHERE id LIKE '%painting%'"
    );
    
    return "painting-" . (count($paintings)+1);
    
  } else if ($product_type == "tool") {
    $tools = get_from_db(
      "SELECT id FROM products
      WHERE id LIKE '%tool%'"
    );
    return "tool-" . (count($tools)+1);
  }

  return false;
}

function create_img_name($product_type) {
  $name  = $_FILES["image"]["name"];    // nama file
  $type  = $_FILES["image"]["type"];    // jenis file
  $temp  = $_FILES["image"]["tmp_name"];// direktory file
  $size  = $_FILES["image"]["size"];    // ukuran file
  $error = $_FILES["image"]["error"];   
  
  // // kalau tidak upload
  // if ($error === 4) {
  //   return "new-product.png";
  // }
  
  // ambil ekstensi file
  $pisah_titik = explode(".", $name);
  $ekstension = end($pisah_titik);

  $name = create_id($product_type) . "-" . $_POST["image_name"] . ".$ekstension";

  return $name;

}

function get_img_name($id) {
  $prev_image = get_from_db(
    "SELECT image FROM products 
     WHERE id='$id'"
  )[0]["image"];

  $image_name = explode(".", $prev_image)[0];
  $image_name = explode("$id-", $image_name);
  $image_name = end($image_name);

  return $image_name;
}

function edit_img_name($id) {
  // jika upload file baru
  if ($_FILES["image"]["error"] !== 4) {
    $name = $_FILES["image"]["name"]; 

  // jika pakai file lama
  } else {
    $name = get_from_db(
      "SELECT image FROM products 
       WHERE id='$id'"
    )[0]["image"];
  }
  
  $pisah_titik = explode(".", $name);
  $ekstension = end($pisah_titik);
  $new_name = $id . "-" . $_POST["image_name"] . ".$ekstension";

  return $new_name;
}

function delete_img($id) {
  $prev_image = get_from_db(
    "SELECT image FROM products 
     WHERE id='$id'"
  )[0]["image"];
  
  // kalau sebelumnya gak ada upload foto
  if ($prev_image == "new-product.png") {
    return false;
  }
  
  // hapus gambar lama di folder
  unlink("img/products/$prev_image");

}

function len_table($table) {
  global $con;
  $result = mysqli_query(
    $con,
    "SELECT * FROM $table"
  );
  return $result->num_rows;
}

function add_to_db() {
  global $con;

  $product_type = $_GET["product"];
  $id = create_id($product_type);
  $released_date = $_POST["datetime"];
  $name = htmlspecialchars($_POST["name"]);
  $price = $_POST["price"];
  $desc = htmlspecialchars($_POST["desc"]);
  $stock = $_POST["stock"];
  $net = $_POST["net"];
  $width = $_POST["width"];
  $height = $_POST["height"];

  if ($product_type == "painting") {
    $frame = htmlspecialchars($_POST["frame"]);
    $technic = htmlspecialchars($_POST["technic"]);
  } else if ($product_type == "tool") {
    $material = htmlspecialchars($_POST["material"]);
    $packing_list = htmlspecialchars($_POST["packing_list"]);

  }

  // ukuran gambar max 500 KB
  if (isset($_FILES["image"]) && $_FILES["image"]["size"] > 500000) {
    echo "<script> alert('Add product failed! (max size: 500KB)') </script>";
    return false;
  }

  $image = htmlspecialchars(create_img_name($product_type));
  move_uploaded_file($_FILES["image"]["tmp_name"], "img/products/$image");


  $result = mysqli_query(
    $con,
    "INSERT INTO products 
     VALUES (
      '$id', 
      '$released_date', 
      '$name', 
      $price, 
      '$desc',
      $stock, 
      '$net', 
      '$width', 
      '$height', 
      '$frame', 
      '$technic', 
      '$material', 
      '$packing_list', 
      '$image'
    )"
  );
  
  if (!$result) {
    echo "<script> alert('Product failed added!'); </script>";
    return false;
  }

  echo "<script> alert('Product added successfully!'); </script>";
  return true;
}

function get_from_db($query) {
  global $con;
  $result = mysqli_query(
    $con,
    $query
  );

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function update_to_db() {
  global $con;

  $product_type = $_GET["product"];

  $id = $_POST["id"];
  $released_date = $_POST["datetime"];
  $name = htmlspecialchars($_POST["name"]);
  $price = $_POST["price"];
  $desc = htmlspecialchars($_POST["desc"]);
  $stock = $_POST["stock"];
  $net = $_POST["net"];
  $width = $_POST["width"];
  $height = $_POST["height"];
  $frame = htmlspecialchars($_POST["frame"]);
  $technic = htmlspecialchars($_POST["technic"]);
  $material = htmlspecialchars($_POST["material"]);
  $packing_list = htmlspecialchars($_POST["pack"]);

  // ubah nama file pada database
  $image = edit_img_name($id);
  
  // jika ada file yg diupload
  if ($_FILES["image"]["error"] !== 4) {
    
    // ukuran gambar max 500 KB
    if ($_FILES["image"]["size"] > 500000) {
      echo "<script> alert('Add product failed! (max size: 500KB)') </script>";
      return false;
    }
    
    // hapus gambar lama di folder
    delete_img($id);

    // pindahkan file baru diup
    move_uploaded_file($_FILES["image"]["tmp_name"], "img/products/$image");

  // jika pakai gambar lama
  } else {
    $prev_image = get_from_db(
      "SELECT image FROM products 
       WHERE id='$id'"
    )[0]["image"];
    
    $prev_name = "img/products/$prev_image";
    $new_name = "img/products/$image";
    
    // ubah nama file pada direktori
    rename($prev_name, $new_name);

  }

  $result = mysqli_query(
    $con,
    "UPDATE products 
     SET 
      released_date='$released_date', 
      name='$name', 
      price=$price, 
      description='$desc',
      stock=$stock, 
      net=$net, 
      width=$width, 
      height=$height, 
      frame='$frame', 
      technic='$technic', 
      material='$material', 
      packing_list='$packing_list', 
      image='$image'
     WHERE id='$id'"
  );
  
  if (!$result) {
    echo "<script> alert('Product failed added!'); </script>";
    return false;
  }

  echo "<script> alert('Product added successfully!'); </script>";
  return true;

}

function delete_from_db() {
  global $con;

  $id = $_GET["product"];

  delete_img($id);

  $result = mysqli_query(
    $con,
    "DELETE FROM products WHERE id='$id'"
  );

  if (!$result) {
    return false;
  }


  return true;
}

function login_user() {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // cari akun
  $akun = get_from_db("SELECT * FROM users WHERE username='$username'");

  // jika akun tidak ada
  if (count($akun) == 0) {
    echo "<script>
          alert('Username tidak terdaftar');
        </script>";
    return false;
  }
  
  // jika password salah
  if ($akun[0]["password"] != $password) {
    echo "<script>
    alert('Password Anda salah!');
    </script>";
    return false;
  }
  
  echo "<script>
        alert('Anda berhasil login!');
      </script>";
  return true;
}

?>