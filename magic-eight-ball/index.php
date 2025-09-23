<?php
    session_start();

    $responses = [
            "Ask again later",
            "Don't bet on it",
            "Yes",
            "No",
            "Outlook good",
            "Outlook not so good",
            "Cannot predict now",
            "As I see it, yes",
            "Don't count on it",
            "You may rely on it",
            "Definitely",
            "Better not tell you now",
            "Very doubtful",
            "Without a doubt"

    ];

    $answer = "Ask me a question.";
    $question = trim($_POST['question'] ?? '');

    if ($question != '') {
        if (substr($question, -1) != '?') {
            $answer = "Question must end with a question mark!";
        }
        else if ($question == $_SESSION['question']){
            $answer = "You must ask a new question each time!";
        }
        else {
            $randomIndex = mt_rand(0, count($responses) - 1);
            $answer = $responses[$randomIndex];
            $_SESSION['question'] = $question; // save their question for next time
        }
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
        <h2>Magic 8 Ball</h2>
        <p class="answer"><?=$answer?></p>
        <form method="post">
            <label for="question">Question: </label>
            <input type="text" name="question" id="question" id="question" value="<?=$question?>">
            <input type="submit" value="Ask the Magic 8 Ball">
        </form>
    </main>
</div>
<?php
include "../includes/footer.php"
?>
</body>
</html>