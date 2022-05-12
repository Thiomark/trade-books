<?php 
    session_start();
?>

<?php 
    require_once '../config/database.php';

    if (isset($_POST['submit'])) {
        //checking if the user is approved or not
        if(isset($_SESSION["user_id"])){
            if(isset($_SESSION["is_approved"]) && $_SESSION['is_approved'] == '1'){
                $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $shippingPrice = filter_input(INPUT_POST, 'shippingPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                $userID = (int) $_SESSION["user_id"];
                $num_price = (int) $price;
                $num_shipping_price = (int) $shippingPrice;
    
                $sql = "INSERT INTO tblBook (user_id, description, isbn, category, price, title, shipping_price) VALUES ($userID, '$description', '$isbn', '$category', $num_price, '$title', '$num_shipping_price');";
            
                if(mysqli_query($conn, $sql)){
                    header('Location: ../index.php?message=bookAdded');
                    exit();
                }
                else{
                    header('Location: ../index.php?error=bookNotAdded');
                    exit();
                }
            }
            else {
                header('Location: ../index.php?error=notApproved');
                exit();
            }
        }
        else{
            header('Location: ../login.php');
            exit();
        }
    }
?>

