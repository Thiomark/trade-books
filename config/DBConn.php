<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'thio');
    define('DB_PASS', '');
    define('DB_PORT', '8889');
    define('DB_NAME', 'bookstore');

    // $conn = pg_connect("host=localhost port=5432 dbname=bookstore user=postgres password=8927623");

    // if($conn){
    //     echo 'connected';
    // }else{

    // }

    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
  

