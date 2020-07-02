<?php

// Question from "questions.php" file
include('inc/questions.php');

// Total number of questions to ask
$totalQuestions = count($questions);

// Toast message which is displayed to the page after a user chooses answer, set to empty by default
$toast = null;

// Make a variable to hold a random index.
$index = rand(0, $totalQuestions - 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if ($_POST["answer"] == $questions[$index]["correctAnswer"]) {
    $toast = 'Well Done! Great Job!';
    $_SESSION['totalCorrect'] + 1;
  } else {
    $toast = 'Bummer! Sorry That Was Wrong';
  }
}

if(!isset($_SESSION['used_indexes'])){
  $_SESSION['used_indexes'] = [];
}




$_SESSION['totalCorrect'] = 0;

if(count($_SESSION['used_indexes']) == $totalQuestions){
  $_SESSION['used_indexes'] = [];
  $show_score = true;

} else {
  $show_score = false;
    if(count($_SESSION['used_indexes']) == 0){
      $_SESSION['totalCorrect'] = 0;
      $toast = null;
    }
  
  $question = $questions[$index];
  array_push($_SESSION['used_indexes'], $index);

  $answers = [
    $question["correctAnswer"], 
    $question["firstIncorrectAnswer"], 
    $question["secondIncorrectAnswer"]
];

shuffle($answers);

}


  // session_destroy();
