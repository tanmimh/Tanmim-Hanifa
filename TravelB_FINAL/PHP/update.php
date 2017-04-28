<?php
    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $user_id = $_POST["user_id"];
	$name=$_POST["name"];
	$username=$_POST["username"];
	$dob=$_POST["dob"];
	$email=$_POST["email"];
	
 

    $statement = mysqli_prepare($con, "update user1 set email='$email',name='$name',dob='$dob',username='$username'  where user_id='$user_id' ");

   // mysqli_stmt_bind_param($statement, "s", $user_id);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>