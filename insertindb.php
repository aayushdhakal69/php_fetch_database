<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="">Name:</label>
        <input type="text" name="name">
        <label for="">Address:</label>
        <input type="text" name="address">
        <br><br>
        <input type="submit" name="" id="">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $conn = new mysqli("localhost", "root", "", "company");

        if ($conn->connect_error) {
            die("Error connecting to" . $conn->connect_error);
        }
        // $result = mysqli_query($conn, "INSERT INTO man(name,address) VALUES('$name','$address'");
        $result = mysqli_query($conn,"insert into man (name,address) VALUES ('$name','$address')");

        if($result){
            echo "Success!";
        }
        else{
            echo "Error";
        }
    }
    ?>
</body>

</html>