<?php

session_start();
session_unset();
session_destroy();

echo "<script>
        alert('Anda berhasil logout!');
        document.location.href = 'index.php';
      </script>"

?>