<?php
/**
* Copyright 2011 Facebook, Inc.
*
* Licensed under the Apache License, Version 2.0 (the "License"); you may
* not use this file except in compliance with the License. You may obtain
* a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
* WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
* License for the specific language governing permissions and limitations
* under the License.
*/

require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId' => '1400569390162590',
  'secret' => '905279329d9655c570a3f35e14b0113a',
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl();
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>php-sdk</title>
<style>
body {
font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
}
h1 a {
text-decoration: none;
color: #3b5998;
}
h1 a:hover {
text-decoration: underline;
}
</style>
</head>
<body>
<h1>php-sdk</h1>

<?php if ($user): ?>
<a href="<?php echo $logoutUrl; ?>">Logout</a>
<?php else: ?>
<div>
Check the login status using OAuth 2.0 handled by the PHP SDK:
<a href="<?php echo $statusUrl; ?>">Check the login status</a>
</div>
<div>
Login using OAuth 2.0 handled by the PHP SDK:
<a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
</div>
<?php endif ?>

<h3>PHP Session</h3>
<pre><?php print_r($_SESSION); ?></pre>

<?php if ($user): ?>
<h3>You</h3>
<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

<h3>Your User Object (/me)</h3>
<pre><?php print_r($user_profile); ?></pre>
<?php else: ?>
<strong><em>You are not Connected.</em></strong>
<?php endif ?>

<h3>Public profile of Naitik</h3>
<img src="https://graph.facebook.com/naitik/picture">
<?php echo $naitik['name']; ?>
</body>
</html>


// <?php

//   include_once "facebook.php";

//   $app_id = '1400569390162590'; //  Update your app id
//   $app_secret = '905279329d9655c570a3f35e14b0113a'; //  Update your app id
//   $my_url = 'http://immense-everglades-8777.herokuapp.com//index.php' // Give absolute path of current file

//   $code = $_REQUEST["code"];
  
  
//   	function db_insert($insert_query)
// 		{
// 		// Instantiate the mysqli class
// 		$mysqli = new mysqli();
		

// //		Provide your DB credentials here

// 		// Connect to the database server and select a database
// 		$mysqli->connect('your db server', 'your db id', 'your password', 'your db name');
	
// 		//Execute query 

// 		$result = $mysqli->query($insert_query);

// 		//commit
// 		$commit = $mysqli->commit();
	
// 	    	// Close the connection
//     		$mysqli->close();    		
 		
// 		}

// ?>

// <!DOCTYPE html>
// <html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
//     <head>
//         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
//         <title>Purple BI: Facebook Data Extraction & Analytics </title>
// </head> 
// <body> 
// 	<h2>Facebook Data Extraction using FQL</h2> 
	
// 	<h3>Retrieves and saves friends details to database</h3> 

// <?php


 
//  //auth user
//  if(empty($code)) {
//     $dialog_url = 'https://www.facebook.com/dialog/oauth?client_id=' 
//     . $app_id . '&redirect_uri=' . urlencode($my_url) ;
//     echo("<script>top.location.href='" . $dialog_url . "'</script>");
//   }

//   //get user access_token
//   $token_url = 'https://graph.facebook.com/oauth/access_token?client_id='
//     . $app_id . '&redirect_uri=' . urlencode($my_url) 
//     . '&client_secret=' . $app_secret 
//     . '&code=' . $code;
//   $access_token = file_get_contents($token_url);
 
//   // Run fql query
//   $fql_query_url = 'https://graph.facebook.com/'
//     . '/fql?q=SELECT+uid,+first_name,+last_name+FROM+user+WHERE+uid+in+(SELECT+uid2+FROM+friend+WHERE+uid1=me())'
//     . '&' . $access_token;
//   $fql_query_result = file_get_contents($fql_query_url); // Reading file output to a string
//   $fql_query_obj = json_decode($fql_query_result, true); // Converting string to an array

//   $count = count($fql_query_obj[data]);

//   print_r("Number of friends retrieved : ");

//   print_r($count);


// //      Prepare insert query string	
// 	$query = "INSERT INTO friends_name(first_name, last_name, uid) VALUES ('Nawendu','Bharti', 1),";
	
// 	for ($i = 0; $i < $count; $i++) {
//     	$query .= '(' . "'" . $fql_query_obj[data][$i]['first_name'] . "'" . ',' . "'" . $fql_query_obj[data][$i]['last_name'] . "'" . ',' . $fql_query_obj[data][$i]['uid'] . ')' ;
//     	  	if ( $i !==$count -1 ) $query.= ', '; 
// 		}

// // Making a call to insert function
// 	db_insert($query);


// 	echo '<a href="http://nawendubharti.com"><p>Go back to Purple BI</a>';

// ?>

// </body> 
// </html>


