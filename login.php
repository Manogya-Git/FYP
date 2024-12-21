<?php
include "db_connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    // Function to sanitize user input
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Sanitize inputs
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    // Check for empty fields
    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        // Use prepared statements to prevent SQL injection
        $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo "Hello, you are logged in!";
            } else {
                header("Location: index.php?error=Invalid Username or Password");
                exit();
            }
        } else {
            echo "SQL statement preparation failed!";
        }
    }
} else {
    header("Location: index.php?error");
    exit();
}
?>
