<?php
  include('./includes/header.php');
  include('./database/database.php');
?>
<body class="container-fluid">
  <main class="main-content row">
    <div class="col-md-3 col-sm-12 bg-secondary">
      <div class="row text-white">
        <h4 class="pt-3 mx-auto">Welcome, <?php echo $_SESSION['userEmail']; ?></h4>
        <p class="pt-1 mx-auto">Search for inentory items or filter selected data:</p>
      </div>
      <div class="row">
        <div class="col-10 offset-1 input-group mb-3">
          <input id="inputBar" type="text" class="form-control" placeholder="Product..." aria-label="Username" aria-describedby="basic-addon1">
          <div class="input-group-append">
            <button id="inputButton" class="btn btn-info" type="button"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
          $query = "SELECT * FROM category";
          $result = @mysqli_query($connection, $query);

          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<div class='p-3 col-12'>";
            echo "<label onclick='displayCategory(" . $row['category_id'] . ")' class='checkbox-inline checkbox-container'><input class='mr-2 checkbox' type='checkbox'>" . $row['category_name'] . "<span class='checkmark'></span></label>";
            echo "</div>";
          }
        ?>
      </div>
    </div>
    <div class="col-md-9 col-sm-12">
      <div id="list-container" class="row">

      </div>
    </div>
  </main>
</body>
<?php include('./includes/footer.php'); ?>
