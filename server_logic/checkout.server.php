<?php 
    session_start();
?>

<?php 
    require_once '../config/DBConn.php';

    //checking if the user is approved or not
    if(isset($_SESSION["user_id"])){
        //Checking if there are items in the shopping cart
        if (isset($_SESSION["shopping_cart"])) {
            echo "yes";
            // header('Location: ../login.php');
            // exit();
        }else {
            header('Location: ../login.php');
            exit();
        }
    }else{
        header('Location: ../login.php?redirect=checkout.server.php');
        exit();
    }
?>