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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;1,100&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Books</title>
</head>
<body>
    <div class="full_height">
        <header class="border-b border-gray-100 mb-8">
            <div class="border-b py-2 border-gray-100">
                <div class="flex px-0 items-center justify-between m-auto max-w-[1200px]">
                    <?php 
                            if(isset($_SESSION["user_id"])){
                                echo "<a class='text-xs uppercase text-orange-400' href='server_logic/logout.server.php'>Logout</a>";
                            }else{
                        ?>
                        <h1 class="text-xs uppercase">welcome to Trade Books <a class="text-orange-400" href="login.php">Log in</a> or <a class="text-orange-400" href="regsiter.php">Register</a></h1>
                        <div class="flex items-center space-x-8">
                            <a href="#" class="flex text-orange-400 items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                                <span class="text-sm">My Account</span>
                            </a>
                            <a href="" class="flex text-orange-400 items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                                    <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
                                </svg>
                                <span class="text-sm">My Uploads</span>
                            </a>
                        </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
            <div class="bg-gray-100">
                <div class="flex items-center py-4 justify-between mx-auto max-w-[1200px]">
                    <a class="text-2xl font-semibold" href="index.php">Trade Books</a>
                    <nav class="flex space-x-3 items-center text-sm">
                        <form class="flex" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="text" class="w-full w-[250px] focus:outline-none border p-2 rounded" name="searchInput" placeholder="Search for ISBN or book title....">
                            <input type="submit" class="bg-gray-700 text-xs text-white px-3 border-none ml-1 rounded" name="searchSubmit" value="search" >
                        </form>
                        <a href="addbook.php">Sell</a>
                        <a href="trackorder.php">Track Order</a>
                        <?php 
                            if(isset($_SESSION["user_id"])){
                                echo "<a href='orders.php'>Orders</a>";
                            }
                        ?>
                        <a href='admin.php'>Admin</a>
                        <a class="buttons" href="messages.php">Messages</a>
                        <a class="buttons" style="position: relative;" href="cart.php">      
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="margin-right: .8em;" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            <span class="text-orange-400" style="position: absolute; top: 0; right: 0;">
                                <?php 
                                    echo isset($_SESSION["shopping_cart"]) ? count($_SESSION["shopping_cart"]) : 0
                                ?>
                            </span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="bg-orange-400 py-1.5">
                <h1 class="mx-auto text-center text-gray-900 text-xs">Free Delivery for 3 books</h1>
            </div>
        </header>