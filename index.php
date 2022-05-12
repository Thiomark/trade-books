<?php include './include/header.php'; ?>
    <?php
        $sql = "SELECT * FROM tblBook;";
        $result = mysqli_query($conn, $sql);
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
    <?php 
        if(isset($_GET["message"])) {
            if($_GET["message"] == "bookAdded") {
                echo "<div class=\"success\"><p>Book added successfully!</p></div>";
            }
        }
        else if(isset($_GET["error"])) {
            if($_GET["error"] == "notApproved") {
                echo "<div class=\"error\"><p>Book not added, not yet approved!</p></div>";
            }
        }; 
    ?>
    <?php if (empty($books)): ?>
        <div class="no_books cont-center">
            <p>No results found.</p>
            <p>You can login or create an acount, get approval from the librarian to upload/sell textbooks</p>
        </div>
    <?php endif; ?>
    <main class="cards_wrapper">
        <?php foreach ($books as $item): ?>
            <div class="book_card">
                <img src="https://images.pexels.com/photos/448835/pexels-photo-448835.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" srcset="">
                <div>
                    <a href="product.php?id=<?= $item['book_id']; ?>"><?= $item['title']; ?></a>
                    <p>R <?php echo $item['price']; ?></p>
                    <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </main>
<?php include './include/footer.php'; ?>

<script type="text/JavaScript">
    const productItem = document.querySelector(".books");
    productItem?.addEventListener("click", () => {
        window.location.href = "index.php";
    });

</script>
