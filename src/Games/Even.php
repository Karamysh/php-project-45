<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function getRandomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function isEven(int $number)
{
    return ($number % 2) === 0;
}

function startGame()
{
    $questionsAndAnswers = [];
    for ($index = 1; $index <= ROUNDS_COUNT; $index++) {
        $question = getRandomNumber();
        $questionsAndAnswers[$question] = isEven($question) ? 'yes' : 'no';
    }

    runGame($questionsAndAnswers, CONDITION);
}
