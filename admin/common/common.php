<?php

error_reporting(0);
require 'general.php';
$commonObj = new General();


//connection
if (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost') {
    $conn = mysqli_connect("localhost", "root", "", "educationdb");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
		//echo "sucessfully connected";
	}
}
function p($data, $exit = 1) {
    echo "<pre>";
    print_r($data);
    if ($exit == 1) {
        exit;
    }
}
?>