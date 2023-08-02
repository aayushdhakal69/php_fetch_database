

<?php
session_start();
$db = new mysqli("localhost", "root", "", "login_database");

if (!empty($_SESSION["uname"])) {
    $uname = $_SESSION["uname"];
    // $pass = $_SESSION["pass"];
    $result = mysqli_query($db, "SELECT * FROM idandpass2 WHERE uname = '$uname' ");
    $row = mysqli_fetch_assoc($result);

    echo "You are logged in";
} else {
    // header("Location: login.php");
    echo "You are not logged in";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<style>
    .links a {
        display: flex;
        flex-direction: column;
        margin-bottom: 3rem;
        text-decoration: none;
        color: red;
        font-size: 30px;
    }
</style>

<body>
    <h1>This is index Page</h1>

    <div class="links">
        Login Here: <a href="login.php">Login</a>
        Signup Here:<a href="signup.php">Signup</a>
        Logout:<a href="logout.php">Logout</a>
    </div>
</body>


</html>