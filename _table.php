<table id="songTable">
    <thead>
        <tr>
            <th>Song</th>
            <th>Artist</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        // Query to retrieve song data from the database
        include "global\db_connect.php";
        $query = "SELECT * FROM song";
        $result = mysqli_query($conn, $query);

        // Check if any records were returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of data
            while ($song = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $song['song'] ?></td>
                    <td><?= $song['artist'] ?></td>
                    <td><?= $song['rating'] ?></td>
                    <td>
                        <a href="edit.php?id=<?=$song['id'];?>">Edit</a>
                        <a href="delete.php?id=<?=$song['id'];?>&confirm=no">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4'>No records found.</td></tr>";
        }
        ?>

    </tbody>
</table>