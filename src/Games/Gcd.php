<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function getRandomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 20;
    return (rand($minNumber, $maxNumber1));
}

function gcdNumber(int $randomNumber1, int $randomNumber2)
{
    return ($randomNumber1 % $randomNumber2 !== 0)
        ? gcdNumber($randomNumber2, $randomNumber1 % $randomNumber2)
        : $randomNumber2;
}

function startGame()
{
    $questionsAndAnswers = [];
    for ($index = 1; $index <= ROUNDS_COUNT; $index++) {
        $randomNumber1 = getRandomNumber();
        $randomNumber2 = getRandomNumber();
        $question = "$randomNumber1 $randomNumber2";
        $questionsAndAnswers[$question] = gcdNumber($randomNumber1, $randomNumber2);
    }

    runGame($questionsAndAnswers, CONDITION);
}
