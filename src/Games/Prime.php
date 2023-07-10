<?php

namespace BrainGames\src\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\src\Engine\startPlay;

use const BrainGames\src\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function randomNumbers()
{
    $minNumber = 2;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function isPrime(int $number)
{
    $devisors = 0;
    for ($j = 1; $j <= $number; $j++) {
        if (($number % $j) === 0) {
            $devisors += 1;
        }
    }
    if ($devisors === 2) {
        return true;
    } else {
        return false;
    }
}

function startIsPrimeGame()
{
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $question = randomNumbers();
        if (isPrime($question) === true) {
            $questionsAndAnswers[$question] = 'yes';
        } else {
            $questionsAndAnswers[$question] = 'no';
        }
    }

    startPlay($questionsAndAnswers, CONDITION);
}
