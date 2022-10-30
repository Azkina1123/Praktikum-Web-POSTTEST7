      <aside class="sidebar">
        <div class="container">

          <ul>
            <li> <b> Menu: </b> </li>
            <a href="index.php"> <li> <div class="home-logo img"></div> Home </li> </a>
            <a href="about-us.php"> <li> <div class="about-us-logo img"></div> Contact Us </li> </a>
            
            <a href="<?= (isset($_SESSION["mode"])) ? "logout.php" : "login.php" ?>"> 
              <li> <div class="login-logo img"></div> <?= (isset($_SESSION["mode"])) ? "Logout" : "Login" ?> </li>
            </a>
          </ul>
          <hr>
          <ul>
            <li> <b> Products: </b> </li>
            <a href="products.php?mode=read&search=paintings"> <li> <div class="paintings-logo img"></div> Paintings </li> </a>
            <a href="products.php?mode=read&search=tools"> <li> <div class="tools-logo img"></div> Tools </li> </a>
          </ul>
          <hr>

          <?php if (isset($_SESSION["mode"]) && $_SESSION["mode"] == "admin") { ?>
          <ul>
            <li> <b> Admin: </b> </li>
            <a href="add-product.php"> <li> <div class="add-product-logo img"></div> Add a Product </li> </a>
            <a href="products.php?mode=edit&search=all"> <li> <div class="edit-product-logo img"></div> Edit a Product </li> </a>
            <a href="products.php?mode=edit&search=all"> <li> <div class="delete-product-logo img"></div> Delete a Product </li> </a>
          </ul>
          <?php } ?>

        </div>

      </aside>