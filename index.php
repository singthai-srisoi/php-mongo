<?php 
include "global\db_connect.php";
//check if session not set header to login
session_start();
if (!isset($_SESSION['username'])) {
    //header("Location: login.php");
}

//form post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $song = $_POST['song'];
    $artist = $_POST['artist'];
    $rating = $_POST['rating'];

    //insert into database
    $sql = "INSERT INTO song (song, artist, rating) VALUES ('$song', '$artist', '$rating')";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <title>Song Rating</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 3px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Song Rating</h1>
    <form action="index.php" method="post">
        <label for="song">Song</label>
        <input type="text" name="song" id="song">
        <label for="artist">Artist</label>
        <input type="text" name="artist" id="artist">
        <label for="rating">Rating</label>
        <input type="number" name="rating" id="rating">
        <input type="submit" value="Submit">
    </form>
    <?php include "_table.php"; ?>
    <script>
        $(document).ready( function () {
            $('#songTable').DataTable();
        } );
    </script>
</body>
</html>