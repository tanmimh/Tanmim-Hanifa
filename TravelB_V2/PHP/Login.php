
<?php
    require("password.php");

    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user1 WHERE username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $colUserID, $colEmail, $colGender, $colName, $colDob, $colPassword, $colUsername);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)) {
            $response["success"] = true;
            $response["user_id"] = $colUserID;
            $response["email"] = $colEmail;
            $response["gender"] = $colGender;
            $response["name"] = $colName;
            $response["dob"] = $colDob;
            $response["username"] = $colUsername;  
        }
    }

    echo json_encode($response);
?>

<!-- <?php
    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $name,  $username,$age, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true; 
        $response["user_id"] = $user_id;

        $response["name"] = $name;
        $response["age"] = $age;
        $response["username"] = $username;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>
 -->
