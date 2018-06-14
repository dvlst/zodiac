<?php
  // Variables
  @$user = $_SESSION['username'];

  @$sql = "SELECT * FROM songs";

  // MySQL
  $con = new mysqli($servername, $username, $password, $dbname);
?>

<!-- Searchbar -->
<nav class="nav-wrapper row container">
  <form action="" method="post">
    <div class="input-field white ">
      <input id="search" type="search" name="search" required>
      <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
      <i class="material-icons black-text">close</i>
    </div>
  </form>
</nav>

<form action="" method="post">
  <?php
  if(isset($_POST['search'])){
    $search = $_POST['search'];
    @$sql = "SELECT * FROM songs WHERE songname LIKE '%".$search."%' OR artistname LIKE '%".$search."%'";
  }
  else{
    @$sql = "SELECT * FROM songs";
  }
  ?>
</form>
<!-- -->

<div class="row container col s12">  

    <?php
      $result_songs = $con->query($sql);
      while ($row_songs = $result_songs->fetch_assoc()){
        

    ?>
    <form action="" method="post">
      <div class="row col s12 m6">
        <div class="col s3"></div>
        <div class="card">
          <div class="card-image">
            <?php
              echo '<img src="'.$row_songs['albumcover'].'">';?>
              <input type="hidden" name="song_id" value="<?php echo $row_songs['songID']; ?>";
            ?>
            <button type="submit" name="fave" style="background:rgba(0, 0, 0, 0);border:none;" class="btn-large btn-floating halfway-fab waves-effect waves-light grey darken-4"><i class="material-icons yellow-text text-accent-3">star</i></button>
          </div>
          <div class="card-content">
          <span class="card-title"><?php echo $row_songs['songname'] ?></span>
            <ul>         
              <li name="artist_name"><label>Artist</label><span>  </span><?php echo $row_songs['artistname']?></li>
              <li name="artist_name"><label>Length</label><span>  </span><?php echo $row_songs['songlength'] ?></li>
              <li name="song_name"><label>Made By</label><span>  </span><?php echo $row_songs['username'] ?></li>
            </ul>
          </div>
        </div>
      <div class="col s3"></div>
    </div>
    </form>
    <?php
      }
      // Favorite Variables
      @$artist = $row_songs['artistname'];
      @$song = $row_songs['songname'];
      @$covera = $row_songs['albumcover'];
      @$creator = $row_songs['username'];
      @$id = $row_songs['songID'];
      @$pid = $_POST['song_id'];
      @$songlength = $row_songs['songlength'];

      if(!isset($pid)){
        $pid = 1;
      }
      
      
      //$sql = "INSERT INTO favorites(artistname, songname, albumcover, username) VALUES ('$artist', '$song', '$covera', '$user')";
      $sql_insert = "INSERT INTO favorites(artistname, songname, albumcover) SELECT artistname, songname, albumcover FROM songs WHERE songID='$pid'";
      $sql_user = "UPDATE favorites Set username = '$user'";
      $sql_check = "SELECT * FROM favorites WHERE songname = '$song' AND username = '$user'";
      if(isset($_POST['fave'])){
          if (!$con->query($sql_check)->num_rows > 0) {
            $con->query($sql_insert);
            $con->query($sql_user);
          }
      }
    ?>

</div>
<p class="center row">
    <a href="index.php?link=2" class="btn-floating btn-large waves-effect waves-light yellow lighten-2 center"><i class="material-icons black-text">add</i></a>            
</p>

<?php
    unset($sql);
    unset ($artist);
    unset ($album);
    unset ($covera);
    unset ($song);
    unset ($creator);
    unset ($sql);
    unset ($songlength);
    unset ($result_songs);
    unset ($row_songs);
    $con->close();
?>
<script type="text/javascript" src="js/materialize.min.js"></script>