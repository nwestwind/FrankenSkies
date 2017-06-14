<?php 
error_reporting(E_ALL);
// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

	$host  = $_SERVER['HTTP_HOST'];
	$hostURI  = $_SERVER['REQUEST_URI'];
	$uri   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
	
	$value = $_GET["enter"];

	$fullURL = $host.$hostURI.$uri;

	$number_of_days = 364;
	$date_of_expiry = time() + 60 * 60 * 24 * $number_of_days ;


// set cookie if one doesn't exist
	if (!isset($_COOKIE['rising']) && $value == 'us') {
		 header("Set-Cookie: rising=us; expires=Tue, 06-Jan-2017 23:39:49 GMT; path=/;");

		// setcookie('rising', $value, $date_of_expiry, '/');
	} else if (!isset($_COOKIE['rising']) && $value == 'eu') {
		 		 header("Set-Cookie: rising=eu; expires=Tue, 10-Mar-2017 23:39:49 GMT; path=/;");

		// setcookie('rising', $value, $date_of_expiry, '/');
	} else {
		echo 'no cookie ';
	}


// redirect if region cookie is found
	if($_COOKIE['rising'] == 'us') {
		echo ' US cookie';
		// header("Location: http://$host$uri/");
		// die();
	} else if($_COOKIE['rising'] == 'eu'){
		echo ' EU cookie';
		// header("Location: http://$host$uri/europe");
		// die();
	} else {		
		echo ' no cookie was set';
		// header("Location: http://$host$uri/splash.php");
		// die();
	}

var_dump($_COOKIE);


	$page = basename($_SERVER[ "PHP_SELF"]);
	$without_extension = basename($page, '.php');

	switch ($without_extension) {
		case "404":
			$without_extension = "server-404";
		break;
		case "403":
			$without_extension = "server-403";
		break;
	}
 
?>
