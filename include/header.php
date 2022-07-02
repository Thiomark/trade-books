<?php include './config/DBConn.php'; ?>

<?php 
    session_start();
?>

<style>
    <?php include "css/main.css" ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Books</title>
</head>
<body>
    <div class="full_height">
        <header>
            <div>
                <a href="index.php">Trade Books</a>
                <div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <input type="text" name="searchInput" placeholder="Search for ISBN or book title....">
                        <input type="submit" name="searchSubmit" value="search" >
                    </form>
                    <a href="addbook.php">Sell</a>
                    <a href="trackorder.php">Track Order</a>
                    <?php 
                        if(isset($_SESSION["user_id"])){
                            echo "<a href='server_logic/logout.server.php'>Logout</a>";
                            echo "<a href='orders.php'>Orders</a>";
                        }
                        else{
                            echo "<a href='login.php'>Sign In</a>";
                        }
                    ?>
                    <a href='admin.php'>Admin</a>
                    <a class="buttons" href="messages.php">Messages</a>
                    <a class="buttons" style="position: relative;" href="cart.php">      
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-right: .8em;" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                        </svg>
                        <span style="position: absolute; top: 0; right: 0;">
                            <?php 
                                echo isset($_SESSION["shopping_cart"]) ? count($_SESSION["shopping_cart"]) : 0
                            ?>
                        </span>
                    </a>
                </div>
            </div>
        </header>