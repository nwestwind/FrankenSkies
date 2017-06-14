<?php
	// set cookie if one doesn't exist
	$saveOption = $_GET["select"];
	if (isset($saveOption) && ($saveOption == 'true')) {
		$number_of_days = 364;
		$date_of_expiry = time() + 60 * 60 * 24 * $number_of_days ;
		setcookie('skies', 'clear', $date_of_expiry, '/');
	}

	function auto_copyright($year = 'auto'){ 
		if(intval($year) == 'auto'){ $year = date('Y'); }
		if(intval($year) == date('Y')){ echo intval($year); }
		if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
		if(intval($year) > date('Y')){ echo date('Y'); }
	} 


	$page = basename($_SERVER[ "PHP_SELF"]);
	$without_extension = basename($page, '.php');

	switch ($without_extension) {
	case "404":
	  $without_extension = "server-404";
	  break;
	case "403":
	  $without_extension = "server-403";
	  break;
	case "index":
	  $without_extension = 'home';
	  break;
	}
?>