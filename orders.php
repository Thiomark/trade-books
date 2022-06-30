<?php include './include/header.php'; ?>
    <?php
        $orders = [];
        
        if(isset($_SESSION["user_id"])){
            //checking if the orders table exist if it does we fetch from it
            $istTblOrderAvailable = mysqli_query($conn, 'select 1 from `tblOrderLine` LIMIT 1');
    
            if($istTblOrderAvailable !== FALSE){
                $query = "SELECT * FROM tblOrderLine";
                $sql = $_SESSION["role"] == 'admin' ? $query . " left join tblUser u on u.user_id = tblOrderLine.user_id" : $query . " where user_id = " . $_SESSION["user_id"] . ";";
                $result = mysqli_query($conn, $sql);
                $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if(isset($_GET["action"]) && isset($_GET["id"]) && $_SESSION["role"] == 'admin'){
                    $order_id = $_GET["id"];

                    if($_GET["action"] == "delete") {
                        $deleteSql = "DELETE FROM tblOrderLine WHERE order_number = '$order_id';";
                        mysqli_query($conn, $deleteSql);

                        $orders = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);
                        
                        echo "<script>window.location = 'orders.php'</script>";
                    }
                }
            }
        }else{
            header('Location: ./index.php');
            exit();
        }
    ?>
    <main class="cont-center admin cart">
        <?php
            if($_SESSION["role"] == 'admin'){
                ?>
                    <nav>
                        <a href="admin.php">View All Books</a>
                        <div>|</div>
                        <a href="approvestudents.php">Approve Students</a>
                        <div>|</div>
                        <a href="orders.php">Orders</a>
                    </nav>
                <?php
            }
        ?>
        <table>
            <tr>
                <?php 
                    echo '<th width="20%">Order Number</th>';
                    if($_SESSION["role"] == 'admin'){
                        echo '<th width="25%">Date</th>';
                        echo '<th width="15%">Student Number</th>';
                    }else {
                        echo '<th width="40%">Date</th>';
                    }
                    echo '<th width="10%">Amount</th>';
                    echo '<th width="15%"></th>';
                    if($_SESSION["role"] == 'admin'){
                        echo '<th width="5%"></th>';
                    }
                ?>
            </tr>
            <?php foreach ($orders as $item): ?>
                <tr>
                    <td><?php echo $item["order_number"]; ?></td>
                    <td><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></td>
                    <?php 
                        if($_SESSION["role"] == 'admin'){
                            echo '<td>' . $item["student_number"] . '</td>';
                        }
                    ?>
                    <td>R <?php echo number_format($item["price"], 2); ?></td>
                    <td><?php echo $item["is_shipped"] == 1 ? 'Shipped' : 'Not Yet Shipped' ; ?></td>
                    <?php 
                        if($_SESSION["role"] == 'admin'){
                            echo '<td><a href="orders.php?action=delete&id=' . $item["order_number"] . '">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a></td>';
                        }
                    ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
<?php include './include/footer.php'; ?>