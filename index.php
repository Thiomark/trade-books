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
    if (isset($_POST['addToCart'])) {     
        // $msg = "product";
        // echo "<script type='text/javascript'>alert('$msg');</script>";

        if(isset($_SESSION["shopping_cart"])){
            $item_array_id = array_column($_SESSION["shopping_cart"], "id");

            if(!in_array($_GET["id"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'id' => $_GET["id"],
                    'price' => $_POST["hidden_price"],
                    'title' => $_POST["hidden_title"],
                    'image' => $_POST["hidden_image"],
                    'shipping_price' => $_POST["hidden_shipping_price"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            }
            // else {
            //     foreach($_SESSION["shopping_cart"] as $keys => $values){
            //         if($values["id"] == $_GET["id"])
            //         {
            //             unset($_SESSION["shopping_cart"][$keys]);
            //             echo '<script>alert("Item Removed")</script>';
            //             echo '<script>window.location="index.php"</script>';
            //         }
            //     }
            // }
        }else{
            $item_array = array(
                'id' => $_GET["id"],
                'price' => $_POST["hidden_price"],
                'title' => $_POST["hidden_title"],
                'image' => $_POST["hidden_image"],
                'shipping_price' => $_POST["hidden_shipping_price"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
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
            $sql = "SELECT * FROM tblUser WHERE user_id = 1";
            $result = mysqli_query($conn, $sql);

            $user = mysqli_fetch_assoc($result);

            echo "<div class=\"user_info\">";
            echo "<p><span>Username: </span>: " . $user['username'] . "</p>";
            echo "<p><span>Role: </span>: " . $user['role'] . "</p>";
            echo "<p><span>Name: </span>: " . $user['name'] . "</p>";
            echo $user['is_approved'] == true ? "<p><span>Approved: </span>YES</p>" : "<p><span>Approved: </span>No</p>";
            echo "</div>";
        }
    ?>
    <?php foreach ($books as $item): ?>
        <form action="index.php?action=add&id=<?= $item['book_id']; ?>" method="POST" class="book_card">
            <img src="./server_logic/uploaded_images/<?= $item['image']; ?>" alt="" srcset="">
            <div>
                <input type="hidden" name="hidden_title" value="<?php echo $item['title']; ?>" />
                <input type="hidden" name="hidden_image" value="<?php echo $item['image']; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $item['price']; ?>" />
                <input type="hidden" name="hidden_shipping_price" value="<?php echo $item['shipping_price']; ?>" />
                <input type="submit" name="addToCart" value="add to cart">
            </div>
            <div>
                <a href="product.php?id=<?= $item['book_id']; ?>"><?= $item['title']; ?></a>
                <p>R <?php echo $item['price']; ?></p>
                <p><?php echo date_format(date_create($item['created_on']), 'g:ia \o\n l jS F Y'); ?></p>
            </div>
        </form>
    <?php endforeach; ?>
</main>
<?php include './include/footer.php'; ?>

<script type="text/JavaScript">
    const productItem = document.querySelector(".books");
    productItem?.addEventListener("click", () => {
        window.location.href = "index.php";
    });

</script>
