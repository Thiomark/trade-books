<?php include './include/header.php'; ?>
    <main class="cards_wrapper">
        <div class="book_card">
            <img src="https://images.pexels.com/photos/11431628/pexels-photo-11431628.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" srcset="">
            <div>
                <h1>Database</h1>
                <p>R 3000.00</p>
                <p>by <strong>Itumeleng Tsoela</strong></p>
                <p>uploaded on <strong>21 May 2020</strong></p>
            </div>
        </div>
        <div class="book_card">
            <img src="https://images.pexels.com/photos/11431628/pexels-photo-11431628.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" srcset="">
            <div>
                <h1>Java</h1>
                <p>R 200.00</p>
                <p>by <strong>John Doe</strong></p>
                <p>uploaded on <strong>21 May 2020</strong></p>
            </div>
        </div>
    </main>
<?php include './include/footer.php'; ?>

<script type="text/JavaScript">
    const productItem = document.querySelector(".book_card");
    productItem?.addEventListener("click", () => {
        window.location.href = "product.php";
    });

</script>