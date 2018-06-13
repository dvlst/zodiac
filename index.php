<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  </head>

  <body>
    <?php
      session_start();
      // Variables
      $servername = "localhost";
      $username = "root";
      $password = "gibbiX12345";
      $dbname = "zodiac";
    ?>
    <nav class="nav-wrapper yellow lighten-2">
        <a href="#" class="black-text brand-logo center">Zodiac</a>
        <?php
          if (!isset($_SESSION['username'])) {
            echo "<ul>";
            echo "<li class='right'><a href='sites/login.php' class='waves-effect waves-light btn-small grey darken-4'>Login</a></li>";
            echo "</ul>";
          }
          else {
            echo "<ul>";
            echo "<li class='right'><a href='sites/logout.php' class='waves-effect waves-light btn-small grey darken-4'>Logout</a></li>";
            echo "<li class='right'><a href='#' class='black-text left'>".$_SESSION['username']."</a></li>";
            echo "</ul>";
          }
        ?>
    </nav>


    <div class="row grey darken-4 white-text center" style="padding:0.5em 0 0.5em 0;">
      <div class="col s3"></div>
      <a href="?link=" class="white-text center col s2">Songs</a>
      <a href="?link=1" class="white-text center col s2">Favorites</a>
      <div class="col s1">|</div>
      <a href="?link=2" class="white-text center col s2">Add Song</a>
      <div class="col s1">|</div>
    </div>

    <?php
      @$link=$_GET['link'];
      if (empty($link)){
        include("include/songs.php");
      }
      if ($link == '1'){
          include("include/favorites.php");
      }
      if ($link == '2'){
          include("include/add.php");
      }
    ?>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>