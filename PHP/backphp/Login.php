<?php
    $con = mysqli_connect("localhost", "jsusz001", "password", "jsusz001_TravelPals");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $id, $name, $dob, $password, $picture, $email, $location, $username);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true; 
        $response["name"] = $name;
        $response["dob"] = $dob; 
        $response["password"] = $password;
        $response["picture"] = $picture;
        $response["email"] = $email;
        $response["location"] = $location;
        $response["username"] = $username;
    }
    
    echo json_encode($response);


	
;?>