<?php
  $host = 'localhost'; #online hostname
  $user = 'root'; #online username
  $pass = ''; #online password
  $dbms = 'uptiph'; #online dbname test

  try
  {
    $connection = new PDO("mysql:host=$host;dbname=$dbms", $user, $pass);
    // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo 'Database Connected Successfully';
  }
  catch (PDOException $x)
  {
    echo 'Database Error Connection: ' . $x->getMessage();
  }
?>