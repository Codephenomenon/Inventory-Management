<?php
  include('./includes/header.php');
  include('./database/database.php');
  include('./utils/functions.php');

?>
  <body class="container-fluid">
    <main class="main-content row align-items-center justify-content-center">
      <ul class="list-group col-md-10">
      <?php
        $query = "SELECT * FROM orders";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $order_id = $row['order_id'];
          $itemQuery = "SELECT * FROM order_items WHERE order_id = '$order_id'";
          $itemResult  = mysqli_query($connection, $itemQuery);

          echo "<li class='list-group-item order-list'>
                <div class='row'>
                  <h4 class='col-md-3'>Order From - " . $row['customer_name'] . "</h4>
                  <p class='col-md-3'>" . $row['customer_address'] . "</p>
                  <p class='col-md-3'>submitted at: " . $row['time_placed'] . "</p>
                </div>
                <ul class='list-group list-group-flush'>";
                while ($row2 = mysqli_fetch_array($itemResult, MYSQLI_ASSOC)) {
                  echo "
                        <li class='list-group-item'>
                          <h6>" . $row2['item_name'] . "</h6><p>$" . $row2['item_cost'] . "</p>
                        </li>
                      ";
                }
          echo "</ul><p class='text-muted float-left pt-2'>order total - $" . $row['order_total'] . "</p>";
          echo "<button onClick='processOrder(" . $order_id . ")' class='btn btn-primary float-right pt-2'>Process Order</button></li>";
        }
      ?>
      </ul>
    </main>
  </body>
<?php include('./includes/footer.php'); ?>
