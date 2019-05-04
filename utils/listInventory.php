<?php

    header('Content-Type: text/json');

    $connection = mysqli_connect('localhost', 'scott', 'tiger', 'cms');

    $query = 'SELECT * FROM inventory';
    $result = mysqli_query($connection, $query);

    $array = [];

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $array[] = $row;
    }

    $output = json_encode($array);
    echo $output;

?>
