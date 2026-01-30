# PHP Number Guessing Game

A fun, interactive command-line game where the player tries to guess a secret number between 1 and 100. Built as a practical exercise in PHP CLI development, focus was placed on input validation, modular function design, and user experience.

## 🚀 Features
* **Difficulty Levels:** Choose between Easy (10 chances), Medium (5 chances), or Hard (3 chances).
* **Robust Validation:** Handles non-integers, out-of-range numbers, and empty inputs without punishing the player.
* **Smart Hints:** Provides "Too High" or "Too Low" feedback after every guess.
* **Replayable:** Loop logic allows you to play multiple rounds without restarting the script.
* **Clean UI:** Uses ANSI escape codes to clear the terminal for a modern app feel.

## 🛠️ Technical Highlights
* **Modular Code:** Logic is separated into clear functions (`playGame`, `isInvalidGuess`, `getDifficultyConfig`, etc.).
* **Defensive Programming:** Prevents infinite loops and handles unexpected user input gracefully.
* **Cross-Platform:** Includes a `.bat` wrapper for easy execution on Windows.

## 📦 Installation & Usage
1. **Clone the repository:**
   ```bash
   git clone https://github.com/seddek-nadhem/guess-the-number.git
   ```

2. **Navigate to the folder:**
   ```bash
   cd guess-the-number
   ```

3. **Run the game:**

   Windows: Just type guess-the-number
   
   Linux/Mac: Run php guess-the-number.php

## 📝 Requirements
- PHP 8.0 or higher.

## Inspiration 

- Project was done on instructions from the backend projects beginner page on roadmap.sh https://roadmap.sh/projects/number-guessing-game
