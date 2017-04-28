<?php
    require("password.php");

    $con = mysqli_connect("localhost", "thani001", "password", "thani001_travelapals");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $colUserID, $colEmail, $colName, $colDob, $colPassword, $colUsername);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)) {
            $response["success"] = true;
            $response["id"] = $colUserID;
            $response["email"] = $colEmail;
            $response["name"] = $colName;
            $response["dob"] = $colDob;
            $response["username"] = $colUsername;  
        }
    }

    echo json_encode($response);
?>