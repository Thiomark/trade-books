<?php include './include/header.php'; ?>
    <?php
        $id = (int) $_GET["id"];

        $sql = "SELECT * FROM tblBook WHERE book_id = $id;";
        $result = mysqli_query($conn, $sql);
        $book = mysqli_fetch_assoc($result);

    ?>
    <main class="cont-center product">
        <div>
            <img src="https://images.pexels.com/photos/5981927/pexels-photo-5981927.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" srcset="">
        </div>
        <div>
            <h1><?php echo $book['title']; ?></h1>
            <h2>R <?php echo $book['price']; ?></h2>
            <p><?php echo $book['description']; ?></p>
            <div class="buttons">
                <button>add to cart</button>
                <button>message privately</button>
            </div>
            <div class="tags">
                <p>isnb</p>
                <p><?php echo $book['isbn']; ?></p>
                <p>categories</p>
                <p><?php echo $book['category']; ?></p>
            </div>
        </div>        
    </main>
<?php include './include/footer.php'; ?>