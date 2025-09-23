<?php

    $roll1 = mt_rand(1, 6);
    $roll2 = mt_rand(1, 6);
    $roll3 = mt_rand(1, 6);
    $roll4 = mt_rand(1, 6);
    $roll5 = mt_rand(1, 6);

    $score1 = $roll1 + $roll2 ;
    $score2 = $roll3 + $roll4 + $roll5;

    if ($score1 > $score2){
       $result = "You Win!";
    }
    else if ($score2 > $score1){
        $result = "Computer Wins!";
    }
    else{
        $result = "Tie!";
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
        <h2>Your Score: <?=$score1?></h2>
        <img class="di" src="/images/dice_<?=$roll1?>.png" alt="dice 1">
        <img class="di" src="/images/dice_<?=$roll2?>.png" alt="dice 2">


        <h2>Computer Score: <?=$score2?></h2>
        <img class="di" src="/images/dice_<?=$roll3?>.png" alt="dice 3">
        <img class="di" src="/images/dice_<?=$roll4?>.png" alt="dice 4">
        <img class="di" src="/images/dice_<?=$roll5?>.png" alt="dice 5">

        <p><?=$result?></p>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>