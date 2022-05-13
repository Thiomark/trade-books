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
        ?>
        <form class="auth_form" method="POST" action="server_logic/auth.server.php"> 
            <h1>Create account</h1>
            <input type="text" value="admin2" required name="name" placeholder="Full name">
            <input type="text" value="admin2" required name="student_number" placeholder="Student number">
            <input type="text" value="admin2" required name="username" placeholder="Username">
            <input type="password" value="admin2" required name="password" placeholder="Password">
            <input type="password" value="admin2" required name="re_password" placeholder="Repeat password">
            <input type="password" value="admin321" name="admin_code" placeholder="admin code (skip if student)">
            <div>
                <p>Have an account? <a href="login.php">Login</a></p>
            </div>
            <input type="submit" name="register" value="sign up">
        </form>
    </main>
<?php include './include/footer.php'; ?>