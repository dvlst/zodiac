<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    </head>

    <body>
      <?php
        session_start();

        // Variables
        $servername = "localhost";
        $username = "root";
        $password = "gibbiX12345";
        $dbname = "zodiac";


        // MySQL
        $con = new mysqli($servername, $username, $password, $dbname);

      ?>
      <nav class="nav-wrapper yellow lighten-2">
          <a href="../index.php" class="black-text brand-logo center">Zodiac</a>
          <?php
            if (!isset($_SESSION['username'])) {
              echo "<a href='sites/login.php' class='black-text left'>Login</a>";
            }
            else {
              echo "<a href='#' class='black-text left'>".$_SESSION['username']."</a>";
              echo "<a href='sites/logout.php' class='black-text right'>Logout</a>";
            }
          ?>
      </nav>

      <div class="row grey darken-4 white-text center">
        <div class="col s3"></div>
        <a href="songs.php" class="white-text center col s2">Songs</a>
        <a href="#" class="white-text center col s2">Favorites</a>
        <div class="col s1">|</div>
        <a href="add.php" class="white-text center col s2">Add Song</a>
        <div class="col s1">|</div>
      </div>

      <div class="row container col s12">
          <p>
            <a href="songs.php" class="btn-floating btn-large waves-effect waves-light yellow lighten-2"><i class="material-icons black-text">add</i></a>            
          </p>
        </div>
      
      <?php
        unset($sql);
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>