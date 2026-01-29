#!/usr/bin/env php
<?php

// Check if the user passed any extra arguments
// $argv[0] is the script name. If there is an $argv[1], they typed something extra.
if ($argc > 1) {
    echo "Error: This game does not accept arguments." . PHP_EOL;
    echo "Usage: Just type 'guess-the-number' to start." . PHP_EOL;
    exit(1); // Stop the program with an error code
}

function welcomeMsg() {
    echo PHP_EOL . "Welcome to the Number Guessing Game!" . PHP_EOL;
    echo "I'm thinking of a number between 1 and 100." . PHP_EOL;
    echo "Please select the difficulty level:" . PHP_EOL . PHP_EOL;
    echo "1. Easy (10 chances)" . PHP_EOL;
    echo "2. Medium (5 chances)" . PHP_EOL;
    echo "3. Hard (3 chances)" . PHP_EOL . PHP_EOL;
    $userDifficultyChoice = readline("Enter your choice please: ");
    return $userDifficultyChoice; 
}



