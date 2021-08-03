<?php
include '../config.php';

    $query = "INSERT INTO `users`(`user_name`, `email`, `phone`) VALUES('".$_GET['user_name']."','".$_GET['email']."',".$_GET['phone'].")" ;
    $sql      = mysqli_query($sqlConnect,$query );

    if($sql){
        $data = array(
            'status' => 200,
            // 'html' => $query
        );
    }else{
        $data = array(
            'status' => 400,
        );
    }
   
    header("Content-type: application/json");
    echo json_encode($data);
    exit();
?>