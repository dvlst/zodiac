<?php
  // Variables
  @$user = $_SESSION['username'];

  // SQL Queries
  $sql_artists = "SELECT * FROM artists";
  $sql_songs = "SELECT * FROM songs";
  $sql_albums = "SELECT * FROM albums";

  // MySQL
  $con = new mysqli($servername, $username, $password, $dbname);
  
?>

<div class="row container col s12">  

  <form action="songs.php" method="post">
    <?php
        $result_artists = $con->query($sql_artists);
        $result_songs = $con->query($sql_songs);
        $result_albums = $con->query($sql_albums);
        while (($row_artists = $result_artists->fetch_assoc()) && ($row_songs = $result_songs->fetch_assoc()) && ($row_albums = $result_albums->fetch_assoc())){
        
        
        // Favorite DB Variables
        @$artist = $row_artists['artistname'];
        @$song = $row_songs['songname'];
        @$covera = $row_albums['albumcover'];
        @$creator = $row_songs['username'];
        @$id = $row_songs['songID'];
        @$songlength = $row_songs['songlength'];
        
        $sql = "INSERT INTO favorites(artistname, songname, albumcover, username) VALUES ('$artist', '$song', '$covera', '$creator')";
        $sql2 = "SELECT * FROM favorites WHERE songname = '$song' AND username = '$user'";
        if(isset($_POST['fave'])){
            if ($con->query($sql2)->num_rows > 0) {

            }
            else {
              $con->query($sql);
            }
        } else{
          
        }
    ?>
    <div class="row col s12 m6">
      <div class="col s3"></div>
      <div class="card">
        <div class="card-image">
          <?php echo '<img src="'.$covera.'" alt="Album Cover">';?>
          <button type="submit" name="fave" style="background:rgba(0, 0, 0, 0);border:none;" class="btn-large btn-floating halfway-fab waves-effect waves-light grey darken-4"><i class="material-icons yellow-text text-accent-3">star</i></button>
        </div>
        <div class="card-content">
        <span class="card-title"><?php echo $song ?></span>
          <ul>
            <li name="artist_name"><label>Artist</label><span>  </span><?php echo $artist ?></li>
            <li name="artist_name"><label>Length</label><span>  </span><?php echo $songlength ?></li>
            <li name="song_name"><label>Made By</label><span>  </span><?php echo $creator ?></li>
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
<p class="center row">
    <a href="add.php" class="btn-floating btn-large waves-effect waves-light yellow lighten-2 center"><i class="material-icons black-text">add</i></a>            
  </p>

<?php
    unset($sql);
    unset ($artist);
    unset ($album);
    unset ($covera);
    unset ($song);
    unset ($creator);
    unset ($sql_albums);
    unset ($sql_artists);
    unset ($sql_songs);
    unset ($songlength);
    unset ($result_artists);
    unset ($result_songs);
    unset ($result_albums);
    unset ($row_artists);
    unset ($row_songs);
    unset ($row_albums);
    $con->close();
?>
<script type="text/javascript" src="js/materialize.min.js"></script>