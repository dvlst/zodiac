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

        // SQL Queries
        $sql_faves = "SELECT * FROM favorites";
        


        // MySQL
        $con = new mysqli($servername, $username, $password, $dbname);

      ?>
      <nav class="nav-wrapper yellow lighten-2">
          <a href="../index.php" class="black-text brand-logo center">Zodiac</a>
          <?php
            if (!isset($_SESSION['username'])) {
              echo "<ul>";
              echo "<li class='right'><a href='login.php' class='waves-effect waves-light btn-small grey darken-4'>Login</a></li>";
              echo "</ul>";
            }
            else {
              echo "<ul>";
              echo "<li class='right'><a href='logout.php' class='waves-effect waves-light btn-small grey darken-4'>Logout</a></li>";
              echo "<li class='right'><a href='#' class='black-text left'>".$_SESSION['username']."</a></li>";
              echo "</ul>";
            }
          ?>
      </nav>

      <div class="row grey darken-4 white-text center" style="padding:0.5em 0 0.5em 0;">
        <div class="col s3"></div>
        <a href="songs.php" class="white-text center col s2">Songs</a>
        <a href="#" class="white-text center col s2">Favorites</a>
        <div class="col s1">|</div>
        <a href="add.php" class="white-text center col s2">Add Song</a>
        <div class="col s1">|</div>
      </div>

      <div class="row container col s12">
        <form action="favorites.php" method="post">
          <?php
            $result_faves= $con->query($sql_faves);
            while (($row_faves = $result_faves->fetch_assoc())){


            
            // Favorite DB Variables
            @$id = $row_fgaves['favoriteID'];
            @$artist = $row_faves['artistname'];
            @$song = $row_faves['songname'];
            @$covera = $row_faves['albumcover'];
            @$creator = $row_faves['username'];

            $sql = "DELETE FROM favorites WHERE favoriteID='$id'";
            if ($con->query($sql) === TRUE) {

            }
            else {
              echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }
          ?>
          <div class="row col s12 m6">
            <div class="col s3"></div>
            <div class="card">
              <div class="card-image">
                <?php echo '<img src="'.$row_faves['albumcover'].'" alt="Album Cover">';?>
                <button type="submit" style="background:rgba(0, 0, 0, 0);border:none;" class="btn-large btn-floating halfway-fab waves-effect waves-light grey darken-4"><i class="material-icons yellow-text text-accent-3">star</i></button>
              </div>
              <div class="card-content">
              <span class="card-title"><?php echo $song ?></span>
                <ul>
                  <li name="artist_name"><label>Artist</label><span>  </span><?php echo $artist ?></li>
                  <li name="song_name"><label>Made By</label><span>  </span><?php echo $creator?></li>
                </ul>
              </div>
            </div>
            <div class="col s3"></div>
          </div>
          <?php
            }
          ?>
        </form>
      </div>
      
      <?php
        unset($sql);
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>