<?php

$isHome = $_SERVER['REQUEST_URI'] == '/' ? 'selected' : '';
$isLoops = $_SERVER['REQUEST_URI'] == '/loops/' ? 'selected' : '';
$isCountdown = $_SERVER['REQUEST_URI'] == '/countdown/' ? 'selected' : '';
$isMagic8Ball = $_SERVER['REQUEST_URI'] == '/magic-eight-ball/' ? 'selected' : '';
$isDiceGame = $_SERVER['REQUEST_URI'] == '/Dice/' ? 'selected' : '';
?>
<nav>
    <ul>
        <li class="<?=$isHome?>">
            <a href="/">Home</a>
        </li>
        <li class="<?=$isLoops?>">
            <a href="/loops">Loops</a>
        </li>
        <li class="<?=$isCountdown?>">
            <a href="/countdown">Countdown</a>
        </li>
        <li class="<?=$isMagic8Ball?>">
            <a href="/magic-eight-ball">Magic 8 Ball</a>
        </li>
        <li class="<?=$isDiceGame?>">
            <a href="/Dice">Dice Game</a>
        </li>
    </ul>
</nav>