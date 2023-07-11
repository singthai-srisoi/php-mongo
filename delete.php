<?php
//get id
$id = $_GET['id'];
//confirm delete
echo "<p>Are you sure you want to delete this song?</p>";
echo "<a href='index.php'>No, go back</a> ";
echo "<a href='delete.php?id=$id&confirm=yes'>Yes, delete</a>";
//if yes, delete
if ($_GET['confirm'] == 'yes') {
    //delete from db
    include "global\db_connect.php";
    $query = "DELETE FROM song WHERE id = $id";
    $result = mysqli_query($conn, $query);
    //redirect to index
    header("Location: index.php");
}
?>