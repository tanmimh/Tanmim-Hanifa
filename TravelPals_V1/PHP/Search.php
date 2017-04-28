<?php
    $con = mysqli_connect("localhost", "jsusz001", "password", "jsusz001_TravelPals");

    $destination = $_POST["destination"];

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    $statement = mysqli_prepare($con, "SELECT * FROM myplan WHERE destination = ?");
    mysqli_stmt_bind_param($statement, "s", $destination);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $ID, $StartDate, $EndDate, $Destination);

    $response = array();
    $response["success"] = false;

    while(mysqli_stmt_fetch($statement)){
    	$response["success"] = true;
    	$response["id"] = $ID;
    	$response["startDate"] = $StartDate;
    	$response["endDate"] = $EndDate;
    	$response["destination"] = $Destination;
    }

    echo json_encode($response);
?>