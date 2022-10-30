<?php

$products = [];

if (isset($_GET["search"]) && !isset($_GET["product"])) {
  $keyword = strtolower($_GET["search"]);

  // semua produk
  if ($keyword == "all") {
    $products = get_from_db("SELECT * FROM products");

  // khusus paintings
  } else if (
    $keyword == "painting" ||
    $keyword == "paintings"
  ) {

    $products = get_from_db(
      "SELECT * FROM products 
      WHERE id LIKE '%painting%'"
    );

    // khusus tools
  } else if (
    $keyword == "tool" ||
    $keyword == "tools"
  ) {

    $products = get_from_db(
      "SELECT * FROM products 
      WHERE id LIKE '%tool%'"
    );

  // sesuai keyword
  } else {
    $products = get_from_db(
      "SELECT * FROM products 
      WHERE name LIKE '%$keyword%'"
    );

  }
}

if (isset($_GET["product"])) {
  $id = $_GET["product"];

  $product = get_from_db("SELECT * FROM products WHERE id='$id'")[0];

  if (preg_match("/painting/i", $id)) {
    $product_type = "painting";
    
  } else if (preg_match("/tool/i", $id)) {
    $product_type = "tool";
  }
}

?>