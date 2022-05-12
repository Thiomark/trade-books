<?php include './include/header.php'; ?>
    <main>
        <?php 
            if(isset($_GET["error"])) {
                if($_GET["error"] == "passwordDoNotMatch") {
                    echo "<div class=\"error\"><p>Passwords should match</p></div>";
                }
                else if($_GET["error"] == "userAlreadyExist") {
                    echo "<div class=\"error\"><p>user already exist</p></div>";
                }
                else if($_GET["error"] == "unknownError") {
                    echo "<div class=\"error\"><p>Please try again later</p></div>";
                }
                else if($_GET["error"] == "notAuthorized") {
                    echo "<div class=\"error\"><p>Not Authorized</p></div>";
                }
                else if($_GET["error"] == "invalidCredentials") {
                    echo "<div class=\"error\"><p>Invalid Credentials</p></div>";
                }
            }; 
            if(isset($_GET["message"])) {
                if($_GET["message"] == "success") {
                    echo "<div class=\"success\"><p>Account created successfully</p></div>";
                }
            }; 
        ?>
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