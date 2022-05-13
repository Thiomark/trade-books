<?php include './DBConn.php'; ?>

<?php     
    $istTblUserAvailable = mysqli_query($conn, 'select 1 from `tblUser` LIMIT 1');

    // checking if the file exist, if it does we delete it!
    if($istTblUserAvailable !== FALSE){
        $deleteTblUser = "DROP TABLE tblUser;";
        mysqli_query ($conn, $deleteTblUser);
    }

    $filename = "userData.txt";
    $fp = fopen($filename, "r");
    $newUsers = fread($fp, filesize($filename));

    $createUserTable = "
        CREATE TABLE `tblUser` (
            `user_id` INT NOT NULL AUTO_INCREMENT, 
            `username` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `role` varchar(255) NOT NULL DEFAULT 'student',
            `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `student_number` varchar(255) NOT NULL,
            `is_approved` tinyint(1) NOT NULL DEFAULT '0',
            `name` varchar(255) NOT NULL,
            PRIMARY KEY (`user_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
    
    // Creating the table;
    mysqli_query ($conn, $createUserTable);

    // Adding the users
    mysqli_query ($conn, $newUsers);
        
    //close connection
    mysqli_close ($conn);

    echo '<p>Done!!</p>';
?>

