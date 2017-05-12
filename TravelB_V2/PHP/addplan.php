

<?php
    $con = mysqli_connect("localhost", "id899753_groupel", "travel", "id899753_travelb");
    
    $user_id = $_POST["user_id"];
    $date = $_POST["date"];
    $destination = $_POST["destination"];
	
	
	$sql = "SELECT * FROM plans WHERE user_id= '$user_id' ";
$result = $con->query($sql);

if ($result->num_rows <3) {

    $statement = mysqli_prepare($con, "INSERT INTO plans ( destination,date,user_id) VALUES (?,?,?) ");
    mysqli_stmt_bind_param($statement, "ssi", $destination,$date,$user_id);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
   echo json_encode($response);
}
?>