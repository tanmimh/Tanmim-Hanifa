<?php
    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $user_id = $_POST["user_id"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user1 WHERE user_id = ? ");
    mysqli_stmt_bind_param($statement, "i", $user_id);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $email,  $gender,$name, $dob,$password,$username);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true; 
		$response["user_id"]=$user_id;
        $response["email"] = $email;
        $response["gender"] = $gender;
        $response["name"] = $name;
        $response["dob"] = $dob;
		$response["password"] = $password;
        $response["username"] = $username;

    }
    
    echo json_encode($response);
?>
