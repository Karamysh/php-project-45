<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What is the result of the expression?';

function getRandomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 20;
    return (rand($minNumber, $maxNumber1));
}

function calculate(int $randomNumber1, int $randomNumber2, string $operation): mixed
{
    return match ($operation) {
        '+' => $randomNumber1 + $randomNumber2,
        '-' => $randomNumber1 - $randomNumber2,
        '*' => $randomNumber1 * $randomNumber2,
        default => throw new \Exception('error: unknown operator')
    };
}

function startGame()
{
    $operations = ['+', '-', '*'];
    $questionsAndAnswers = [];
    for ($index = 0; $index < ROUNDS_COUNT; $index++) {
        $randomNumber1 = getRandomNumber();
        $randomNumber2 = getRandomNumber();
        $operation = $operations[array_rand($operations)];
        $question = "$randomNumber1 $operation $randomNumber2";
        $questionsAndAnswers[$question] = calculate($randomNumber1, $randomNumber2, $operation);
    }

    runGame($questionsAndAnswers, CONDITION);
}
