<?php
  // Variables
  @$user = $_SESSION['username'];

  // SQL Queries
  $sql_faves = "SELECT * FROM favorites WHERE username='$user'";
  


  // MySQL
  $con = new mysqli($servername, $username, $password, $dbname);

?>

<!-- Search Bar -->
<nav class="nav-wrapper container">
  <form action="">
    <div class="input-field white ">
      <input id="search" type="search" required>
      <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
      <i class="material-icons black-text">close</i>
    </div>
  </form>
</nav>

<div class="row"></div>
<!-- -->

<div class="row container col s12">
  <form action="" method="post">
    <?php
      $result_faves= $con->query($sql_faves);
      while ($row_faves = $result_faves->fetch_assoc()){
      
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