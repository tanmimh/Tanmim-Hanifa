<?php

include 'dbconfig.php';
$conn = new mysqli($servername, $username, $password, $dbname);


    
    $destination = $_POST['destination'];
    
    $sql = "SELECT * FROM plans WHERE  destination = '$destination'";
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