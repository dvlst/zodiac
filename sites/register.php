<!DOCTYPE html>
  <html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    </head>

    <body>
      <nav class="nav-wrapper yellow lighten-2">
          <a href="../index.php" class="black-text brand-logo center">Zodiac</a>
      </nav>

      <div class="row"></div>
      <form action="register.php" method="post">
        <div class="container row">
            <div class="col s4"></div>
            <div class="col s3">
            <input id="email_inline" type="email" class="validate" name="email">
            <label for="email_inline">Email</label>
            </div>
            <div class="col s4"></div>
        </div>

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
          <button type="submit" value="Login" class="black-text waves-effect waves-light btn-small yellow lighten-2">Register</button>
        </div>
      </div>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      </form>

    <?php
        session_start();

        # Variables
        @$user = $_POST['username'];
        @$pass = $_POST['passwd'];
        @$email = $_POST['email'];
        $servername = "localhost";
        $username = "root";
        $password = "gibbiX12345";
        $dbname = "zodiac";
        

        # Create User Code
        $con = new mysqli($servername, $username, $password, $dbname);

        if ($con->connect_error) {
            die("Unknown Error appeared" . $con->connect_error);
        }

        if(isset($user)){

          $sql = "SELECT * FROM users WHERE username = '$user'";
          
          if($con->query($sql)->num_rows > 0)
            {
                echo '<p>Username already taken</p>';
            }
          else {
              $sql = "INSERT INTO users(username, email, passwd) VALUES ('$user', '$email', '$pass')";

              if ($con->query($sql) === TRUE) {
                header('Location: login.php');
              }
              else {
                die("Unknown Error appeared" . $con->connect_error);
              }
            }
        }

        unset ($user);
        unset ($pass);
        unset ($email);

        $con->close();
      ?>
    </body>
  </html>