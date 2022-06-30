<?php include './include/header.php'; ?>
<?php
    $books = [];

    //checking if the books table exist if it does we fetch from it
    $istTblBookAvailable = mysqli_query($conn, 'select 1 from `tblBook` LIMIT 1');

    if($istTblBookAvailable !== FALSE){
        $sql = "SELECT * FROM tblBook;";
        $result = mysqli_query($conn, $sql);
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
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
        else if($_GET["error"] == "bookNotAdded") {
            echo "<div class=\"error\"><p>Book not added try again later...</p></div>";
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
    <?php
        if(isset($_SESSION["user_id"])){
            $id = $_SESSION["user_id"];
            $sql = "SELECT * FROM tblUser WHERE user_id = $id";
            $result = mysqli_query($conn, $sql);

            $user = mysqli_fetch_assoc($result);

            echo "<div class=\"user_info\">";
            echo "<p><span>Username: </span>: " . $user['username'] . "</p>";
            echo "<p><span>Role: </span>: " . $user['role'] . "</p>";
            echo "<p><span>Name: </span>: " . $user['name'] . "</p>";
            echo $user['is_approved'] == 1 ? "<p><span>Approved: </span>YES</p>" : "<p><span>Approved: </span>No</p>";
            echo "</div>";
        }
    ?>
    <?php foreach ($books as $item): ?>
        <form id="product-form" action="product.php?id=<?= $item['book_id']; ?>" method="POST" class="book_card books">
            <img src="./server_logic/uploaded_images/<?= $item['image']; ?>" alt="" srcset="">
            <div>
                <h4><?= $item['title']; ?></h4>
                <p>R <?php echo $item['price']; ?></p>
                <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
            </div>
        </form>
    <?php endforeach; ?>
</main>
<?php include './include/footer.php'; ?>

<script type="text/JavaScript">

    const books = document.querySelectorAll(".books");

    books.forEach(book => {
        book?.addEventListener("click", (event) => {
            event.stopPropagation();
            book.submit();
        });
    });

</script>
