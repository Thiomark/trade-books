<?php

    // Set vars to empty values
    $name = $username = $password = $student_number = $re_password = '';
    require_once '../config/DBConn.php';

    function authenticateUser($conn, $username, $password){
        // Fetches the user based on their unsername or student number

        $gettingUser = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' OR student_number = '$username';");
            
        // If there is row returned based on the username or student number, there user is found!
        if(mysqli_num_rows($gettingUser) > 0){

            // retrieves the contents of current row in the given result object, and returns them as an associative array
            $row = mysqli_fetch_assoc($gettingUser);

            // Checks if the password is the same as the hash password
            $checkPassword = password_verify($password, $row["password"]);

            if($checkPassword === true){
                session_start();
                $_SESSION["user_id"] = $row['user_id'];             // storing the user id in the session so that other pages have access to the id, pages like uploading books
                $_SESSION["role"] = $row['role'];                   // storing the role of the user, so we can show more resources on the website if the user is admin
                $_SESSION["is_approved"] = $row['is_approved'];     // checking if the user was approved before they can upload a book

                // Going to the home page
                header('Location: ../index.php');
                exit();
            }
            else if ($checkPassword === false){
                header('Location: ../login.php?error=invalidCredentials');
                exit();
            }
        }else {
            header('Location: ../login.php?error=invalidCredentials');
            exit();
        }
    }

    // Form submit
    if (isset($_POST['login'])) {

        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: ../login.php?error=missingInputs');
            exit();
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $gettingUser = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' OR student_number = '$username';");
            
            authenticateUser($conn, $username, $password);
        }
    }
    else if (isset($_POST['register'])) {
        
        // checking if the user entered all the required fields for creating a new account
        if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['student_number']) || empty($_POST['password']) || empty($_POST['re_password'])) {
            header('Location: ../register.php?error=missingInputs');
            exit();
        } 
        else {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $re_password = filter_input(INPUT_POST, 're_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $student_number = filter_input(INPUT_POST, 'student_number', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $admin_code = filter_input(INPUT_POST, 'admin_code', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // checking if passwords match or not
            if ($password !== $re_password){
                header('Location: ../register.php?error=passwordDoNotMatch');
                exit();
            }

            //checking if username exist in my database
            $checkUsernameAndStudentNo = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' OR student_number = '$student_number';");

            if(mysqli_num_rows($checkUsernameAndStudentNo) > 0){
                header('Location: ../register.php?error=userAlreadyExist');
                exit();
            }
            else{
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $secretAdminCode = 'admin321'; // if any user register with this code they will be an admin
                
                $sql = "INSERT INTO tblUser (username, password, student_number, name) VALUES ('$username', '$hashedPassword', '$student_number', '$name');";

                if(!empty($admin_code) && $admin_code === $secretAdminCode){
                    $sql = "INSERT INTO tblUser (username, password, student_number, name, role, is_approved) VALUES ('$username', '$hashedPassword', '$student_number', '$name', 'admin', '1');";
                }

                if (mysqli_query ($conn, $sql)){
                    authenticateUser($conn, $username, $password);
                } 
                else{
                    // it is unusal for the application to get to this point
                    // if it does there is something wrong with the database
                    header('Location: ../register.php?error=unknownError');
                    exit();
                }
            }
        }
    }
?>