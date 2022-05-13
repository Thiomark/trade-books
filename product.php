<?php include './include/header.php'; ?>
    <?php
        $id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id = (int) $_GET["id"];
       
        $sql = "SELECT * FROM tblBook WHERE book_id = $id;";
        $result = mysqli_query($conn, $sql);
        $book = mysqli_fetch_assoc($result);
    ?>
    <main class="cont-center product">
        <div>
            <img src="https://images.pexels.com/photos/448835/pexels-photo-448835.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
        </div>
        <div>
            <h1><?php echo $book['title']; ?></h1>
            <h2>R <?php echo $book['price']; ?></h2>
            <p><?php echo $book['description']; ?></p>
            <form method="POST" action="" class="buttons">
                <input type="hidden" value="<?php echo $book['book_id'] ?>" name="book_id" />
                <input name="addToCart" type="submit" value="add to cart">
                <input name="messagePrivately" type="submit" value="message privately">
            </form>
            <div class="tags">
                <p>isnb</p>
                <p><?php echo $book['isbn']; ?></p>
                <p>categories</p>
                <p><?php echo $book['category']; ?></p>
            </div>
        </div>        
    </main>
<?php include './include/footer.php'; ?>