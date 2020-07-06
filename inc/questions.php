<?php

$questions = [];

for($i=0; $i < 10; $i++){
    $questions[$i]['leftAdder'] = rand(10, 100);
    $questions[$i]['rightAdder'] = rand(10, 100);
    $questions[$i]['correctAnswer'] = $questions[$i]['leftAdder'] + $questions[$i]['rightAdder'];
    $questions[$i]['firstIncorrectAnswer'] = $questions[$i]['correctAnswer'] + 11;
    $questions[$i]['secondIncorrectAnswer'] = $questions[$i]['correctAnswer'] - 9;
}