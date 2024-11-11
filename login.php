<?php

// Display the login form
echo "<h2>Login</h2>";
echo "<form action='' method='POST'>";
echo "Username: <input type='text' name='username'><br>";
echo "Password: <input type='password' name='password'><br>";
echo "<input type='submit' name='login' value='Login'>";
echo "</form>";

if (isset($_POST['login'])) {
    include("admin/connect.php");
    // Handle the login form submission
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username = '".$username."' and password = '".$password."'";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_array($result))
    {
        if($rows['username'] == $username and $rows['password'] == $password)
        {
            echo "Welcome to the screen";
            echo "<br><br>";
        }
        else
        {
            echo "sorry wrong information provided";
            echo "<br><br>";
    }
 }

    // Redirect to the home page
    header("Location: home.php");
    exit();
}
?>
