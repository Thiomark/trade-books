<?php
    // Set vars to empty values
    // $name = $email = $body = '';
    // $nameErr = $emailErr = $bodyErr = '';

    // Form submit
    if (isset($_POST['submit'])) {
        //echo "Form submitted!!";
    }else {
        //echo "Form not submitted!!";
    }
?>

<?php include './include/header.php'; ?>
    <main>
        <form class="auth_form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"> 
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <div>
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
            <input type="submit" value="submit">
        </form>
    </main>
<?php include './include/footer.php'; ?>