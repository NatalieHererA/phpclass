<?php
$page = isSet($pageName) ? $pageName : "";
$isHome = $page == "home" ? "selected" : "";
$isLoops = $page == "loops" ? "selected" : "";
$isCountdown = $page == "countdown" ? "selected" : "";
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
    </ul>
</nav>