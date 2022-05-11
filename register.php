<?php include './include/header.php'; ?>
    <main>
        <form class="auth_form" method="POST" action="server_logic/auth.server.php"> 
            <h1>Create account</h1>
            <input type="text" required name="name" placeholder="Full name">
            <input type="text" required name="student_number" placeholder="Student number">
            <input type="text" required name="username" placeholder="Username">
            <input type="password" required name="password" placeholder="Password">
            <input type="password" required name="re_password" placeholder="Repeat password">
            <div>
                <p>Have an account? <a href="login.php">Login</a></p>
            </div>
            <input type="submit" name="register" value="sign up">
        </form>
    </main>
<?php include './include/footer.php'; ?>