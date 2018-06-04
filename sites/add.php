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
        @$artist = $_POST['artist_name'];
        @$firstn = $_POST['first_name'];
        @$lastn = $_POST['last_name'];
        @$agenre = $_POST['a_genre'];
        @$sgenre = $_POST['s_genre'];
        @$song = $_POST['song_name'];
        @$release = $_POST['release_year'];
        @$length = $_POST['length'];
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
        <a href="songs.php" class="white-text center col s2">Songs</a>
        <a href="favorites.php" class="white-text center col s2">Favorites</a>
        <div class="col s1">|</div>
        <a href="#" class="white-text center col s2">Add Song</a>
        <div class="col s1">|</div>
      </div>


      <form action="add.php" method="post">
        <div class="row"></div>
        <p class="grey-text text-darken-1 center">Artist</p>
        <div class="divider"></div>

        <div class="container row col s12">
          <div class="row"></div>
          <div class="col s6">
            <input type="text" class="validate" name="artist_name">
            <label>Artist Name</label>
          </div>
        </div>

        <div class="container row col s12">
          <div class="row"></div>
          <div class="col s3">
            <input id="first_name" type="text" class="validate" name="first_name">
            <label for="first_name">First Name</label>
          </div>
          <div class="col s3">
            <input id="last_name" type="text" class="validate" name="last_name">
            <label for="last_name">Last Name</label>
          </div>
        </div>

        <div class="container row col s12">
          <div class="row"></div>
          <div class="col s2">
            <label>
              <input name="a_genre" type="radio" />
              <span>Genre 1</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="a_genre" type="radio" />
              <span>Genre 2</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="a_genre" type="radio" />
              <span>Genre 3</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="a_genre" type="radio" />
              <span>Genre 4</span>
            </label>
          </div>
        </div>
        
        <div class="row"></div>
        <p class="grey-text text-darken-1 center">Song</p>
        <div class="divider"></div>

        <div class="container row col s12">
          <div class="row"></div>
          <div class="col s6">
            <input type="text" class="validate" name="song_name">
            <label>Song Name</label>
          </div>
        </div>

        <div class="container row col s12">
          <div class="row"></div>
          <div class="col s2">
            <input type="text" class="validate" name="release_year">
            <label>Release Year</label>
          </div>
          <div class="col s2">
            <input type="text" class="validate" name="length">
            <label>Length</label>
          </div>
        </div>

        <div class="container row col s12">
          <div class="row"></div>
          <div class="col s2">
            <label>
              <input name="s_genre" type="radio" />
              <span>Genre 1</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="s_genre" type="radio" />
              <span>Genre 2</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="s_genre" type="radio" />
              <span>Genre 3</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="s_genre" type="radio" />
              <span>Genre 4</span>
            </label>
          </div>
        </div>

        <p class="container row col s12">
          <button type="submit" value="Login" class="btn-floating btn-large waves-effect waves-light yellow lighten-2"><i class="material-icons black-text">add</i></button>            
        </p>
      </form>

      <?php
        # Create Movie
        if(!empty($firstn || $lastn || $artist)) {
          $sql = "INSERT INTO artists (prename, surname, artistname) VALUES ('$firstn', '$lastn', '$artist')";
          $con->query($sql);
          unset($sql);
        }
        else{
          
        }

        if(!empty($song || $release || $length)) {
          $sql = "INSERT INTO songs (songname, releaseyear, songlength) VALUES ('$song', '$release', '$length')";
          $con->query($sql);
          unset($sql);
        }
        else{
          
        }
      ?>

      <?php
        unset ($artist);
        unset ($fristn);
        unset ($lastn);
        unset ($agenre);
        unset ($sgenre);
        unset ($song);
        unset ($release);
        unset ($length);
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>