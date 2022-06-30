<?php 
    session_start();
?>

<?php 
    require_once '../config/DBConn.php';

    //checking if the user is approved or not
    if(isset($_SESSION["user_id"])){
        //Checking if there are items in the shopping cart
        if (isset($_SESSION["shopping_cart"])) {

            $total = 0;
            $length = 20;
            $userID = $_SESSION["user_id"];
            $orderID = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
            foreach($_SESSION["shopping_cart"] as $keys => $values) {
                $total = $total + ($values["quantity"] * $values["price"]);

                $bookSql = "SELECT * FROM tblBook WHERE book_id = " . $values["id"] .";";
                $result = mysqli_query($conn, $bookSql);
                $book = mysqli_fetch_assoc($result);

                $updateBooksql = "UPDATE tblBook SET quantity = (". $book["quantity"] ." - " . $values["quantity"] . ") WHERE book_id = " . $book["book_id"] . ";";
                $result = mysqli_query($conn, $updateBooksql);
            }

            $sql = "INSERT INTO tblOrderLine (user_id, price, order_number) VALUES ($userID, $total, '$orderID');";
                    
            if(mysqli_query($conn, $sql)){
                unset($_SESSION["shopping_cart"]);
                header('Location: ../orders.php?message=success');
            }
            else{
                header('Location: ../orders.php?error=something');
            }
            exit();
        }else {
            header('Location: ../login.php');
            exit();
        }
    }else{
        header('Location: ../login.php?redirect=checkout.server.php');
        exit();
    }
?>