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
        @$artist = $_POST['artist_name'];
        @$song = $_POST['song_name'];
        @$album = $_POST['album_name'];
        @$user = $_SESSION['user_name'];


        // MySQL
        $con = new mysqli($servername, $username, $password, $dbname);

      ?>
      <nav class="nav-wrapper yellow lighten-2">
          <a href="../index.php" class="black-text brand-logo center">Zodiac</a>
          <?php
            if (!isset($_SESSION['username'])) {
              echo "<a href='login.php' class='black-text left'>Login</a>";
            }
            else {
              echo "<a href='#' class='black-text left'>".$_SESSION['username']."</a>";
              echo "<a href='logout.php' class='black-text right'>Logout</a>";
            }
          ?>
      </nav>

      <div class="row grey darken-4 white-text center">
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
              <th>Artist</th>
              <th>Song</th>
              <th>Album</th>
              <th></th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <form action="songs.php" method="post">
                <?php
                  $sql = "SELECT * FROM artists";
                  $result = $con->query($sql);
                  while ($row = $result->fetch_assoc()){
                ?>
                
                <td type="text" name="artist_name"><?php echo $row['artistname'] ?></td>

                <?php
                  unset($sql);
                  }
                  $sql = "SELECT * FROM songs";
                  $result = $con->query($sql);
                  while ($row = $result->fetch_assoc()){
                ?>

                <td type="text" name="song_name"><?php echo $row['songname'] ?></td>

                <?php
                  unset($sql);
                  }
                  $sql = "SELECT * FROM albums";
                  $result = $con->query($sql);
                  while ($row = $result->fetch_assoc()){
                ?>

                <td type="text" name="album_name"><?php echo $row['albumname'] ?></td>
                <?php } ?>
              
                <td><button type="submit" style="background:rgba(0, 0, 0, 0);border:none;"><i class="yellow-text text-accent-3 material-icons">star</i></button></td>
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
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>