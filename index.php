<?php
  include('./includes/header.php');
  include('./database/database.php');
  include('./utils/functions.php');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST["username"])) {
      $errors[] = 'Username is required!';
    } else {
      $username = cleanValues($_POST["username"]);
    }

    if (empty($_POST["email"])) {
      $errors[] = 'Email is required!';
    } else {
      $user_email = cleanValues($_POST["email"]);
    }

    if (empty($_POST["password"])) {
      $errors[] = 'Password is required!';
    } else {
      $password = cleanValues($_POST["password"]);
    }

    if (empty($errors)) {
      // Create user in Database
      $query = "INSERT INTO user_accounts (username, email, pass) VALUES ('$username', '$user_email', '$password')";
      $result = @mysqli_query($connection, $query);
      header('Location: login.php');
    }
  }

 ?>
<body class="container-fluid">
  <div class="jumbotron">
    <h1>Manage Inventory</h1>
    <p>Create an account or log in to use our system. This software provides users with the ability to manage inventory for their business and fulfill customer orders.</p>
    <p>Sort Inventory by Categories of items, users can add, delete, and update the amount of inventory available for specific items.</p>
  </div>
  <div class="row form-content">
    <div class="col-sm-12 col-md-6 offset-md-3">
      <?php
        if (!empty($errors)) {
          echo "<div class='alert alert-danger'>";
          echo "<p class=''>Submition Error:</p>";
          foreach ($errors as $error) {
      			echo "<span class=''> - $error</span><br>\n";
      		}
          echo "</div>";
        }
      ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="h2">
          Register an Account:
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" class="form-control" aria-describedby="usernameHelp" placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
          <small class="form-text text-muted">You will not receive any spam email from us.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</body>
<?php include('./includes/footer.php'); ?>
