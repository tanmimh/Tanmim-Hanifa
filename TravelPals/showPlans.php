<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connection.php';
	showPlan();
	}
	
function showPlan(){
	global $link;
	
	$query = "SELECT destination , startDate , endDate, description FROM myplan WHERE user_id = '1'; ";
	
	$result = mysqli_query($link, $query);
	
?>