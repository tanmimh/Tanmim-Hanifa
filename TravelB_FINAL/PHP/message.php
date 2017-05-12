<?php
include 'dbconfig.php';



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$user_id=$_POST["user_id"];

$sql = "SELECT * FROM user1 INNER JOIN message ON user1.user_id=message.sender WHERE receiver='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows >0) {
 // output data of each row
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 //$tem["success"]=true
 
 $json = json_encode($tem);
 
 
 }
 
} else {
  $empty = array();
	

$json=json_encode($empty);
// echo "0 results";
}
 echo $json;
$conn->close();


?>