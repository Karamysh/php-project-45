<?php

namespace BrainGames\src\Games\progression;

use function cli\line;
use function cli\prompt;

use function BrainGames\src\Engine\greeting;
use function BrainGames\src\Engine\randomNumbers1;
use function BrainGames\src\Engine\randomNumbers2;
use function BrainGames\src\Engine\wrong;
use function BrainGames\src\Engine\congratulations;

function gameFourth()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    greeting($name);
    line('What number is missing in the progression?');
    $index = 0;
    while ($index < 3) {
        $numbers1 = randomNumbers1();
        $numbers2 = randomNumbers2();
        $numbers3 = randomNumbers2();
        $arr = [];
        for ($i = 0; $i < 10; $i++) {
            $arr[$i] = $numbers1 + $i * $numbers2;
        }
        $result = $arr[$numbers3];
        $arr[$numbers3] = '..';
        $question = implode(' ', $arr);
        line("Question: %s!", $question);
        $answer = prompt('Your answer');
        if ($answer == $result) {
            line('Correct!');
            $index += 1;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'.");
            return wrong($name);
        }
    }
    congratulations($name);
}