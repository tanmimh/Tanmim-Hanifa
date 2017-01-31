<?php
	$con = mysqli_connect("localhost", "id679922_tanmimh", "football224", "id679922_travelpalsdb");

	$name = $_POST["name"];
	$username = $_POST["username"];
	$age = $_POST["age"];
	$password = $_POST["password"];

	$statement = mysqli_prepare($con, "INSERT INTO user (name, username, age, password) VALUES (?, ?, ?, ?)");
	mysqli_stmt_bind_param($statement), "siss", $name, $username, $age, $password);
	mysqli_stmt_execute($statement);

	$response = array();
	$resposne["success"] = true;

	echo json_encode($response);

?>