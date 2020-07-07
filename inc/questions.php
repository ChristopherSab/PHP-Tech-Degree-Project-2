<?php

#This Functions returns a multi-dimensional array of 10 addition math questions,
#Each array, has an inner array of the numbers being addded, the correct answer && two incorrect answers 
function getRandomQuestion(){

    $questions = array();

    for($i=0; $i < 10; $i++){
        $questions[$i]['leftAdder'] = rand(10, 100);
        $questions[$i]['rightAdder'] = rand(10, 100);
        $questions[$i]['correctAnswer'] = $questions[$i]['leftAdder'] + $questions[$i]['rightAdder'];
        $questions[$i]['firstIncorrectAnswer'] = 10;
        $questions[$i]['secondIncorrectAnswer'] = 10;

        #Although statistically unlikely, These conditionals will make sure the CORRECT answer Is NOT equal to the 
        #Randomly assigned INCORRECT answers, therefore avoiding more than 1 correct answer being displayed OR two 
        #similar INCORRECT answers

        do{

            $questions[$i]['firstIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(-10, 10);

        }while($questions[$i]['correctAnswer'] == $questions[$i]['firstIncorrectAnswer']);

        do{

            $questions[$i]['secondIncorrectAnswer'] = $questions[$i]['firstIncorrectAnswer'] - rand(-10, 10);

        }while($questions[$i]['correctAnswer'] == $questions[$i]['secondIncorrectAnswer'] OR 
        $questions[$i]['secondIncorrectAnswer'] == $questions[$i]['firstIncorrectAnswer'] );

    }

    return $questions;
}


