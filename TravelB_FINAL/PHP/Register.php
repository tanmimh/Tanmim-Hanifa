<?php
    require("password.php");
    
    $connect = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $name = $_POST["name"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];


     function registerUser() {
        global $connect, $name, $gender, $dob, $email, $username, $password;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $statement = mysqli_prepare($connect, "INSERT INTO user1 (name, gender, dob, email, username, password) VALUES (?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($statement, "ssisss", $name, $gender, $dob, $email, $username, $passwordHash);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }

    function usernameAvailable() {
        global $connect, $username;
        $statement = mysqli_prepare($connect, "SELECT * FROM user1 WHERE username = ?"); 
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true; 
        }else {
            return false; 
        }
    }

    function emailAvailable() {
        global $connect, $email;
        $statement = mysqli_prepare($connect, "SELECT * FROM user1 WHERE email = ?"); 
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true; 
        }else {
            return false; 
        }
    }


    $response = array();
    $response["success"] = false;  

    if (usernameAvailable() && emailAvailable()){
        registerUser();
        $response["success"] = true;  
    }
    
    echo json_encode($response);
?>
//source for password hash - https://github.com/ircmaxell/password_compat/blob/master/lib/password.php