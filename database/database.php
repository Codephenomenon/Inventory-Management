<?php

  $host = 'localhost';
  $user = 'scott';
  $password = 'tiger';
  $database = 'cms';

  // Database Connection
  $connection = @mysqli_connect($host, $user, $password, $database) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );
?>
