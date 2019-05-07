<?php
    include('../database/database.php');
    header('Content-Type: text/json');

    $query = 'SELECT * FROM inventory';
    $result = mysqli_query($connection, $query);

    $array = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $array[] = $row;
    }

    $output = json_encode($array);
    echo $output;

?>
