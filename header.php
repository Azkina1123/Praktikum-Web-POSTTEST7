    <div class="skin-button" onclick="darkModeActive()">
      <div class="skin-logo img"></div>
    </div>

    <header>
      <div>
        <a href="#">
          <div class="menu-logo img" onclick="sidebarActive()"> </div>
        </a>
      </div>

      <div>
        <h1> <a href="index.php"> Tarvita Pastel </a> </h1>
      </div>

      <div>
        <span class="<?= (isset($_SESSION["mode"])) ? $_SESSION["mode"] : "login" ?>-logo img"></span>
        <h3> 
          <?php
            if (!isset($_SESSION["username"])) {
              echo "<a href='login.php'> Login </a>";
            } else {
              echo $_SESSION["username"];
            }
          ?>
        </h3>
      </div>

    </header>