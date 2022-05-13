<?php include './include/header.php'; ?>
    <?php
        $sql = "SELECT * FROM tblUser WHERE role = 'student' AND is_approved = 0";
        $result = mysqli_query($conn, $sql);
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <div class="approve">
        <?php if (empty($students)): ?>
            <div class="message">
                <p>There is no students to approve</p>
            </div>
        <?php endif; ?>
        <ul>
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
    </div>
<?php include './include/footer.php'; ?>