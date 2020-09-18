<?php
session_start();
	require_once("/storage/vendor/autoload.php");
\EasyPost\EasyPost::setApiKey("EZTK88915930860f429da26a320e1c5e1c16YgDQlI8vXdqfV1xIAFZyCg");

if(isset($_POST['confirm']))
{
	$file = fopen("people.txt", "w") or die("Cannot open file!");
	$fwrite($file, $_POST['fname']);
}
else
{

	$street1 = $_POST["street1"];
	$street2 = $_POST["street2"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];

	$_SESSION['fname'] = $_POST["fname"];
	$_SESSION['lname'] = $_POST["lname"];
	$_SESSION['street1'] = $street1;
	$_SESSION['street2'] = $street2;
	$_SESSION['city'] = $city;
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

