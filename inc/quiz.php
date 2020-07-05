<?php

session_start();

// Question from "questions.php" file
include('inc/questions.php');

// Determines if the score will be shown or not. Set to false by default
$show_score = False;

// Total number of questions to ask
$totalQuestions = count($questions);

// Toast message which is displayed to the page after a user chooses answer, set to empty by default
$toast = null;

// Variable to holds a random index index number.


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['answer'] == $questions[$_POST['id']]["correctAnswer"]) {
    $toast = "<h2 class='correct'> Correct Answer, Well Done! &#9786 </h2>";
    $_SESSION['totalCorrect'] += 1;
  } else {
    $toast = "<h2 class='wrong'> Sorry! That Was Wrong! &#9785 </h2>";
    
}

}

if(!isset($_SESSION['used_indexes'])){
  $_SESSION['used_indexes'] = [];
  $_SESSION['totalCorrect'] = 0;
}

if(count($_SESSION['used_indexes']) == $totalQuestions){
  $_SESSION['used_indexes'] = [];
  $show_score = true;

} else {
  $show_score = false;
    if(count($_SESSION['used_indexes']) == 0){
      $_SESSION['totalCorrect'] = 0;
      $toast = '';
    }

  $index = rand(0, $totalQuestions - 1);
  
  $question = $questions[$index];
  array_push($_SESSION['used_indexes'], $index);

  $answers = [
    $question["correctAnswer"], 
    $question["firstIncorrectAnswer"], 
    $question["secondIncorrectAnswer"]
];

shuffle($answers);

}

//  session_destroy();