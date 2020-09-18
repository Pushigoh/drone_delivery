<?php
	session_start();
	$storageFile = "files/people.txt";

	echo $_SESSION['fname']; //debug
	echo nl2br("\r\n"); //debug
	echo $_SESSION['lname']; //debug
	echo nl2br("\r\n"); //debug
	echo $_SESSION['longitude']; //debug
	echo nl2br("\r\n"); //debug
	echo $_SESSION['latitude']; //debug
	echo nl2br("\r\n"); //debug

	$fname = $_SESSION['fname']; 
	$lname = $_SESSION['lname']; 
	$street1 = $_SESSION['street1']; 
	$street2 = $_SESSION['street2']; 
	$city = $_SESSION['city']; 
	$state = $_SESSION['state']; 
	$zip = $_SESSION['zip']; 
	$country = $_SESSION['country']; 
	$longitude = $_SESSION['longitude'];
	$latitude = $_SESSION['latitude']; 

	file_put_contents($storageFile, $fname."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $lname."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $street1."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $street2."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $city."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $state."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $zip."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $country."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $longitude."\r\n", FILE_APPEND);
	file_put_contents($storageFile, $latitude."\r\n", FILE_APPEND);

?>
