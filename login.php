<?php
  include('./includes/header.php');
  include('./database/database.php');
  include('./utils/functions.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST["authEmail"])) {
      $errors[] = 'Email is required!';
    } else {
      $email = cleanValues($_POST["authEmail"]);
    }

    if (empty($_POST["authPass"])) {
      $errors[] = 'Password is required!';
    } else {
      $password = cleanValues($_POST["authPass"]);
    }

    if (empty($errors)) {
      $query = "SELECT * FROM user_accounts WHERE pass = '$password' AND email = '$email'";
      $results = mysqli_query($connection, $query);
      
      // Check if user exists
        if (mysqli_num_rows($results) == 1) {
            session_start();
            $_SESSION['userEmail'] = $email;

            // forward on to landing page
            header('Location: home.php');
        } else {
            $errors[] = 'User does not exist.';
        }
    }
  }

?>
<body class="container-fluid">
  <div class="row form-content main-content">
    <div class="col-sm-12 col-md-6 offset-md-3">
      <?php
        if (!empty($errors)) {
          echo "<div class='alert alert-danger mt-2'>";
          echo "<p class=''>Submition Error:</p>";
          foreach ($errors as $error) {
      			echo "<span class=''> - $error</span><br>\n";
      		}
          echo "</div>";
        }
      ?>
      <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div style="margin-top: 30px;" class="h2">
          Login:
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="authEmail" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="authPass" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</body>
<?php
  include('./includes/footer.php');
?>
