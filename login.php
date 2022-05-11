<?php include './include/header.php'; ?>
    <main>
        <form class="auth_form" method="POST" action="server_logic/auth.server.php"> 
            <h1>Login</h1>
            <input type="text" required name="username" placeholder="Username">
            <input type="password" required name="password" placeholder="Password">
            <div>
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
            <input type="submit" name="login" value="sign in">
        </form>
    </main>
<?php include './include/footer.php'; ?>