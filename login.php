<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    .mmm{
        display: flex;
        height: 100vh;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    button {
        border: none;
        padding: 12px;
        background-color: red;
        color: white;
        border-radius: 5px;
        font-weight: bold;
    }

    a{
        text-decoration: none;
        color: #fff;
    }
    button{
        margin-top: 2rem;
        cursor: pointer;
        border: none;
        padding: 12px;
        background-color: red;
        color: white;
        border-radius: 5px;
        font-weight: bold;
    }
</style>

<body>
    <div class="mmm">
    <h2>Login Page:</h2>
    <form action="" method="post">
        <label for="" name="username_label">
            Username: <input type="text" name="uname" id="">
        </label>
        <br>
        <br>
        <label for="" name="password_label">
            Password: <input type="password" name="pass" id="">
        </label>
        <br><br>
        <button type="submit">Login</button>
    </form>
    <br><br>

    <button><a href="cover.php">Home</a></button>
    </div>
    <?php
    session_start();
    $db = new mysqli("localhost", "root", "", "login_database");
    // echo "Connected";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") { //true
        $username = $_POST["uname"];
        $password = $_POST["pass"];
        $result = mysqli_query($db, "SELECT * FROM idandpass2 WHERE uname = '$username' AND pass = '$password' ");

        $row = mysqli_fetch_assoc($result); //true //false 1 0

        if (mysqli_num_rows($result) > 0) { //0>0 //false
            if ($password == $row["pass"]) {
                $_SESSION["login"] = true;
                // $_SESSION["uname"] = $row["uname"];
                $_SESSION["uname"] = $username; 
                // echo "Hello $username";
                header("Location: cover.php");
            }
        } else {
            echo "User not found";
            header("Location: cover.php");   
        }
    }
    ?>
</body>

</html>