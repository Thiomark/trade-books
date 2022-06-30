<?php 
    session_start();
?>

<?php 
    require_once '../config/DBConn.php';

    if (isset($_POST['submit'])) {

        //checking if the user is approved or not
        if(isset($_SESSION["user_id"])){

            if(isset($_SESSION["is_approved"]) && isset($_SESSION['is_approved']) == 1){

                $allowed_ext = array('png', 'jpg', 'jpeg');

                if(!empty($_FILES['upload']['name'])){
                    $file_name = $_FILES['upload']['name'];
                    $file_size = $_FILES['upload']['size'];
                    $file_tmp = $_FILES['upload']['tmp_name'];

                    // Get file ext
                    $filename_exploaded = explode('.', $file_name);
                    $file_ext = strtolower(end($filename_exploaded));

                    if(in_array($file_ext, $allowed_ext)) {
                        $fileNameNew = reset($filename_exploaded) . "-" . uniqid('', true) . "." . $file_ext;
                        $target_dir= "uploaded_images/${fileNameNew}";
                        move_uploaded_file($file_tmp, $target_dir);

                        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
                        $userID = (int) $_SESSION["user_id"];
                        $num_price = (int) $price;
                        $num_quantity = (int) $quantity;
            
                        $sql = "INSERT INTO tblBook (user_id, description, isbn, category, price, title, image, quantity) VALUES ($userID, '$description', '$isbn', '$category', $num_price, '$title', '$fileNameNew', $num_quantity);";
                    
                        if(mysqli_query($conn, $sql)){
                        header('Location: ../index.php?message=bookAdded');
                            exit();
                        }
                        else{
                            header('Location: ../index.php?error=bookNotAdded');
                            exit();
                        }
                    }else {
                        header('Location: ../index.php?error=bookNotAdded');
                        exit();
                    }
                }else{
                    header('Location: ../index.php?error=NoBook');
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

