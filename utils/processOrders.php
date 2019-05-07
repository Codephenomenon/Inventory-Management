<?php
  include('../database/database.php');
  header('Content-Type: text/json');

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    // Remove items from Inventory
    $query="UPDATE inventory SET item_amount = (item_amount - (SELECT COUNT(item_id) FROM order_items WHERE order_id = '$id' AND inventory.item_id = order_items.item_id))";
    $result = mysqli_query($connection, $query);
    
    // Remove order from Database
    $query2="DELETE FROM orders WHERE order_id = '$id'";
    $result2 = mysqli_query($connection, $query2);
  }
?>
