




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">


        <?php 
            include('inc/quiz.php'); 

            var_dump($_SESSION['used_indexes']);

            if(!empty($toast)){
                echo '<p>'.$toast.'</p>';
            }


            echo '<p class="breadcrumbs">Question '.count($_SESSION['used_indexes']).' of  '.$totalQuestions.'</p>';

            if($show_score == true){
                echo '<p> You got '.$_SESSION['totalCorrect'].' out of '.$totalQuestions.'</p>';
            }


            echo '<p class="quiz">What is '. $question['leftAdder'] .'+'.  $question['rightAdder'].'</p>'; 

            echo '<form method="post" action="index.php">
                  <input type="hidden" name="id" value="'.$index.'"/>
                    <input type="submit" class="btn" name="answer" value="'.$answers[0].'" />
                    <input type="submit" class="btn" name="answer" value="'.$answers[1].'" />
                    <input type="submit" class="btn" name="answer" value="'.$answers[2].'" />
                    </form>';

        ?>

        </div>
    </div>
</body>
</html>