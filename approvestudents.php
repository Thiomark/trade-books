<?php include './include/header.php'; ?>
    
    <?php
        if(isset($_SESSION["role"]) && $_SESSION['role'] == 'admin'){
        
            // Fetching all the unapproved students
            $sql = "SELECT * FROM tblUser WHERE role = 'student' AND is_approved = 0";
            $result = mysqli_query($conn, $sql);
            $students = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Fetching all students
            $sql2 = "SELECT * FROM tblUser WHERE role = 'student'";
            $result2 = mysqli_query($conn, $sql2);
            $allstudents = mysqli_fetch_all($result2, MYSQLI_ASSOC);

            if(isset($_GET["action"]) && isset($_SESSION["role"])) {

                $id = (int) $_GET["id"];
                $actionType = $_GET["action"] == 'approve' ? 1 : 0;
                $sql = "UPDATE tblUser SET is_approved = " . $actionType . " WHERE user_id = $id;";
                // echo $sql;
                // exit();
                mysqli_query ($conn, $sql);
    
                echo '<script>window.location="approvestudents.php"</script>';
            }
        }else{
            echo '<script>window.location="login.php"</script>';
            exit();
        }
    ?>
    <div class="approve admin">
        <nav>
            <a href="admin.php">View All Books</a>
            <div>|</div>
            <a href="approvestudents.php">Approve Students</a>
            <div>|</div>
            <a href="orders.php">Orders</a>
        </nav>
        <?php if (empty($students)): ?>
            <div class="message" style="margin-bottom: 1em;">
                <p>There are no students to approve</p>
            </div>
        <?php endif; ?>
        <ul>
            <?php echo count($students) > 0 ? "<h3>Students not approved</h3>" : ""?>
            
            <?php foreach ($students as $item): ?>
                <li>
                    <div class="left">
                        <p><?php echo $item['student_number']; ?></p>
                        <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
                        <p><?php echo $item['name']; ?></p>
                    </div>
                    <?php echo "<a href='approvestudents.php?action=approve&id=" . $item['user_id'] . "'>approve</a>" ?> 
                </li>
            <?php endforeach; ?>
        </ul>
        <ul class="mt-10 pt-3 border-gray-200 border-t">
            <h3 class=''>All Students</h3>
            <?php foreach ($allstudents as $item): ?>
                <li>
                    <div class="left">
                        <p><?php echo $item['student_number']; ?></p>
                        <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
                        <p><?php echo $item['name']; ?></p>
                    </div>
                    <?php
                        if($item['is_approved'] === '0'){
                            echo "<a href='approvestudents.php?action=approve&id=" . $item['user_id'] . "'>approve</a>";
                        }else{
                            echo "<a style='background-color: red;' href='approvestudents.php?action=unapprove&id=" . $item['user_id'] . "'>un approve</a>";
                        }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php include './include/footer.php'; ?>