<?php include './include/header.php'; ?>
    <main class="add_book">
        <form action="">
            <div class="item_1">
                <div>
                    <img src="https://images.pexels.com/photos/5981927/pexels-photo-5981927.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" srcset="">
                </div>
                <button>add image</button>
            </div>
            <label class="item_2" for="title">book title</label>
            <input class="item_4" type="text" >
            <label class="item_3" for="isbn">book isbn</label>
            <input class="item_5" type="text" >
            <label class="item_6" for="description">description</label>
            <textarea class="item_7" name="description"></textarea>
            <label class="item_8" for="category">category</label>
            <input class="item_11" name="category" type="text" >
            <label class="item_9" for="price">price</label>
            <input class="item_12" name="price" type="text" >
            <label class="item_10" for="shippingPrice">shipping price</label>
            <input class="item_13" for="shippingPrice" type="text" >
            <input class="item_14" type="submit" value="upload book" >
        </form>
    </main>
<?php include './include/footer.php'; ?>