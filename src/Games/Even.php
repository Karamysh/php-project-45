<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function randomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function isEven(int $number)
{
    return ($number % 2) === 0;
}

function startEvenGame()
{
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $question = randomNumber();
        $questionsAndAnswers[$question] = (isEven($question) === true) ? 'yes' : 'no';
    }

    startPlay($questionsAndAnswers, CONDITION);
}
