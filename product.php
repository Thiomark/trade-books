<?php include './include/header.php'; ?>
    <?php
        if($_GET["id"]) {
            $id = filter_input(INPUT_POST, 'book_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id = (int) $_GET["id"];
           
            $sql = "SELECT * FROM tblBook WHERE book_id = $id;";
            $result = mysqli_query($conn, $sql);
            $book = mysqli_fetch_assoc($result);
            
            if (isset($_POST['addToCart'])) {     

                if(isset($_SESSION["shopping_cart"])){
                    $item_array_id = array_column($_SESSION["shopping_cart"], "id");
        
                    if(!in_array($_GET["id"], $item_array_id)){
                        $count = count($_SESSION["shopping_cart"]);
                        $item_array = array(
                            'id' => $_GET["id"],
                            'price' => $_POST["hidden_price"],
                            'title' => $_POST["hidden_title"],
                            'image' => $_POST["hidden_image"],
                            'quantity' => $_POST["quantity"]
                        );
                        $_SESSION["shopping_cart"][$count] = $item_array;
                    }
                    else {
                        foreach($_SESSION["shopping_cart"] as $keys => $values){
                            if($values["id"] == $_GET["id"]){
                                unset($_SESSION["shopping_cart"][$keys]);

                                $count = count($_SESSION["shopping_cart"]);
                                $item_array = array(
                                    'id' => $_GET["id"],
                                    'price' => $values["price"],
                                    'title' => $values["title"],
                                    'image' => $values["image"],
                                    'quantity' => $values["quantity"] + 1
                                );
                                $_SESSION["shopping_cart"][$count] = $item_array;
                            }
                        }
                    }

                    $currentBook = 'product.php?id=' . $_GET['id'];
                    echo "<script>window.location='$currentBook'</script>";
                }else{
                    $item_array = array(
                        'id' => $_GET["id"],
                        'price' => $_POST["hidden_price"],
                        'title' => $_POST["hidden_title"],
                        'image' => $_POST["hidden_image"],
                        'quantity' => $_POST["quantity"]
                    );
                    $_SESSION["shopping_cart"][0] = $item_array;
                }

                $currentBook = 'product.php?id=' . $_GET['id'];
                echo "<script>window.location='$currentBook'</script>";
            }  
        }

    ?>
    <main class="cont-center product">
        <div>
            <img src="server_logic/uploaded_images/<?= $book['image']; ?>" alt="" srcset="">
        </div>
        <div>
            <h1><?php echo $book['title']; ?></h1>
            <h2>R <?php echo $book['price']; ?></h2>
            <p><?php echo $book['description']; ?></p>
            <form method="POST" action="product.php?id=<?php echo $book['book_id'];?>" class="buttons">
    
                <input type="hidden" name="hidden_title" value="<?php echo $book['title']; ?>" />
                <input type="hidden" name="hidden_image" value="<?php echo $book['image']; ?>" />
                <input type="hidden" name="hidden_price" value="<?php echo $book['price']; ?>" />
                <input type="hidden" name="hidden_shipping_price" value="<?php echo $book['shipping_price']; ?>" />
                <input type="submit" name="addToCart" value="add to cart">
                <?php 
                    if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"]) > 0){
                        ?>
                            <a href="server_logic/checkout.server.php" class='checkout-btn'>proceed to checkout</a>
                        <?php
                    }else {
                        echo '<input name="quantity" min="1" value="1" type="number">';
                    }
                ?>
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