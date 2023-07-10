<?php

namespace BrainGames\src\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\src\Engine\startPlay;

use const BrainGames\src\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function randomNumbers()
{
    $minNumber = 2;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function isEven(int $number)
{
    if (($number % 2) === 0) {
        return true;
    } else {
        return false;
    }
}

function startEvenGame()
{
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $question = randomNumbers();
        if (isEven($question) === true) {
            $questionsAndAnswers[$question] = 'yes';
        } else {
            $questionsAndAnswers[$question] = 'no';
        }
    }

    startPlay($questionsAndAnswers, CONDITION);
}
