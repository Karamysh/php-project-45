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

function getGcdNumber(int $num1, int $num2)
{
    return ($num1 % $num2 !== 0)
        ? getGcdNumber($num2, $num1 % $num2)
        : $num2;
}

function startGame()
{
    $questionsAndAnswers = [];
    for ($index = 1; $index <= ROUNDS_COUNT; $index++) {
        $randomNumber1 = getRandomNumber();
        $randomNumber2 = getRandomNumber();
        $question = "$randomNumber1 $randomNumber2";
        $questionsAndAnswers[$question] = getGcdNumber($randomNumber1, $randomNumber2);
    }

    runGame($questionsAndAnswers, CONDITION);
}
