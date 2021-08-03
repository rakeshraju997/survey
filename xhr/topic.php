<?php
include '../config.php';

    
    $topics = $_GET['topic'];
    foreach($topics as $topic){
        if($topic['name'] == 'yes_no'){
            $flag=1;
        }
        if($flag==0){
            $return[] =  $topic['value'];
            $query = "INSERT INTO `topic`(`user_id`, `email`, `phone`) VALUES('".$_GET['user_name']."','".$_GET['email']."',".$_GET['phone'].")" ;
            $sql      = mysqli_query($sqlConnect,$query );
        }else{
            // $return[] =  $topic['value'];
            // $query = "INSERT INTO `topic`(`user_id`, `email`, `phone`) VALUES('".$_GET['user_name']."','".$_GET['email']."',".$_GET['phone'].")" ;
            // $sql      = mysqli_query($sqlConnect,$query );
        }
            
            
        

        // if($topic['name'] == 'sugg_topic'){
        //     $returnn[] =  $topic['value'];
        // }
    }
    
    // if($sql){
        $data = array(
            'status' => 200,
            'html' => $topics
        );
    // }else{
        // $data = array(
        //     'status' => 400
        // );
    // }
   
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
?>