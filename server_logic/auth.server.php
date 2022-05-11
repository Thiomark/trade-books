<?php
    // Set vars to empty values
    $name = $username = $password = $student_number = $re_password = '';
    require_once '../config/database.php';

    // Form submit
    if (isset($_POST['login'])) {

        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: ../login.php?missingInputs');
            exit();
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $gettingUser = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' AND password = '$password';");

            if(mysqli_num_rows($gettingUser) > 0){
                header('Location: ../index.php');
                exit();
            }else {
                header('Location: ../login.php?notAuthorized');
                exit();
            }
        }

    }
    else if (isset($_POST['register'])) {
        
        // checking if the user entered all the required fields for creating a new account
        if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['student_number']) || empty($_POST['password']) || empty($_POST['re_password'])) {
            header('Location: ../register.php?missingInputs');
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
                header('Location: ../register.php?passwordDoNotMatch');
                exit();
            }

            //checking if username exist in my database
            $checkUsernameAndStudentNo = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' OR student_number = '$student_number';");

            if(mysqli_num_rows($checkUsernameAndStudentNo) > 0){
                header('Location: ../register.php?userAlreadyExist');
                exit();
            }
            else{
                $sql = "INSERT INTO tblUser (username, password, student_number, name) VALUES ('$username', '$password', '$student_number', '$name');";

                if (mysqli_query ($conn, $sql)){
                    header('Location: ../index.php');
                    exit();
                } 
                else{
                    header('Location: ../register.php?unknownError');
                    exit();
                }
            }
        }
    }
?>