<?php 
    $port = 8889;

    $conn = mysqli_connect('localhost', 'thio', '', 'bookstore', $port);

    //check connection 
    if ($conn === false){
        die ("ERROR: Could not connect"  .mysqli_connect_error ());
    }

// echo 'Connected successfully';
