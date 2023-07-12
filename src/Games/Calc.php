<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\startPlay;

use const BrainGames\Engine\ROUNDS_COUNT;

const CONDITION = 'What is the result of the expression?';

function randomNumber()
{
    $minNumber = 2;
    $maxNumber1 = 20;
    return (rand($minNumber, $maxNumber1));
}

function calculate(int $randomNumber1, int $randomNumber2, string $operation)
{
    $result = match ($operation) {
        '+' => $randomNumber1 + $randomNumber2,
        '-' => $randomNumber1 - $randomNumber2,
        'default' => $randomNumber1 * $randomNumber2,
    };
    return $result;
}

function startCalcGame()
{
    $operations = ['+', '-', '*'];
    $questionsAndAnswers = [];
    for ($index = 1; $index <= ROUNDS_COUNT; $index++) {
        $randomNumber1 = randomNumber();
        $randomNumber2 = randomNumber();
        $operation = $operations[array_rand($operations)];
        $question = "$randomNumber1 $operation $randomNumber2";
        $questionsAndAnswers[$question] = calculate($randomNumber1, $randomNumber2, $operation);
    }

    startPlay($questionsAndAnswers, CONDITION);
}
