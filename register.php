<?php include './include/header.php'; ?>
    <main>
        <form class="auth_form" action="POST">
            <h1>Create account</h1>
            <input type="text" placeholder="Full name">
            <input type="text" placeholder="Student number">
            <input type="text" placeholder="Username">
            <input type="password" placeholder="Password">
            <input type="password" placeholder="Repeat password">
            <div>
                <p>Have an account? <a href="login.php">Login</a></p>
            </div>
            <input type="submit" value="submit">
        </form>
    </main>
<?php include './include/footer.php'; ?>