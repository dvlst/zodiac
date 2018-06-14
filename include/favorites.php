<?php
  // Variables
  @$user = $_SESSION['username'];

  // MySQL
  $con = new mysqli($servername, $username, $password, $dbname);

  if (!isset($_SESSION['username'])) {
    header('Location: sites/login.php');
  }
?>

<!-- Search Bar -->
<nav class="nav-wrapper row container">
  <form action="" method="post">
    <div class="input-field white ">
      <input id="search" type="search" name="search" required>
      <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
      <i class="material-icons black-text">close</i>
    </div>
  </form>
</nav>

<form action="index.php?go" id="searchform">
  <?php
  if(isset($_POST['search'])){
    $search = $_POST['search'];
    @$sql = "SELECT * FROM songs WHERE songname LIKE '%".$search."%' OR artistname LIKE '%".$search."%'";
  }
  else{
    @$sql = "SELECT * FROM favorites WHERE username='$user'";
  }
  ?>
<!-- -->

<div class="row container col s12">
  <form action="" method="post">
    <?php
      $result_faves= $con->query($sql);
      while ($row_faves = $result_faves->fetch_assoc()){
      
      @$id = $row_faves['favoriteID'];
      @$artist = $row_faves['artistname'];
      @$song = $row_faves['songname'];
      @$covera = $row_faves['albumcover'];
      @$creator = $row_faves['username'];
    ?>
    <div class="row col s12 m6">
      <div class="col s3"></div>
      <div class="card">
        <div class="card-image">
          <?php echo '<img src="'.$covera.'">';?>
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