<?php

namespace BrainGames\src\Engine;

require_once __DIR__ . '/../../vendor/autoload.php';

use function src\Engine;

use function cli\line;
use function cli\prompt;

function calculator()
{
    line('What is the result of the expression?');
    $index = 0;
    $minNumber = 0;
    $maxNumber1 = 50;
    $maxNumber2 = 10;
    $quantityOperation = 2;
    while ($index < 3) {
        $numbers1 = rand($minNumber, $maxNumber1);
        $numbers2 = rand($minNumber, $maxNumber2);
        $operation = rand($minNumber, $quantityOperation);
        $result = 0;
        if ($operation === 0) {
            $question = "$numbers1 + $numbers2";
            $result = $result + $numbers1 + $numbers2;
        } elseif ($operation === 1) {
            $question = "$numbers1 - $numbers2";
            $result = $result + $numbers1 - $numbers2;
        } else {
            $question = ("$numbers1 * $numbers2");
            $result = ($result + $numbers1) * $numbers2;
        }
        line("Question: %s!", $question);
        $answer = prompt('Your answer');

        if ($answer == $result) {
            line('Correct!');
            $index += 1;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'.");
            return line("Let's try again, %s!", $name);
        }
    }
}
