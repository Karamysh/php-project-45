<?php

namespace BrainGames\src\Engine;


use function cli\line;
use function cli\prompt;

function greeting($name)
{
    line("Hello, %s!", $name);
}

function randomNumbers1()
{
    $minNumber = 1;
    $maxNumber1 = 50;
    return (rand($minNumber, $maxNumber1));
}

function randomNumbers2()
{
    $minNumber = 1;
    $maxNumber2 = 9;
    return (rand($minNumber, $maxNumber2));
}

function wrong($name)
{
    line("Let's try again, %s!", $name);

}

function congratulations($name)
{
    line("Congratulations, %s!", $name);
}