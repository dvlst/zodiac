<?php
  // Variables
  @$artist = $_POST['artist_name'];
  @$firstn = $_POST['first_name'];
  @$lastn = $_POST['last_name'];
  @$agenre = $_POST['a_genre'];
  @$sgenre = $_POST['s_genre'];
  @$song = $_POST['song_name'];
  @$album = $_POST['album_name'];
  @$release = $_POST['release_year'];
  @$length = $_POST['length'];
  @$covera = $_POST['album_cover'];
  @$user = $_SESSION['username'];

  // MySQL
  $con = new mysqli($servername, $username, $password, $dbname);

  if (!isset($_SESSION['username'])) {
    header('Location: sites/login.php');
  }
?>

<form action="" method="post" enctype="multipart/form-data">
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
  
  <div class="row"></div>
  <p class="grey-text text-darken-1 center">Song</p>
  <div class="divider"></div>

  <div class="container row col s12">
    <div class="row"></div>
    <div class="col s3">
      <input type="text" class="validate" name="song_name">
      <label>Song Name</label>
    </div>
    <div class="col s3">
      <input type="text" class="validate" name="album_name">
      <label>Album Name</label>
    </div>
  </div>

  <div class="container row col s12">
    <div class="row"></div>
    <div class="col s6">
      <input type="text" class="validate" name="album_cover">
      <label>Album Cover</label>
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

  <div class="row"></div>
  <p class="container row col s12">
    <button type="submit" value="Login" class="btn-floating btn-large waves-effect waves-light yellow lighten-2"><i class="material-icons black-text">add</i></button>            
  </p>
  <div class="row"></div>
</form>

<?php
  # Create Movie
  if(!empty($firstn || $lastn || $artist || $song || $release || $length || $album || $covera)) {
    $sql = "INSERT INTO songs (songname, releaseyear, songlength, username, artist_prename, artist_surname, artistname, albumname, albumcover) VALUES ('$song', '$release', '$length', '$user', '$firstn', '$lastn', '$artist', '$album', '$covera')";
    $con->query($sql);
    unset($sql);
  }
?>

<?php
  unset ($artist);
  unset ($fristn);
  unset ($lastn);
  unset ($agenre);
  unset ($sgenre);
  unset ($song);
  unset ($album);
  unset ($release);
  unset ($length);
  $con->close();
?>
<script type="text/javascript" src="js/materialize.min.js"></script>