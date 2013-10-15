<?php
require '/facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
 'appId'  => '236528216480691',
  'secret' => 'ef0169cd4eebb072e00e0d597ff2c7af',
));
// Get User ID
$user = $facebook->getUser();




  
    $me = $facebook->api('/me');  
          
     $messages = $facebook->api(array(  
            'method' => 'fql.query',  
            'query' => 'SELECT body,author_id,created_time FROM message'
        ));  
      
    ?>  


