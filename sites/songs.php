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
        @$user = $_SESSION['user_name'];

        // SQL Queries
        $sql_artists = "SELECT * FROM artists";
        $sql_songs = "SELECT * FROM songs";
        $sql_albums = "SELECT * FROM albums";

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
        <a href="#" class="white-text center col s2">Songs</a>
        <a href="favorites.php" class="white-text center col s2">Favorites</a>
        <div class="col s1">|</div>
        <a href="add.php" class="white-text center col s2">Add Song</a>
        <div class="col s1">|</div>
      </div>

      <div class="row container col s12">  
        <table class="highlight">
          <thead>
            <tr>
              <th class="col s3">Artist</th>
              <th class="col s3">Song</th>
              <th class="col s3">Album</th>
              <th class="col s3"></th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <form action="songs.php" method="post">
                <?php
                  $result_artists = $con->query($sql_artists);
                  $result_songs = $con->query($sql_songs);
                  $result_albums = $con->query($sql_albums);
                  while (($row_artists = $result_artists->fetch_assoc()) && ($row_songs = $result_songs->fetch_assoc()) && ($row_albums = $result_albums->fetch_assoc())){
                ?>
                <td type="text" name="artist_name" class="col s3"><?php echo $row_artists['artistname'] ?></td>
                <td type="text" name="song_name" class="col s3"><?php echo $row_songs['songname'] ?></td>
                <td type="text" name="album_name" class="col s3"><?php echo $row_albums['albumname'] ?></td>
                <td class="col s3"><button type="submit" style="background:rgba(0, 0, 0, 0);border:none;"><i class="yellow-text text-accent-3 material-icons">star</i></button></td>    
                <?php
                    // Favorite DB Variables
                    @$artist = $row_artists['artistname'];
                    @$song = $row_songs['songname'];
                    @$album = $row_albums['albumname']; 
                    } 
                ?>
              </form>
            </tr>
          </tbody>
          <?php
            $sql = "INSERT INTO favorites(artistname, songname, albumname, username) VALUES ('$artist', '$song', '$album', '$user')";
            if ($con->query($sql) === TRUE) {

            }
            else {
              echo "<br>Error: " . $sql . "<br>" . $conn->error;
            }
          ?>
            
          
        </table>

          <p>
            <a href="add.php" class="btn-floating btn-large waves-effect waves-light yellow lighten-2"><i class="material-icons black-text">add</i></a>            
          </p>
        </div>
      
      <?php
        unset($sql);
        unset ($artist);
        unset ($album);
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