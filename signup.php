<?php
include("admin/connect.php");
// Handle form submission
if (isset($_POST["signup"]) && $_POST["signup"] != "") {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate input
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Check if user already exists
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        
        if ($result->num_rows > 0) {
            echo "User already exists.";
        } else {
            // Insert new user into the database
            $query = "INSERT INTO admin (name, username, password) VALUES ('$name', '$username', '$password')";
            if (mysqli_query($conn, $query) == TRUE) {
                echo "Registration successful.";
            } 
        }
    }
    // Redirect to the login page
header("Location: login.php");
exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>

    <form method="POST" action="signup.php">
        <label>Full Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>

        <input type="submit" name = "signup" value="Sign Up">
    </form>
</body>
</html>
