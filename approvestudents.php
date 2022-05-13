<?php include './include/header.php'; ?>
    <?php
        // Fetching all the unapproved students
        $sql = "SELECT * FROM tblUser WHERE role = 'student' AND is_approved = 0";
        $result = mysqli_query($conn, $sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <?php
        // Fetching all students
        $sql2 = "SELECT * FROM tblUser WHERE role = 'student'";
        $result2 = mysqli_query($conn, $sql2);
        $allstudents = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    ?>
    <div class="approve">
        <?php if (empty($students)): ?>
            <div class="message">
                <p>There is no students to approve</p>
            </div>
        <?php endif; ?>
        <ul>
            <h3>Students not approved</h3>
            <?php foreach ($students as $item): ?>
                <li>
                    <div class="left">
                        <p><?php echo $item['student_number']; ?></p>
                        <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
                        <p><?php echo $item['name']; ?></p>
                    </div>
                    <?php echo "<a href='server_logic/approve_student.server.php?approve=".$item['user_id']."'>approve</a>"; ?> 
                </li>
            <?php endforeach; ?>
        </ul>
        <ul>
            <h3>All Students</h3>
            <?php foreach ($allstudents as $item): ?>
                <li>
                    <div class="left">
                        <p><?php echo $item['student_number']; ?></p>
                        <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
                        <p><?php echo $item['name']; ?></p>
                    </div>
                    <?php
                        if($item['is_approved'] === '0'){
                            echo "<a href='server_logic/approve_student.server.php?approve=".$item['user_id']."'>approve</a>";
                        }else{
                            echo "<a href='#' style='background-color: red;'>un approve</a>";
                        }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php include './include/footer.php'; ?>