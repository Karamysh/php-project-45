<?php

namespace BrainGames\src\Games\Gcd;

use function cli\line;
use function cli\prompt;

function randomNumbers1()
{
    $minNumber = 1;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function randomNumbers2()
{
    $minNumber = 1;
    $maxNumber2 = 10;
    return (rand($minNumber, $maxNumber2));
}

function startGdcGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');
    $index = 0;
    while ($index < 3) {
        $numbers1 = randomNumbers1();
        $numbers2 = randomNumbers2();
        $result = 0;
        $question = "$numbers1 $numbers2";
        if ($numbers1 === $numbers2) {
            $result = $numbers1;
        } elseif ($numbers1 > $numbers2) {
            $i = 1;
            while ($i <= $numbers2) {
                if ($numbers1 % $i === 0 && $numbers2 % $i === 0) {
                    $result = $i;
                    $i += 1;
                } else {
                    $i += 1;
                }
            }
        } else {
            $i = 1;
            while ($i <= $numbers1) {
                if ($numbers2 % $i === 0 && $numbers1 % $i === 0) {
                    $result = $i;
                    $i += 1;
                } else {
                    $i += 1;
                }
            }
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
    line("Congratulations, %s!", $name);
}