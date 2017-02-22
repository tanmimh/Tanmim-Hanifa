<?php

// define a connection 'handle'
$link = mysqli_connect(
    'localhost',
    'jsusz001',
    'password',
    'jsusz001_TravelPals'
);

// check connection succeeded
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
    echo "Connection error";
}

?>
