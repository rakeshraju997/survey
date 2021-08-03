<?php
include '../config.php';
    
    $questions = $_GET['question'];
    
    foreach($questions as $question){
        if($question['value']!=''){
            $answer[$question['name']] = $question['value'];
        }
    }

    //topic table
    $fields = '`' . implode('`, `', array_keys($answer)) . '`';
    $datas   = '\'' . implode('\', \'', $answer) . '\'';
    $query = "INSERT INTO `questions` (`user_id`,`question_no`,". $fields .") VALUES('". $_SESSION['user_id'] ."','".$_GET['ID']."',".$datas.")" ;
    $sql     = mysqli_query($sqlConnect,$query );

    if($sql){
        $data = array(
            'status' => 200,
            'html' => $query
        );
    }else{
        $data = array(
            'status' => 400
        );
    }
   
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
?>