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
              echo "<a href='login.php' class='black-text left'>Login</a>";
            }
            else {
              echo "<a href='#' class='left'>".$_SESSION['username']."</a>";
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
              <input name="group1" type="radio" />
              <span>Genre 1</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="group1" type="radio" />
              <span>Genre 2</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="group1" type="radio" />
              <span>Genre 3</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="group1" type="radio" />
              <span>Genre 4</span>
            </label>
          </div>
        </div>

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
              <input name="group1" type="radio" />
              <span>Genre 1</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="group1" type="radio" />
              <span>Genre 2</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="group1" type="radio" />
              <span>Genre 3</span>
            </label>
          </div>
          <div class="col s2">
            <label>
              <input name="group1" type="radio" />
              <span>Genre 4</span>
            </label>
          </div>
        </div>
      
      </form>
      

      <p class="container row col s12">
        <a class="btn-floating btn-large waves-effect waves-light yellow lighten-2"><i class="material-icons black-text">add</i></a>            
      </p>

  
      
      <?php
        unset($sql);
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>