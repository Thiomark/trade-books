<?php include './include/header.php'; ?>
    <?php 
        if(isset($_GET["action"])){
            if($_GET["action"] == "delete")
            {
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    if($values["id"] == $_GET["id"])
                    {
                        unset($_SESSION["shopping_cart"][$keys]);
                        // echo '<script>alert("Item Removed")</script>';
                        echo '<script>window.location="cart.php"</script>';
                    }
                }
            }
        }
    ?>
    <br />
    <div class="cont-center cart">
        <?php 
            if(isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"]) > 0){
                ?>
                <table>
                    <tr>
                        <th width="50%">Item Name</th>
                        <th width="20%">Price</th>
                        <th width="5%"></th>
                    </tr>
                    <?php
                        if(!empty($_SESSION["shopping_cart"])) {
                            $total = 0;
                            foreach($_SESSION["shopping_cart"] as $keys => $values) {
                                ?>
                                    <tr>
                                        <td style="text-transform: capitalize;"><?php echo $values["title"]; ?></td>
                                        <td>R <?php echo number_format($values["price"], 2); ?></td>
                                        <td>
                                            <a href="cart.php?action=delete&id=<?php echo $values["id"]; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                $total = $total + $values["price"];
                            }
                            ?>
                        <?php
                        }
                    ?>
                </table>
                <form style="margin-top: 2em;">
                    <h1>Cart</h1>
                    <div>
                        <p>Total</p>
                        <p>R <?php echo number_format($total, 2); ?></p>
                    </div>
                    <input type="submit" value="proceed to checkout">
                </form>
                <?php
            }else{
                ?>
                    <div class="empty_cart">
                        <img src="public/cart_empty.png" alt="image of empty cart" srcset="">
                        <h3 style="margin-top: 1em;">Your cart is empty</h3>
                        <p>Looks like you have not added anything to your cart.</p>
                        <a href="index.php">Go back to shopping</a>
                    </div>
                <?php
            }
        ?>
    </div>
<?php include './include/footer.php'; ?>