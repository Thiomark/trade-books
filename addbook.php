<?php include './include/header.php'; ?>
    <main class="add_book">
        <form method="POST" action="server_logic/addbook.server.php"> 
            <div class="item_1">
                <div>
                    <img src="https://images.pexels.com/photos/5981927/pexels-photo-5981927.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" srcset="">
                </div>
                <button>add image</button>
            </div>
            <label class="item_2" for="title">book title</label>
            <input required class="item_4" name="title" value="The Maze Runner" type="text" >
            <label class="item_3" for="isbn">book isbn</label>
            <input required class="item_5" name="isbn" value="1234" type="text" >
            <label class="item_6" for="description">description</label>
            <textarea required class="item_7" name="description">book still in good condition</textarea>
            <label class="item_8" for="category">category</label>
            <input required class="item_11" name="category" value="programming" type="text" >
            <label class="item_9" for="price">price</label>
            <input required class="item_12" name="price" value="1000" type="text" >
            <label class="item_10" for="shippingPrice">shipping price</label>
            <input required class="item_13" for="shippingPrice" value="2" type="text" >
            <input class="item_14" type="submit" name="submit" value="upload book" >
        </form>
    </main>
<?php include './include/footer.php'; ?>