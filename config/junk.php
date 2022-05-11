<?php
        if (isset($_POST['submit'])) {
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
                $checkUsernameAndStudentNo = mysqli_query($conn, "SELECT * FROM tblUser;");

    
                echo $checkUsernameAndStudentNo;
                // $checkUsernameAndStudentNo = mysqli_query($conn, "SELECT * FROM tblUser WHERE username = '$username' OR student_number = '$student_number';");
    
                $sql = 'SELECT * FROM tblUser';
                $result = mysqli_query($conn, $sql);
                $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
                if(mysqli_num_rows($checkUsernameAndStudentNo) > 0) {
                    header('Location: ../register.php?usernameOrstudentNumberAlreadyExist');
                    exit();
                }
                else{
                    // everything was successfull
                    header('Location: ../index.php');
                    // header('Location: ../register.php');
                    exit();
                }
    
                
    
                
                echo '3';
    
    
    
    
                // $stmt = mysqli_stmt_init($conn);
    
                // // Before it runs the sql code it gonna validate it first and check if there are any errors
                // if(mysqli_stmt_prepare($stmt, $checkUsernameAndStudentNo)){
                //     header('Location: ../register.php?stmtFailed');
                //     exit();
                // }
    
                // mysqli_stmt_bind_param($stmt, "ss", $username, $student_number);
                // mysqli_stmt_execute($stmt);
    
    
    
    
            
                // first checking if the username or the student number already exits or not in the database
    
    
                
                // $sql = "INSERT INTO tblUser (name, username, password, student_number) VALUES ('$name', '$username', '$password', '$student_number')";
                // if (mysqli_query($conn, $sql)) {
                //     // success
                //     header('Location: index.php');
                // } else {
                //     // error
                //     header('Location: register.php');
                //     echo 'Error: ' . mysqli_error($conn);
                // }
                // add to database
            }
        }
    ?>