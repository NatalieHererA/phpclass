<?php
    if(!empty($_GET["txtTitle"]) && !empty($_GET["txtRating"])) {

        $txtTitle = $_GET["txtTitle"];
        $txtRating = $_GET["txtRating"];
        $txtID = $_GET["txtID"];

        try {
            include "../includes/db.php";
            $con = getDBConnection();

            $query = "update movielist set MovieTitle = ?, MovieRating = ? where MovieID = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sss", $txtTitle, $txtRating, $txtID);
            mysqli_stmt_execute($stmt);

            header("Location:index.php");
        }
        catch (mysqli_sql_exception $ex){
            echo $ex;
        }
    }
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        include "../includes/db.php";
        $con = getDBConnection();

        $query = "select * FROM movielist where MovieID = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);

        $txtTitle = $row["MovieTitle"];
        $txtRating = $row["MovieRating"];

    }else{
        header ("Location:index.php");
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natalie's Website</title>

    <script type="text/javascript">
        function DeleteMovie(title, id){
            if (confirm("Are you sure you want to DELETE " + title + "?")){
                document.location.href = 'deleteMovie.php?id= ' + id;
            }
        }
    </script>
    <link rel="stylesheet" href="/css/base.css">

    <style>
        .grid-header{ grid-area:grid-header; }
        .movie-title{ grid-area:movie-title; }
        .title-input{ grid-area:title-input; }
        .movie-rating{ grid-area:movie-rating; }
        .rating-input{ grid-area:rating-input; }
        .grid-footer{ grid-area:grid-footer; }

        .grid-container {
            margin-top: 30px;
            display: grid;
            grid-template-areas:
                "grid-header grid-header"
                "movie-title title-input"
                "movie-rating rating-input"
                "grid-footer grid-footer";

            border: 1px solid black;

        }

        .grid-container > div {
            border: 1px solid black;
            text-align: center;
        }

        .grid-container input[type="text"] {
            width: 98%;
            margin: 2px 0;
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
        <form method="get">
            <div class="grid-container">

                <div class="grid-header">
                    <h3>Update Movie</h3>
                </div>

                <div class="movie-title">
                    <label for="txtTitle">Movie Title</label>
                </div>
                <div class="title-input">
                    <input type="text" name="txtTitle" id="txtTitle" value="<?=$txtTitle?>" />
                </div>

                <div class="movie-rating">
                    <label for="txtRating">Movie Rating</label>
                </div>
                <div class="rating-input">
                    <input type="text" name="txtRating" id="txtRating" value="<?=$txtRating?>" />
                </div>

                <div class="grid-footer">
                    <input type="submit" value="Update Movie" /> <input type="button" value="Delete Movie" onclick = "DeleteMovie('<?=$txtTitle?>','<?=$id?>')" />
                </div>

            </div>
            <input type="hidden" name="txtID" id="txtID" value="<?=$id?>" />
        </form>
    </main>
</div>
    <?php
        include "../includes/footer.php"
    ?>
</body>
</html>