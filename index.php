<?php
    $pageName = "home";
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Natalie's Website</title>
    <link rel="stylesheet" href="/css/base.css">
</head>
<body>
<?php
    include "includes/header.php"
?>

<div id="three-column">
    <?php
        include "includes/navigation.php"
    ?>

    <main>
        <img src="images/thumbnail_image1.jpg">
        <p> I enjoy brainstorming ideas involving web design and computer software.
        <br /><br />
        I'm always fascinated with computers even since I was little. My goal is to create a social media platform for everyone to have a safe place to share and post their contents on par with Facebook and Instagram without any problems. </p>
    </main>
</div>
    <?php
        include "includes/footer.php"
    ?>
</body>
</html>