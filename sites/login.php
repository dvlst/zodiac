<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    </head>

    <body>
      <form action="login.php" method="post">
        <nav class="nav-wrapper yellow lighten-2">
            <a href="../index.php" class="black-text brand-logo center">Zodiac</a>
        </nav>
        <div class="row"></div>
        <div class="container row">
          <div class="col s4"></div>
          <div class="col s3">
              <input id="first_name" type="text" class="validate" name="username">
              <label for="first_name">Username</label>
          </div>
          <div class="col s4"></div>
        </div>

        <div class="container row">
          <div class="col s4"></div>
          <div class="col s3">
            <input id="password" type="password" class="validate" name="passwd">
            <label for="password">Password</label>   
          </div>
          <div class="col s4"></div>
        </div>
        
        <div class="container row">
          <div class="col s4"></div>
          <div class="col s1">
            <button type="submit" value="Login" class="black-text waves-effect waves-light btn-small yellow lighten-2">Login</button>
          </div>
        </div>
      </form>

     <div class="container row">
        <div class="col s4"></div>
        <div class="col s1">
          <a href="register.php" value="Register" class="grey-text text-darken-1 text-lighten-2">Sign up</a>
        </div>
      </div>
      <?php
        session_start();

        # Variables
        @$user = $_POST['username'];
        $_SESSION['username'] = $user;
        @$pass = $_POST['passwd'];
        $servername = "localhost";
        $username = "root";
        $password = "gibbiX12345";
        $dbname = "zodiac";
        

        # Check if User exists
        $con = new mysqli($servername, $username, $password, $dbname);

        if ($con->connect_error) {
            die("Unknown Error appeared" . $con->connect_error);
        }

        if(isset($user)){

          $sql = "SELECT * FROM users WHERE username = '$user' AND passwd='$pass'";
          
          if($con->query($sql)->num_rows > 0)
            {
              header('Location: ../index.php');
            }
          else {
              echo "<p class='center red-text text-darken-4'>False password / username</p>";
              unset($_SESSION['username']);
          }
        }

        unset ($user);
        unset ($pass);

        $con->close();
      ?>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
    </body>
  </html>