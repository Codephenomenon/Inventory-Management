<!DOCTYPE html>
<html>
  <head>
  <title>Inventory CMS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <header>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <h1 class="navbar-brand">Apex Systems</h1>
        <?php
        session_start();
        if (isset($_SESSION['userEmail'])) {
          echo "<ul class='horizontal nav navbar-nav text-white'>
            <li class='nav-item'><a href='./home.php'>Home</a></li>
            <li><a href='./add.php'>Add Items</a></li>
            <li><a href='./orders.php'>Orders</a></li>
          </ul>";
        }
        ?>
        <?php
        if (isset($_SESSION['userEmail'])) {
          echo "<div class='header-button'><a href='./logout.php'>logout</a></div>";
        } else {
          echo "<div class='header-button'><a href='./login.php'>Login</a></div>";
        }
        ?>
      </div>
    </nav>
  </header>
