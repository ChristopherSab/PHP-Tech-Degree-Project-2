<?php



function getRandomQuestion(){

    $questions = array();

    for($i=0; $i < 10; $i++){
        $questions[$i]['leftAdder'] = rand(10, 100);
        $questions[$i]['rightAdder'] = rand(10, 100);
        $questions[$i]['correctAnswer'] = $questions[$i]['leftAdder'] + $questions[$i]['rightAdder'];
        $questions[$i]['firstIncorrectAnswer'] = null;
        $questions[$i]['secondIncorrectAnswer'] = $questions[$i]['correctAnswer'] - rand(3, 11);

        if($questions[$i]['correctAnswer'] !== $questions[$i]['firstIncorrectAnswer'] ){
            $questions[$i]['firstIncorrectAnswer'] = rand(10, 200);
        }else {
            $questions[$i]['firstIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(3, 19);
        }

        if($questions[$i]['correctAnswer'] !== $questions[$i]['secondIncorrectAnswer'] ){
            $questions[$i]['secondIncorrectAnswer'] = rand(10, 200);
        }else {
            $questions[$i]['secondIncorrectAnswer'] = $questions[$i]['correctAnswer'] + rand(3, 19);
        }
    }


    return $questions;
}


