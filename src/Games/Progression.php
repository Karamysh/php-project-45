<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const PROGRESSION_LENGTH = 8;

const CONDITION = 'What number is missing in the progression?';

function startGame()
{
    $questionsAndAnswers = [];
    for ($index = 1; $index <= ROUNDS_COUNT; $index++) {
        $firstNumberOfProgression = rand(2, 50);
        $stepProgression = rand(1, 10);
        $indexOfMissingNumber = rand(1, PROGRESSION_LENGTH - 1);
        $progression = [];
        for ($j = 0; $j < PROGRESSION_LENGTH; $j++) {
            $progression[$j] = $firstNumberOfProgression + $j * $stepProgression;
        }
        $missingNumber = $progression[$indexOfMissingNumber];
        $progression[$indexOfMissingNumber] = '..';
        $question = implode(' ', $progression);
        $questionsAndAnswers[$question] = $missingNumber;
    }

    runGame($questionsAndAnswers, CONDITION);
}
