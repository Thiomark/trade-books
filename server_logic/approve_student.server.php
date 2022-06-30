<?php 
    require_once '../config/DBConn.php';
        //if( && $_SESSION['role'] == 'admin' && isset($_GET["id"])) {
        if(isset($_GET["action"]) && isset($_SESSION["role"])) {

            // $id = (int) $_GET["id"];
            // $sql = "UPDATE tblUser SET is_approved = " . $_GET["action"] == 'approve' ? 1 : 0 . " WHERE user_id = $id;";
            // mysqli_query ($conn, $sql);

            exit();
        }
    
    header('Location: ../approvestudents.php');
    exit();