<?php
include 'dbconfig.php';



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$userID= $_POST['user_id'];

$sql = "SELECT * FROM plans WHERE user_id= '$userID' ";
$result = $conn->query($sql);

if ($result->num_rows >0) {
 // output data of each row
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
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