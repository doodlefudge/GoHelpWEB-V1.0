<?php session_start(); 
        include_once './config.php';

    if(isset($_POST['lesson']) && isset($_POST['answer'])){
    $unit_id        = $_POST['unit_id'];
    $lesson_id      = $_POST['lesson_id'];
    $lesson         = $_POST['lesson'];
    $lesson_stat_id = $_POST['lesson_stat_id'];  
    $answer         = $_POST ['answer'];

    $sql = "INSERT INTO lesson  (
                                unit_id,
                                lesson_id,
                                lesson,
                                lesson_stat_id,
                                answer) 
            VALUES              (
                                '$unit_id',
                                null,
                                ' $lesson',
                                ' $lesson_stat_id', 
                                '$answer'
                                )";
    $result = mysqli_query($link, $sql);
    $profile_id = mysqli_insert_id($link);
    header('location:./lesson.php');

    }


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Hekasi Bata</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <body  style="background-image: url(./img/backgroundAdmin.jpg)">

        <?php include_once './lesson.php'; ?>

        <div class="container">

            <div class="row">


                <div class="span8 offset2">

                    <div class="well">

                    <form action="" method="POST">
                        <div class="well">
                          
                            <input type="number" name="unit_id" class="right" placeholder="input unit id" required />
                        </div>

                      
                       <div class="well">
                          
                            <input type="name" name="lesson" class="input-block-level" placeholder="What is the lesson" required />
                           
                        </div>

                        <div class="well">
                          
                            <input type="name" name="answer" class="input-block-level" placeholder="What is the answer" required />
                           
                        </div>
                 
                       <div class="well">
                          
                            <select type="number" name="lesson_stat_id" class="right" placeholder="lesson id" required />
                                <option value ="0">0</option>
                                 <option value ="1">1</option>
                            </select>
                        </div>
                     
                        <div class="text-right">

                            <input name="submit" type="submit" class="btn btn-info" value="Save">


                        </div>

                    </form>
                    </div>

                </div>
            </div>


        </div>
    </body>
</html>


