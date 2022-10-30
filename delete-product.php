<?php

session_start();
require "config.php";

if (!isset($_SESSION["mode"]) || $_SESSION["mode"] != "admin") {
  echo "<script>
          alert('Please login as admin first!');
          document.location.href = 'login.php?mode=Admin';
        </script>";
}
if (delete_from_db()) {
  header("Location: products.php?mode=edit&search=all");
}

?>