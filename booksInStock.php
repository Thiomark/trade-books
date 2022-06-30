<?php include './include/header.php'; ?>
    
    <?php
        if(isset($_SESSION["role"]) && $_SESSION['role'] == 'admin'){
            // // Fetching all the unapproved students
            // $sql = "SELECT * FROM tblUser WHERE role = 'student' AND is_approved = 0";
            // $result = mysqli_query($conn, $sql);
            // $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // // Fetching all students
            // $sql2 = "SELECT * FROM tblUser WHERE role = 'student'";
            // $result2 = mysqli_query($conn, $sql2);
            // $allstudents = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        }else{
            echo '<script>window.location="login.php"</script>';
            exit();
        }
    ?>

    <main class="admin">
        <nav>
            <a href="">View All Books</a>
            <div>|</div>
            <a href="">Approve Students</a>
        </nav>
    </main>
    
<?php include './include/footer.php'; ?>