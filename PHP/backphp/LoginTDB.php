<?php
    $con = mysqli_connect("localhost", "thani001", "password", "thani001_travelapals");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $email, $name, $dob, $password, $username);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
	//$response["userID"] = $userID
	$response["email"] = $email;
        $response["name"] = $name;
        $response["dob"] = $dob;
        $response["username"] = $username;
        $response["password"] = $password;

    }
    
    echo json_encode($response);


	
;?>