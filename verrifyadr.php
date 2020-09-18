<?php
session_start();
	require_once("/storage/vendor/autoload.php");
\EasyPost\EasyPost::setApiKey("KEY");

if(isset($_POST['confirm']))
{
	$file = fopen("people.txt", "w") or die("Cannot open file!");
	$fwrite($file, $_POST['fname']);
}
else
{
$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
$street1 = filter_var($_POST['street1'], FILTER_SANITIZE_STRING);
$street2 = filter_var($_POST['street2'], FILTER_SANITIZE_STRING);
$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
$state= filter_var($_POST['state'], FILTER_SANITIZE_STRING);
$zip= filter_var($_POST['zip'], FILTER_SANITIZE_STRING);
$country= filter_var($_POST['country'], FILTER_SANITIZE_STRING);
/*
	$street1 = $_POST["street1"];
	$street2 = $_POST["street2"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];
*/

	$_SESSION['fname'] = $fname
	$_SESSION['lname'] = $lname
	$_SESSION['street1'] = $street1;
	$_SESSION['street2'] = $street2;
	$_SESSION['city'] = $city;
	$_SESSION['state'] = $state;
	$_SESSION['zip'] = $zip;
	$_SESSION['country'] = $country;
		
	$address_params = array(
	"verify"  =>  array("delivery"),
	    "street1" => $_POST["street1"],
	    "street2" => $_POST["street2"],
	    "city"    => $_POST["city"],
	    "state"   => $_POST["state"],
	    "zip"     => $_POST["zip"],
	    "country" => $_POST["country"],
	);

	$address = \EasyPost\Address::create($address_params);
	$output = $address->verifications . "\n";
	$output2 = json_decode($output,true);

	$_SESSION['latitude'] = $output2['delivery']['details']['latitude'];
	$_SESSION['longitude'] = $output2['delivery']['details']['longitude'];
	echo nl2br("You are located at: \r\n");
	echo "Latitude: ".$output2["delivery"]["details"]["latitude"].nl2br("\r\n");
	echo "Longitude: ".$output2["delivery"]["details"]["longitude"].nl2br("\r\n");
	echo "At address: ".$street1.' '.$street2.', '.$city.', '.$state.', '.$zip.nl2br("\r\n");
	echo '
	<form action="./recorddata.php" method="post">
	<input type="submit" value="confirm">
	';
}

#	var_dump($output2); //debug
#	echo "_________________\n"; //debug
#	echo $output2["delivery"]["success"]; //debug
?>
