<?php include './include/header.php'; ?>
    <main class="add_book">
        <form method="POST" action="server_logic/addbook.server.php" enctype="multipart/form-data"> 
            <div class="item_1">
                <input required type="file" name="upload">
            </div>
            <label class="item_2" for="title">book title</label>
            <input value="something" required class="item_4" name="title" type="text" >
            <label class="item_3" value="book2" for="isbn">book isbn</label>
            <input value="something" required class="item_5" name="isbn" type="text" >
            <label class="item_6" for="description">description</label>
            <textarea required class="item_7" name="description">About something!</textarea>
            <label class="item_8" for="category">category</label>
            <input value="something" required class="item_11" name="category" type="text" >
            <label class="item_9" for="price">price</label>
            <input value="1000" required class="item_12" name="price" type="text" >
            <label class="item_10" for="shippingPrice">shipping price</label>
            <input value="10" required class="item_13" for="shippingPrice" type="text" >
            <input class="item_14" type="submit" name="submit" value="upload book" >
        </form>
    </main>
<?php include './include/footer.php'; ?>