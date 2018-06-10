<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    </head>

    <body>
      <?php
        session_start();

        // Variables
        $servername = "localhost";
        $username = "root";
        $password = "gibbiX12345";
        $dbname = "zodiac";
        @$user = $_SESSION['username'];

        // SQL Queries
        $sql_artists = "SELECT * FROM artists";
        $sql_songs = "SELECT * FROM songs";
        $sql_albums = "SELECT * FROM albums";

        // Favorites Variable
        @$artist = $row_artists['artistname'];
        @$song = $row_songs['songname'];
        @$covera = $row_albums['albumcover'];

        // MySQL
        $con = new mysqli($servername, $username, $password, $dbname);
        

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
        <a href="#" class="white-text center col s2">Songs</a>
        <a href="sites/favorites.php" class="white-text center col s2">Favorites</a>
        <div class="col s1">|</div>
        <a href="sites/add.php" class="white-text center col s2">Add Song</a>
        <div class="col s1">|</div>
      </div>

      <div class="row container col s12">  

        <form action="songs.php" method="post">
          <?php
              // Why nötig?
              $result_artists = $con->query($sql_artists);
              $result_songs = $con->query($sql_songs);
              $result_albums = $con->query($sql_albums);
              while (($row_artists = $result_artists->fetch_assoc()) && ($row_songs = $result_songs->fetch_assoc()) && ($row_albums = $result_albums->fetch_assoc())){
              
              
              // Favorite DB Variables
              @$artist = $row_artists['artistname'];
              @$song = $row_songs['songname'];
              @$covera = $row_albums['albumcover'];

              $sql = "INSERT INTO favorites(artistname, songname, albumcover, username) VALUES ('$artist', '$song', '$covera', '$user')";
              if ($con->query($sql) === TRUE) {

              }
              else {
                echo "<br>Error: " . $sql . "<br>" . $conn->error;
              }
          ?>
          <div class="row col s12">
            <div class="col s3"></div>
            <div class="card col s6">
              <div class="card-image">
                <?php echo '<img src="'.$covera.'" alt="Album Cover">';?>
                <button type="submit" style="background:rgba(0, 0, 0, 0);border:none;" class="btn-large btn-floating halfway-fab waves-effect waves-light grey darken-4"><i class="material-icons yellow-text text-accent-3">star</i></button>
              </div>
              <div class="card-content">
              <span class="card-title">Card Title</span>
                <ul>
                  <li name="artist_name"><?php echo $row_artists['artistname'] ?></li>
                  <li name="song_name"><?php echo $row_songs['songname'] ?></li>
                </ul>
              </div>
            </div>
            <div class="col s3"></div>
          </div>
          <?php
            }
          ?>
        </form>
        <p class="center">
          <a href="add.php" class="btn-floating btn-large waves-effect waves-light yellow lighten-2 center"><i class="material-icons black-text">add</i></a>            
        </p>
      </div>
      
      <?php
        unset($sql);
        unset ($artist);
        unset ($album);
        unset ($covera);
        unset ($song);
        unset ($user);
        unset ($sql_albums);
        unset ($sql_artists);
        unset ($sql_songs);
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>