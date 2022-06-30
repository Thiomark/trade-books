<?php include './include/header.php'; ?>
    
    <?php
        $books = [];

        if(isset($_SESSION["role"]) && $_SESSION['role'] == 'admin'){
            $sql = "SELECT title, image, quantity, book_id, price, student_number FROM tblBook left join tblUser on tblUser.user_id = tblBook.user_id;";
            $result = mysqli_query($conn, $sql);
            $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if(isset($_GET["action"])){
                $book_id = $_GET["id"];
                if($_GET["action"] == "edit"){
                    echo "<script>window.location = 'editbook.php?id=$book_id'</script>";
                }
                else if($_GET["action"] == "delete") {
                    $sql = "DELETE FROM tblBook WHERE book_id = $book_id;";
                    $result = mysqli_query($conn, $sql);
                    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
                    echo "<script>window.location = 'admin.php'</script>";
                }
                exit();
            }
        }else{
            echo '<script>window.location="login.php"</script>';
            exit();
        }
    ?>

    <main class="admin cart">
        <nav>
            <a href="admin.php">View All Books</a>
            <div>|</div>
            <a href="approvestudents.php">Approve Students</a>
            <div>|</div>
            <a href="orders.php">Orders</a>
        </nav>
        <table>
            <tr>
                <th width="5%">Image</th>
                <th width="10%">Book ID</th>
                <th width="20%">Title</th>
                <th width="20%">Student Number</th>
                <th width="10%">Quantity</th>
                <th width="10%">Price</th>
                <th width="25%"></th>
            </tr>
            <?php foreach ($books as $item): ?>
                <tr>
                    <td>
                        <img style="height: 3em; width: auto;" src="./server_logic/uploaded_images/<?php echo $item["image"]; ?>" alt="" srcset="">
                    </td>
                    <td><?php echo $item["book_id"]; ?></td>
                    <td><?php echo $item["title"]; ?></td>
                    <td><?php echo $item["student_number"]; ?></td>
                    <td><?php echo $item["quantity"]; ?></td>
                    <td>R <?php echo number_format($item["price"], 2); ?></td>
                    <td>
                        <div style="display: flex; gap: 1em;">
                            <a href="admin.php?action=edit&id=<?php echo $item["book_id"]; ?>" class="btn btn-success">
                                <span>Edit</span>
                            </a>
                            <a href="admin.php?action=delete&id=<?php echo $item["book_id"]; ?>" class="btn btn-error">
                                <span>Delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="addbook.php" class="btn btn-success" style="margin-top: 2em;">Add New Book</a>
    </main>
    
<?php include './include/footer.php'; ?>