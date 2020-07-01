<?php
// Start the session

// Include of thee questions from the questions.php file
include('inc/questions.php');

// Total number of questions to ask
$totalQuestions = count($questions);

// Toast message which is displayed to the page after a user chooses answer, set to empty by default
$toast = null;

// Make a variable to hold a random index.
$index = rand(0, $totalQuestions - 1);

// Current question position
$question = $questions[$index];

//Array of the 3 answers (this is from the question.php file)
$answers = [
    $question["correctAnswer"], 
    $question["firstIncorrectAnswer"], 
    $question["secondIncorrectAnswer"]
];

shuffle($answers);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($_POST["answer"] == $questions[$index]["correctAnswer"]) {
    $toast = 'Well Done! Great Job!';
    $_SESSION['totalCorrect'] ++;
  } else {
    $toast = 'Bummer! Sorry That Was Wrong';
  }
}

if(!isset($_SESSION['used_indexes'])){
  $_SESSION['used_indexes'] = [];
  $showScore = false;
}

array_push($_SESSION['used_indexes'], $index);

$_SESSION['totalCorrect'] = 0;







/*
    Check if a session variable has ever been set/created to hold the indexes of questions already asked.
    If it has NOT: 
        1. Create a session variable to hold used indexes and initialize it to an empty array.
        2. Set the show score variable to false.
*/


/*
  If the number of used indexes in our session variable is equal to the total number of questions
  to be asked:
        1.  Reset the session variable for used indexes to an empty array 
        2.  Set the show score variable to true.

  Else:
    1. Set the show score variable to false 
    2. If it's the first question of the round:
        a. Set a session variable that holds the total correct to 0. 
        b. Set the toast variable to an empty string.
        c. Assign a random number to a variable to hold an index. Continue doing this
            for as long as the number generated is found in the session variable that holds used indexes.
        d. Add the random number generated to the used indexes session variable.      
        e. Set the individual question variable to be a question from the questions array and use the index
            stored in the variable in step c as the index.
        f. Create a variable to hold the number of items in the session variable that holds used indexes
        g. Create a new variable that holds an array. The array should contain the correctAnswer,
            firstIncorrectAnswer, and secondIncorrect answer from the variable in step e.
        h. Shuffle the array from step g.
*/