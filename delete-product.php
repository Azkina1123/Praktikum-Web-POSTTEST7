<?php

require "config.php";

if (delete_from_db()) {
  header("Location: products.php?mode=edit&search=all");
}

?>