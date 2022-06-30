<?php include './DBConn.php'; ?>

<?php     
    $istTblUserAvailable = mysqli_query($conn, 'select 1 from `tblUser` LIMIT 1');
    $istTblBookAvailable = mysqli_query($conn, 'select 1 from `tblBook` LIMIT 1');
    $istTbltblOrderLineAvailable = mysqli_query($conn, 'select 1 from `tblOrderLine` LIMIT 1');

    // checking if the file exist, if it does we delete it!
    if($istTblUserAvailable !== FALSE){
        $deleteTbl = "DROP TABLE tblUser;";
        mysqli_query ($conn, $deleteTbl);
    }

    // checking if the file exist, if it does we delete it!
    if($istTblBookAvailable !== FALSE){
        $deleteTbl = "DROP TABLE tblBook;";
        mysqli_query ($conn, $deleteTbl);
    }

    if($istTbltblOrderLineAvailable !== FALSE){
        $deleteTbl = "DROP TABLE tblOrderLine;";
        mysqli_query ($conn, $deleteTbl);
    }

    $userDataFilename = "userData.txt";
    $fp = fopen($userDataFilename, "r");
    $newUsers = fread($fp, filesize($userDataFilename));

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

    $createBookTable = "
        CREATE TABLE `tblBook` (
            `book_id` INT NOT NULL AUTO_INCREMENT,
            `title` varchar(400) NOT NULL,
            `image` text NOT NULL,
            `user_id` int(11) NOT NULL,
            `description` text NOT NULL,
            `isbn` varchar(255) NOT NULL,
            `category` varchar(255) DEFAULT NULL,
            `quantity` int(11) NOT NULL DEFAULT 20,
            `price` decimal(10,0) NOT NULL,
            `is_available` tinyint(1) NOT NULL DEFAULT '1',
            `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `shipping_price` decimal(10,0) NOT NULL DEFAULT '0',
            PRIMARY KEY (`book_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    $createOrderTable = "
        CREATE TABLE `tblOrderLine` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `price` decimal(10,0) NOT NULL,
            `order_number` varchar(255) NOT NULL,
            `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `is_shipped` tinyint(1) NOT NULL DEFAULT '0',
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";

    $createOrderProductTable = "
        CREATE TABLE `tblBookUserOrder` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `book_id` int(11) NOT NULL,
            `order_number` varchar(255) NOT NULL,
            `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ";
    
    // Creating tables;
    mysqli_query ($conn, $createUserTable);

    // Adding 5 users
    mysqli_query ($conn, $newUsers);

    $bookDataFilename = "booksData.txt";
    $fp = fopen($bookDataFilename, "r");
    $newUsers = fread($fp, filesize($bookDataFilename));

    // Creating Books Table
    mysqli_query ($conn, $createBookTable);

    // Adding 5 books
    mysqli_query ($conn, $newUsers);

    // Creating order Table
    mysqli_query ($conn, $createOrderTable);
        
    //close connection
    mysqli_close ($conn);

    echo '<p>Done!!</p>';
?>

