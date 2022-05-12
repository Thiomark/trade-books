<?php

    function authenticateUser(){
        
    }

    // Set vars to empty values
    $name = $username = $password = $student_number = $re_password = '';
    require_once '../config/database.php';

    // Form submit
    if (isset($_POST['login'])) {

        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: ../login.php?error=missingInputs');
            exit();
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $gettingUser = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' OR student_number = '$username';");
            
            if(mysqli_num_rows($gettingUser) > 0){
                $row = mysqli_fetch_assoc($gettingUser);

                $checkPassword = password_verify($password, $row["password"]);

                if($checkPassword === true){
                    session_start();
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["role"] = $row['role'];
                    $_SESSION["is_approved"] = $row['is_approved'];

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
                $sql = "INSERT INTO tblUser (username, password, student_number, name) VALUES ('$username', '$hashedPassword', '$student_number', '$name');";

                if (mysqli_query ($conn, $sql)){
                    // taking the user to the login page so they can see if they can login
                    header('Location: ../login.php?message=success');
                    exit();
                } 
                else{
                    // it is unusal for the application to get to this point
                    header('Location: ../register.php?error=unknownError');
                    exit();
                }
            }
        }
    }
?>