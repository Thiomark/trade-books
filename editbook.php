<?php include './include/header.php'; ?>
    <?php
        if(isset($_GET['id']) && isset($_SESSION["user_id"]) && isset($_SESSION["role"])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tblBook WHERE book_id = $id;";
            $result = mysqli_query($conn, $sql);
            $book = mysqli_fetch_assoc($result);

            if(($_SESSION["user_id"] == $book["user_id"] || $_SESSION["role"] == 'admin')){
                if(isset($_POST['edit_book'])){
                    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $num_price = (int) $price;
                    $num_quantity = (int) $quantity;

                    $sql = "UPDATE tblBook SET description = '$description', title = '$title', isbn = '$isbn', category = '$category', price = $num_price, quantity = $num_quantity WHERE book_id = " . $book["book_id"] . ";";
                    
                    if(mysqli_query($conn, $sql)){
                        if($_SESSION["role"] == 'admin') {
                            echo "<script>window.location='admin.php?message=success'</script>";
                            exit();
                        }else{
                            echo "<script>window.location='index.php?message=success'</script>";
                            exit();
                        }
                    }
                    else{
                        echo "<script>window.location='index.php?error=invalid'</script>";
                        exit();
                    }
                }
            }
            else{
                echo "<script>window.location='index.php?error=invalid'</script>";
            }
        }
        else {
            echo "<script>window.location='index.php?error=invalid2'</script>";
            exit();
        }
    ?>
    <main class="add_book">
        <form method="POST" action="editbook.php?id=<?php echo $book['book_id'] ?>" enctype="multipart/form-data"> 
            <div class="item_1">
                <img style="height: 6em; width: auto; margin-right: 1em;" src="server_logic/uploaded_images/<?php echo $book['image'] ?>" alt="" srcset="">
                <input type="file" name="upload">
            </div>
            <label class="item_15" for="title">quantity</label>
            <input value="<?php echo $book['quantity'] ?>" required class="item_16" min="1" value="10" name="quantity" type="number">
            <label class="item_2" for="title">book title</label>
            <input value="<?php echo $book['title'] ?>" required class="item_4" name="title" type="text" >
            <label class="item_3" value="book2" for="isbn">book isbn</label>
            <input value="<?php echo $book['isbn'] ?>" required class="item_5" name="isbn" type="text" >
            <label class="item_6" for="description">description</label>
            <textarea required class="item_7" name="description"><?php echo $book['description'] ?></textarea>
            <label class="item_8" for="category">category</label>
            <input value="<?php echo $book['category'] ?>" required class="item_11" name="category" type="text" >
            <label class="item_9" for="price">price</label>
            <input value="<?php echo $book['price'] ?>" required class="item_12" name="price" type="text" >
            <input class="item_14" type="submit" name="edit_book" value="upload book" >
        </form>
    </main>
<?php include './include/footer.php'; ?>