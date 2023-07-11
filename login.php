<?php
    include "global\db_connect.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //check user name exist
        $sql = "SELECT * FROM user WHERE name = '$username'";
        $result = $conn->query($sql);

        //if exist check password
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['pwd'])) {
                //login
                session_start();
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                echo "Wrong password";
            }
        } else {
            echo "User not found";
        }        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="text" name="password" id="password">
        <input type="submit" value="login">
    </form>
</body>
</html>