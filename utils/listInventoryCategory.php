<?php
    include('../database/database.php');
    header('Content-Type: text/json');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $search = $_POST["search"];

      $query = "SELECT * FROM inventory WHERE item_category = '$search'";
      $result = mysqli_query($connection, $query);

      $array = [];

      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $array[] = $row;
      }

      $output = json_encode($array);
      echo $output;
    }

?>
