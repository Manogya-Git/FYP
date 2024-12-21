<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>Login</h2>
        
        <label for="uname">User Name</label>
        <input type="text" id="uname" name="uname" placeholder="Enter your username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
        <button type="submit">Login</button>

        <div class="footer-text">
            Don't have an account? <a href="register.php">Register here</a>
        </div>
    </form>
</body>
</html>