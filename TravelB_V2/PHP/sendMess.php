<?php
    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $content = $_POST["content"];
    $sender = $_POST["sender"];
    $receiver = $_POST["receiver"];

    $statement = mysqli_prepare($con, "INSERT INTO message ( content,sender,receiver) VALUES (?, ?,?) ");
    mysqli_stmt_bind_param($statement, "sss", $content,$sender,$receiver);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>