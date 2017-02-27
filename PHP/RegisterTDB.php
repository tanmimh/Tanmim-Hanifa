
<?php
    $con = mysqli_connect("localhost", "thani001", "password", "thani001_travelapals");
    
    $email = $_POST["email"];
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];
    $username = $_POST["username"];



    $statement = mysqli_prepare($con, "INSERT INTO user (email, name, dob, password, username) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sssss", $email, $name, $dob, $password, $username);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
