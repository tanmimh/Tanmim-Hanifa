
<?php
    $con = mysqli_connect("localhost", "thani001", "password", "thani001_travelapals");
    
    $name = $_POST["name"];
    $age = $_POST["age"];
    $user = $_POST["user"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $statement = mysqli_prepare($con, "INSERT INTO user (name, user, age, password, username) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $name, $user, $age, $password, $username);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
