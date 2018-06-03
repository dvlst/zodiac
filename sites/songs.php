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
                <th>Song</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Length</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <?php
                $sql = "SELECT * FROM artists";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()){
              ?>
              
              <td><img src="<?php echo $row['picture'] ?>" /></td>
              <td><?php echo $row['artistname'] ?></td>

              <?php
                unset($sql);
                }
                $sql = "SELECT * FROM songs";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()){
              ?>
              <td><?php echo $row['songname'] ?></td>
              <?php } ?>
            </tr>
          </tbody>
          
        </table>

          <p>
            <a href="add.php" class="btn-floating btn-large waves-effect waves-light yellow lighten-2"><i class="material-icons black-text">add</i></a>            
          </p>
        </div>
      
      <?php
        unset($sql);
        $con->close();
      ?>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>