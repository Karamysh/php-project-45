<?php

namespace BrainGames\src\Engine;

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
        if ($answer == $rightAnswer) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");
            return line("Let's try again, %s!", $namePlayer);
        }
    }
    line("Congratulations, %s!", $namePlayer);
}
