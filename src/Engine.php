<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function startPlay(array $questionsAndAnswers, string $condition)
{
    line('Welcome to the Brain Games!');
    $namePlayer = prompt('May I have your name?');
    line("Hello, %s!", $namePlayer);
    line($condition);
    foreach ($questionsAndAnswers as $question => $rightAnswer) {
        line("Question: %s!", $question);
        $answer = prompt('Your answer');
        if ($answer != $rightAnswer) {
            line("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");
            line("Let's try again, %s!", $namePlayer);
            return;
        }
        line('Correct!');
    }
    line("Congratulations, %s!", $namePlayer);
    return;
}
