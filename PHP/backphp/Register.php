
<?php
    $con = mysqli_connect("localhost", "jsusz001", "password", "jsusz001_TravelPals");
    
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $password = $_POST["password"];
    $picture = $_POST["picture"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $username = $_POST["username"];


    $statement = mysqli_prepare($con, "INSERT INTO user (name, dob, password, picture, email, location, username) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $name, $dob, $password, $picture, $email, $location, $username);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>
