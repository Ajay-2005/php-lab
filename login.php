<?php
session_start(); 
$con = pg_connect("host=localhost dbname=postgres user=postgres password=new_password");
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = [];
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE username=$1 AND password=$2";

    $result = pg_query_params($con, $query, array($user, $pass));

    if ($result) {
        if (pg_num_rows($result) > 0) {
            $_SESSION['username'] = $user; 
            echo "Welcome, " . htmlspecialchars($user) . "! You are logged in.";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        
        echo "Query failed: " . pg_last_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

if (isset($_SESSION['username'])) {
    echo "<p>Would you like to log out, " . htmlspecialchars($_SESSION['username']) . "!</p>";
    echo '<a href="?action=logout">Logout</a>'; 
} else {
?>

<form method="POST" action="">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
    <input type="submit" value="Login">
</form>

<?php
}
?>

</body>
</html>