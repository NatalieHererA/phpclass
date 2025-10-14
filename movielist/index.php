<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natalie's Website</title>
    <link rel="stylesheet" href="/css/base.css">
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 80%;
            margin: 10px auto;
            table-layout: fixed;
        }
        th, td {
            border: 1px solid black;
            padding: .2rem;
        }
    </style>
</head>
<body>
<?php
include "../includes/header.php"
?>
<div id="three-column">
    <?php
    include "../includes/navigation.php"
    ?>
    <main>
        <h2>My Movie List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Rating</th>
            </tr>

<?php
        include "../includes/db.php";
        $con = getDBConnection();
        $result = mysqli_query($con,"SELECT * FROM movielist");

        while($row = mysqli_fetch_array($result)) {

            $movieID = $row["MovieID"];
            $movieTitle = $row["MovieTitle"];
            $movieRating = $row["MovieRating"];

            echo "<tr>";
            echo "<td><a href='updateMovie.php?id=$movieID'>$movieID</a></td>";
            echo "<td><a href='updateMovie.php?id=$movieID'>$movieTitle</a></td>";
            echo "<td>$movieRating</td>";
            echo "</tr>";

        }
?>
        </table>
        <a href="addMovie.php">Add a new movie</a>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>
