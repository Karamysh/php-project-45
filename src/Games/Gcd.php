<?php

namespace BrainGames\src\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\src\Engine\startPlay;

use const BrainGames\src\Engine\ROUNDS_COUNT;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function randomNumbers()
{
    $minNumber = 2;
    $maxNumber1 = 20;
    return (rand($minNumber, $maxNumber1));
}

function startGcdGame()
{
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $randomNumber1 = randomNumbers();
        $randomNumber2 = randomNumbers();
        $result = 1;
        $question = "$randomNumber1 $randomNumber2";
        if ($randomNumber1 === $randomNumber2) {
            $result = $randomNumber1;
        } else {
            $greteasCommonDivisor = 1;
            while ($greteasCommonDivisor <= $randomNumber2) {
                if ($randomNumber1 % $greteasCommonDivisor === 0 && $randomNumber2 % $greteasCommonDivisor === 0) {
                    $result = $greteasCommonDivisor;
                    $greteasCommonDivisor += 1;
                } else {
                    $greteasCommonDivisor += 1;
                }
            }
        }
        $questionsAndAnswers[$question] = $result;
    }

    startPlay($questionsAndAnswers, CONDITION);
}