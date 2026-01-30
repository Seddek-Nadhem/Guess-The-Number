#!/usr/bin/env php
<?php

/* -------------------------------------------------------------------------- */
/* MAIN PROGRAM                                                               */
/* -------------------------------------------------------------------------- */

// 1. Startup Checks
if ($argc > 1) {
    echo "Error: This game does not accept arguments." . PHP_EOL;
    echo "Usage: Just type 'guess-the-number' to start." . PHP_EOL;
    exit(1); // Stop the program with an error code
}

// 2. Game Setup
$rawInput = welcomeMsg();
$difficultyLevel = validateDifficultyChoice($rawInput);
$difficultyConfig = getDifficultyConfig($difficultyLevel);

$levelName = $difficultyConfig['name'];
$totalChances = $difficultyConfig['chances'];

echo PHP_EOL . "Great! You have selected the $levelName difficulty level." . PHP_EOL;
echo "Let's start the game!" . PHP_EOL . PHP_EOL;

// 3. Generate Number
$randomNumber = generateSecretNumber();

// just for testing
// echo $randomNumber . "\n\n";

$attempts = 0;

// 4. Game Loop
while ($totalChances > 0) {
    $playerGuess = trim(readline("Enter your guess: "));

    if (isInvalidGuess($playerGuess)) continue; // going back to the loop without costing the user an attempt
    
    $totalChances--;
    $attempts++;

    
    if ($playerGuess == $randomNumber) {
        echo PHP_EOL . "Congratulations! You've guessed the correct number in $attempts attempts." . PHP_EOL;
        exit(0);
    }

    if ($playerGuess > $randomNumber) {
        echo "Incorrect! The number is less than $playerGuess." . PHP_EOL;
    } else {
        echo "Incorrect! The number is more than $playerGuess." . PHP_EOL;
    }

    if ($totalChances > 0) {
        echo "You have $totalChances chances left." . PHP_EOL . PHP_EOL;
    }
}

// 5. Game Over
echo PHP_EOL . "Game over! You have no attempts left. The right number was $randomNumber" . PHP_EOL;


/* -------------------------------------------------------------------------- */
/* FUNCTIONS                                                                  */
/* -------------------------------------------------------------------------- */

function welcomeMsg() {
    echo PHP_EOL . "Welcome to the Number Guessing Game!" . PHP_EOL;
    echo "I'm thinking of a number between 1 and 100." . PHP_EOL;
    echo "Please select the difficulty level:" . PHP_EOL . PHP_EOL;
    echo "1. Easy (10 chances)" . PHP_EOL;
    echo "2. Medium (5 chances)" . PHP_EOL;
    echo "3. Hard (3 chances)" . PHP_EOL . PHP_EOL;
    $userDifficultyChoice = trim(readline("Enter your choice please: "));

    return $userDifficultyChoice; 
}
function validateDifficultyChoice($choice) {
    $validOptions = ['1', '2', '3'];
    $attempts = 1;

    while (!in_array($choice, $validOptions)) {
        if ($attempts > 5) {
            echo "Stop missing around! No game for you, Bye!". PHP_EOL;
            exit(1);
        }
        
        echo "Invalid input! Please only type 1, 2, or 3." . PHP_EOL . PHP_EOL;
        $choice = trim(readline("Enter your choice please: "));

        $attempts++;
    }

    return $choice;
}
function getDifficultyConfig($choice) {
    $levels = [
        '1' => ['name' => 'Easy', 'chances' => 10],
        '2' => ['name' => 'Medium', 'chances' => 5],
        '3' => ['name' => 'Hard', 'chances' => 3],
    ];

    return $levels[$choice];
}
function generateSecretNumber() {
    // includes 1 and 100
    return rand(1, 100);
}
function isInvalidGuess($guessInput) {
    // This one check handles both "abc" AND "12.5" AND empty inputs
    if (!ctype_digit($guessInput)) {
        echo "You didn't enter a valid integer. Choose a whole number between 1 and 100!" . PHP_EOL . PHP_EOL;
        return true;
    }

    // Now we know for sure it's a whole number, so we check the range
    if ($guessInput < 1 || $guessInput > 100) {
        echo "Out of range! You have to choose between 1 and 100!" . PHP_EOL . PHP_EOL;
        return true;
    }

    return false;
}

