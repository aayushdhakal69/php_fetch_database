<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<style>
    #submit {
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
    <h2>Signup Page:</h2>
    <form action="" method="post" autocomplete="off">
        <label for="" name="username_label">
            Username: <input type="text" name="uname" id="uname">
        </label>
        <br>
        <br>
        <label for="" name="password_label">
            Password: <input type="password" name="pass" id="pass">
        </label>
        <br>
        <br>
        <label for="" name="password_confirm_label">
            Confirm Password: <input type="password" name="password_confirm" id="password_confirm">
        </label>
        <br><br>
        <input type="submit" name="submit" id="submit">
    </form>
    <br><br>
    <?php
    session_start();
    // Connect to the database
    $db = new mysqli("localhost", "root", "", "login_database");

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Get the form data
        $username = $_POST["uname"];
        $password = $_POST["pass"];
        $password_confirm = $_POST["password_confirm"];
        $dupilicate = mysqli_query($db, "SELECT * FROM idandpass2 WHERE uname = '$username' OR pass = '$password' ");

        // Check if the passwords match
        if ($password != $password_confirm) {
            echo "Passwords do not match.";
        } else if (mysqli_num_rows($dupilicate) > 0) {
            echo
                "<script> alert('Username is already taken');</script>";
        } else {

            // Insert the user data into the database
            $sql = "INSERT INTO idandpass2 (uname, pass) VALUES ('$username', '$password')";
            $result = $db->query($sql); //true or false

            if ($result) {
                echo "You have been registered successfully.";
            } else {
                echo "There was an error registering you.";
            }
        }
    }
    ?>

</body>

</html>