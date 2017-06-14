<?php
// error_reporting(E_ALL);
// Same as error_reporting(E_ALL);
// ini_set('error_reporting', E_ALL);

  $host  = $_SERVER['HTTP_HOST'];
  $hostURI  = $_SERVER['REQUEST_URI'];
  $uri   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

  $fullURL = $host.$hostURI.$uri;

  $page = basename($_SERVER[ "PHP_SELF"]);
  $without_extension = basename($page, '.php');

  $qs = $_SERVER['QUERY_STRING'];
  $appendToURL = (strlen($qs) > 0) ? '?' . $qs : '';

  // var_dump($_COOKIE['rising']);

  // redirect if region cookie is found
  if($_COOKIE['rising'] === 'us') {
    // echo ' US cookie';
    header("Location: http://$host/us" . $appendToURL);
    // die();
  } else if($_COOKIE['rising'] === 'eu'){
    // echo ' EU cookie';
    header("Location: http://$host/europe" . $appendToURL);
    // die();
  }

?>