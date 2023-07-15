<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function randomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 20;
    return (rand($minNumber, $maxNumber1));
}

function gcdNumber(int $randomNumber1, int $randomNumber2)
{
    $result = 0;
    if ($randomNumber1 === $randomNumber2) {
        $result = $randomNumber1;
    } else {
        $greatestCommonDivisor = 1;
        while ($greatestCommonDivisor <= $randomNumber2) {
            if ($randomNumber1 % $greatestCommonDivisor === 0 && $randomNumber2 % $greatestCommonDivisor === 0) {
                $result = $greatestCommonDivisor;
                $greatestCommonDivisor += 1;
            } else {
                $greatestCommonDivisor += 1;
            }
        }
    }
    return $result;
}

function startGcdGame()
{
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $randomNumber1 = randomNumber();
        $randomNumber2 = randomNumber();
        $result = 1;
        $question = "$randomNumber1 $randomNumber2";
        $questionsAndAnswers[$question] = gcdNumber($randomNumber1, $randomNumber2);
    }

    startGame($questionsAndAnswers, CONDITION);
}
