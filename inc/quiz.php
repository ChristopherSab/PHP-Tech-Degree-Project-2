<?php

session_start();

// Question from "questions.php" file
include('inc/questions.php');

// Determines if the score will be shown or not. Set to false by default
$show_score = False;

// Total number of questions to ask
$totalQuestions = count(getRandomQuestion());

// Toast message which is displayed to the page after a user chooses answer, set to empty by default
$toast = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Checks to see if the answer selected is the correct answer in the questions array & displays relevant message
 if ($_POST['answer'] == $_SESSION["questions"][$_POST['id']]["correctAnswer"]){
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
      $_SESSION["questions"] = getRandomQuestion();
      $_SESSION['totalCorrect'] = 0;
      $toast = '';
    }

    do{
      $index = rand(0, $totalQuestions - 1);
    }while(in_array($index, $_SESSION['used_indexes']));

  $question = $_SESSION["questions"][$index];

  array_push($_SESSION['used_indexes'], $index);

  $answers = [
    $question["correctAnswer"], 
    $question["firstIncorrectAnswer"], 
    $question["secondIncorrectAnswer"]
];

shuffle($answers);

}

//  session_destroy();



