<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function randomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function isPrime(int $number)
{
    $divisors = 0;
    for ($j = 1; $j <= $number; $j++) {
        if (($number % $j) === 0) {
            $divisors += 1;
        }
    }
    return ($divisors === 2);
}

function startIsPrimeGame()
{
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $question = randomNumber();
        $questionsAndAnswers[$question] = (isPrime($question) === true) ? 'yes' : 'no';
    }

    startGame($questionsAndAnswers, CONDITION);
}
