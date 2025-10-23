<?php
    session_start();

    $ADMIN_ID = 3;
    if (isset($_SESSION['userID']) || $_SESSION['roleID'] != $ADMIN_ID) {
        header( "location: /login.php");
    }

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natalie's Website</title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="grid.css">
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
        <h3>Members Area</h3>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>
<?php
