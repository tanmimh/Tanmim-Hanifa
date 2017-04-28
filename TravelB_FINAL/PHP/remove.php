<?php
    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $plan_id = $_POST["plan_id"];
 

    $statement = mysqli_prepare($con, "DELETE FROM plans WHERE plan_id = ? ");
    mysqli_stmt_bind_param($statement, "s", $plan_id);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>