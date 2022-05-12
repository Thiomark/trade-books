<?php 
    require_once '../config/database.php';
    if(isset($_GET["approve"])) {

        $id = (int) $_GET["approve"];
        $sql = "UPDATE tblUser SET is_approved = '1' WHERE user_id = $id;";

        mysqli_query ($conn, $sql);
    }; 
    
    header('Location: ../approvestudents.php');
    exit();