<?php

namespace BrainGames\src\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\src\Engine\startPlay;

use const BrainGames\src\Engine\ROUNDS_COUNT;

const PROGRESSION_LENGTH = 8;

const CONDITION = 'What number is missing in the progression?';

function randomNumbers1()
{
    $minNumber = 2;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function randomNumbers2()
{
    $minNumber = 1;
    $maxNumber2 = (PROGRESSION_LENGTH - 1);
    return (rand($minNumber, $maxNumber2));
}

function startProgressionGame()
{
    $questionsAndAnswers = [];
    for ($index = 1; $index <= ROUNDS_COUNT; $index++) {
        $firstNumberOfProgression = randomNumbers1();
        $stepProgression = randomNumbers2();
        $numberOfMissingMember = randomNumbers2();
        $progression = [];
        for ($j = 0; $j < PROGRESSION_LENGTH; $j++) {
            $progression[$j] = $firstNumberOfProgression + $j * $stepProgression;
        }
        $missingNumber = $progression[$numberOfMissingMember];
        $progression[$numberOfMissingMember] = '..';
        $question = implode(' ', $progression);
        $questionsAndAnswers[$question] = $missingNumber;
    }

    startPlay($questionsAndAnswers, CONDITION);
}
