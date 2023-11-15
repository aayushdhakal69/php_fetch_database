<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    ul {
        list-style: none;
        background-color: violet;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        display: flex;
        gap: 40px;
        font-size: 25px;
        font-weight: bold;
    }

    ul li {
        padding: 20px;
    }

    ul li a {
        text-decoration: none;
        color: black;
        transition: all ease .5s;
    }

    ul li a:hover {
        color: white;
    }

    h1 {
        color: red;
    }

    .cont {
        height: 80vh;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        justify-content: center;
        align-items: center;
    }

    h2 {
        color: crimson;
    }
</style>

<body>
    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Signup</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="cont">
        <?php
        session_start();
        $db = new mysqli("localhost", "root", "", "login_database");

        if (!empty($_SESSION["uname"])) {
            $uname = $_SESSION["uname"]; //safety
            // $pass = $_SESSION["pass"];
            $result = mysqli_query($db, "SELECT * FROM idandpass2 WHERE uname = '$uname' ");
            // $row = mysqli_fetch_assoc($result); //true //false
            echo "<h1>Welcome! $uname You are logged in</h1>";
        } else {
            // header("Location: login.php");
            echo "<h1>You are not logged in</h1>";
            echo "<h2>Sign up if you dont have account</h2>";
        }
        ?>

    </div>


</body>


</html>