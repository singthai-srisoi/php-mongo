<?php
include "global\db_connect.php";

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from post
    $id = $_POST['id'];
    $song = $_POST['song'];
    $artist = $_POST['artist'];
    $rating = $_POST['rating'];

    // Update song
    $query = "UPDATE song SET song = '$song', artist = '$artist', rating = $rating WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to index or any other desired page
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating song: " . mysqli_error($conn);
    }
}

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "No ID provided.";
    exit;
}

// Get the ID from the POST data
$id = $_GET['id'];

// Retrieve the song data from the database
$query = "SELECT * FROM song WHERE id = $id";
$result = mysqli_query($conn, $query);

// Check if a song was found with the given ID
if (mysqli_num_rows($result) == 0) {
    echo "No song found with ID: " . $id;
    exit;
}

// Fetch the song data
$song = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="" method="post">
        <label for="song">Song</label>
        <input type="text" name="song" id="song" value="<?= $song['song']; ?>">
        <label for="artist">Artist</label>
        <input type="text" name="artist" id="artist" value="<?= $song['artist']; ?>">
        <label for="rating">Rating</label>
        <input type="number" name="rating" id="rating" value="<?= $song['rating']; ?>">
        <input type="hidden" name="id" value="<?= $song['id']; ?>">
        <input type="submit" value="Submit">
    </form>
</body>
</html>
