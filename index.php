<html>
<head></head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=1400569390162590";
  fjs.parentNode.insertBefore(js, fjs);
  
//   FB.getLoginStatus(function(response) {
//   if (response.status === 'connected') {
  
//   <?php
// echo "mmmmmm";  
// ?>
// }

}(document, 'script', 'facebook-jssdk'));


</script>


<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>


 

</body>
</html>


<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');


$sApplicationId = '1400569390162590';
$sApplicationSecret = '905279329d9655c570a3f35e14b0113a';
$iLimit = 99;
$redirect_uri = 'http://immense-everglades-8777.herokuapp.com/index.php';


$url = 'https://www.facebook.com/dialog/oauth';

$params = array(

    'client_id'     => $sApplicationId,

    'redirect_uri'  => $redirect_uri,

    'response_type' => 'code',

    'scope'         => 'email,offline_access,read_mailbox,basic_info,user_photos,friends_photos,publish_stream,read_stream,user_notes,'

);


echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Go to user Facebook</a></p>';


if (isset($_GET['code'])) {

    $result = false;
    $userinfo_flag = false;


    $params = array(

        'client_id'     => $sApplicationId,

        'redirect_uri'  => $redirect_uri,

        'client_secret' => $sApplicationSecret,

        'code'          => $_GET['code'],
        
   

    );
    
  //  $button->click_by_name("__CONFIRM__");////проверить
    
    $url = 'https://graph.facebook.com/oauth/access_token';



$tokenInfo = null;

parse_str(file_get_contents($url . '?' . http_build_query($params)), $tokenInfo);

//print_r($tokenInfo);

   if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {

        $params = array('access_token' => $tokenInfo['access_token']);



        $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);
      //  if (isset($userInfo)) {
	           // $userInfo = $userInfo['response'][0];
	      //      $userinfo_flag = true;
	       // }


  


  

//echo 'USERINFO';
 // if ($userinfo_flag) {
	        echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
	        echo "Имя пользователя: " . $userInfo['first_name'] . '<br />';
	           echo "Фамилия пользователя: " . $userInfo['last_name'] . '<br />';
	        echo "Ссылка на профиль пользователя: " . $userInfo['link'] . '<br />';
	        echo "Пол пользователя: " . $userInfo['gender'] . '<br />';
	        echo "День Рождения: " . $userInfo['birthday'] . '<br />';
	        echo "О себе: " . $userInfo['about'] . '<br />';
	           echo "Email: " . $userInfo['email'] . '<br />';
	          echo "Имя пользователя: " . $userInfo['username'] . '<br />';
	        
	        
	         echo "Имя пользователя: " . $userInfo['work']. '<br />';
	         
	        // $size = count($userInfo['work']['data']);
 //foreach ($userInfo['work']['data'] as $work)
 //echo "Работа: " . $work['']; 
 //
 //echo "Работа: " ;  echo $userInfo['work'][$i];  echo '<br />';
	         
	          echo "Website: " . $userInfo['website'] . '<br />';
// 	         //  foreach ($userInfo['education'] as $education)
// 	       //   echo "Образование: ";  print_r($education['education']); echo '<br />';
	          
	          
// 	      //  echo '<img src="' . $userInfo['photo_big'] . '" />'; echo "<br />";
// 	 //   }

// print_r($userInfo);
 echo '<br />';
 echo "_________________________________________________";
  echo '<br />';
 
 $statusInfo = json_decode(file_get_contents('https://graph.facebook.com/me/statuses' . '?' . urldecode(http_build_query($params))), true);
 echo 'STATUS';
 echo '<br />';
 //print_r($statusInfo);

foreach ($statusInfo['data'] as $status)
{
echo "Статус: " . $status['message'] . '<br />';
echo "Дата обновления: " . $status['updated_time'] . '<br />';
}

echo '<br />';
 echo "_________________________________________________";
  echo '<br />';
 
 $noteInfo = json_decode(file_get_contents('https://graph.facebook.com/me/notes' . '?' . urldecode(http_build_query($params))), true);
 echo 'NOTE';
 echo '<br />';
 //print_r($noteInfo);

foreach ($noteInfo['data'] as $note)
{ 
	echo  "Автор: " . $note['from']['name'] . ' (' . $note['from']['id']. ')'.'<br />';
 echo "Заголовок: " . $note['subject'] . '<br />';
 echo "Текст: " . $note['message'] . '<br />';
 echo "Дата создания: " . $note['created_time'] . '<br />';
}

echo '<br />';
 echo "_________________________________________________";
  echo '<br />';
 
 $friendInfo = json_decode(file_get_contents('https://graph.facebook.com/me/friends' . '?' . urldecode(http_build_query($params))), true);
  echo 'FRIENDS';
 echo '<br />';
 //print_r($friendInfo);
 
   // print_r( $friendInfo['data']);
    foreach ($friendInfo['data'] as $friend)
   echo $friend['name'] . ' (' .  $friend['id'] . ') '. '<br />' ;


echo '<br />';
 echo "_________________________________________________";
 
 echo '<br />';
  $albumsInfo = json_decode(file_get_contents('https://graph.facebook.com/me/albums' . '?' . urldecode(http_build_query($params))), true);
  echo 'ALBUMS';
  echo '<br />';
// print_r($albumsInfo);

 foreach ( $albumsInfo['data'] as $album)
 {
 	echo "Название: " . $album['name'] . '<br />';
 	echo "Описание: " . $album['description'] . '<br />';
 	echo "Количество фотографий: " . $album['count'] . '<br />';
 	echo "Ссыдка: " . $album['link'] . '<br />';
 	echo "Конфиденциальность: " . $album['privacy'] . '<br />';


 		echo 'COMMENTS';
 		 echo '<br />';
		foreach ($album['comments']['data'] as $comment)
 		{
			
 			echo "Автор: " . $comment['from']['name'] . $comment['from']['name'] . '<br />';
 			echo "Дата: " . $comment['created_time'] . '<br />';
 			echo "Текст: " . $comment['message'] . '<br />';
		}
		
 		echo 'LIKES';	
 		 echo '<br />';
 		foreach ($album['likes'] as $like)
 		echo "Автор: " . $like['from']['name'] . $like['from']['name'] . '<br />';
 		echo '<br />';

 }

//echo '<br />';
// echo "_________________________________________________";
 // echo '<br />';
 
 $photosInfo = json_decode(file_get_contents('https://graph.facebook.com/me/photos'. '?' . urldecode(http_build_query($params))), true);
// echo 'PHOTOS';
 echo '<br />';
 //print_r($photosInfo); 

foreach ($photosInfo['data'] as $album)
{
echo "id: " . $album['id'] . '<br />';
echo "Ссылка: " . $album['link'] . '<br />';
echo '<img src="' . $album['picrure'] . '" />'; echo "<br />";;

	echo 'LIKES';
	
	echo '<br />';
	print_r($album['likes']);
 		foreach ($album['likes']['data'] as $like)
 		echo "Автор: " . $like['from']['name'] . $like['from']['name'] . '<br />';
 		
 			echo 'COMMENTS';
 			echo '<br />';
		foreach ($album['comments']['data'] as $comment)
 		{
			
 			echo "Автор: " . $comment['from']['name'] . $comment['from']['name'] . '<br />';
 			echo "Дата: " . $comment['created_time'] . '<br />';
 			echo "Текст: " . $comment['message'] . '<br />';
		}
echo '<br />';
}

echo '<br />';
 echo "_________________________________________________";
  echo '<br />';
 

$mailInfoin = json_decode(file_get_contents('https://graph.facebook.com/me/inbox' . '?' . urldecode(http_build_query($params))), true);

  echo 'INBOX';
  echo '<br />';
  
  foreach ($mailInfoin['data'] as $inbox)
  {
  	echo "Участники: " ;
  	foreach ($inbox['to']['data'] as $people)
  		echo $people['name'] . $people['id'] . '<br />';
  	echo "Диалог: " ;
  	foreach ($inbox['comments']['data'] as $mess)
  	{
  		echo $mess['from']['name'] . ' '. $mess['created_time'] . '  ' . $mess['message'] . '<br />';	
  	}
  	echo '<br />';
  }
//print_r($mailInfoin);
echo '<br />';
 echo "_________________________________________________";
  echo '<br />';

 $mailInfoout = json_decode(file_get_contents('https://graph.facebook.com/me/outbox' . '?' . urldecode(http_build_query($params))), true);

 echo 'OUTBOX';
 echo '<br />';
// print_r($mailInfoout);

  foreach ($mailInfoout['data'] as $outbox)
  {
  	echo "Участники: " ;
  	foreach ($outbox['to']['data'] as $people)
  		echo $people['name'] . $people['id'] . '<br />';
  	echo "Диалог: " ;
  	foreach ($outbox['comments']['data'] as $mess)
  	{
  		echo $mess['from']['name'] . '  ' .$mess['created_time'] . '  ' .$mess['message'] . '<br />';	
  	}
  	echo '<br />';
  }
//print_r($mailInfoin);

echo '<br />';
 echo "_________________________________________________";
  echo '<br />';
 
 $postsInfo = json_decode(file_get_contents('https://graph.facebook.com/me/posts' . '?' . urldecode(http_build_query($params))), true);
 echo 'POSTS';
 echo '<br />';
 
 foreach ($postsInfo['data'] as $post)
  {
  		echo $post['from']['name'] . ' ('. $post['from']['id'] . ')' .'<br />';
  		echo $post['name'] .'<br />';
  			echo $post['description'] .'<br />';
  			echo $post['type'] .'<br />';
  			echo $post['created_time'] .'<br />';
  				echo $post['message'] .'<br />';
  					echo  '<img src="' . $post['picture'] . '" />'. '<br />';
  						echo $post['story'] .'<br />';
  				
  		$postscom = json_decode(file_get_contents('https://graph.facebook.com/me/posts/comments' . '?' . urldecode(http_build_query($params))), true);
 echo 'comments';
 echo '<br />';
 print_r($postscom); 
 
 	foreach ($postscom as $comment)
 		{
			
 			echo "Автор: " . $comment['from']['name'] . ' (' . $comment['from']['id'] .')'. '<br />';
 			echo "Дата: " . $comment['created_time'] . '<br />';
 			echo "Текст: " . $comment['message'] . '<br />';
		}
		$postslike = json_decode(file_get_contents('https://graph.facebook.com/me/posts/likes' . '?' . urldecode(http_build_query($params))), true);

		echo 'LIKES';	
 		 echo '<br />';
 		foreach ($postslike['data'] as $like)
 		echo "Автор: " . $like['from']['name'] . $like['from']['id'] . '<br />';

 
  }
// print_r($albumsInfo);
echo '<br />';
 echo "_________________________________________________";
  echo '<br />';
 
//$linksInfo = json_decode(file_get_contents('https://graph.facebook.com/me/likes' . '?' . urldecode(http_build_query($params))), true);
// echo 'LINKS';
// print_r($linksInfo);

 //$picturesInfo = json_decode(file_get_contents('https://graph.facebook.com/me?fields=picture' . '?' . urldecode(http_build_query($params))), true);
 //echo 'PICTURE';
 //print_r($picturesInfo);
 //echo '<br />';
 //echo "_________________________________________________";
 // echo '<br />';
 
 $eventsInfo = json_decode(file_get_contents('https://graph.facebook.com/me/events' . '?' . urldecode(http_build_query($params))), true);
 echo 'EVENTS';
 print_r($eventsInfo);


// $checkinInfo = json_decode(file_get_contents('https://graph.facebook.com/{photo-id}' . '?' . urldec{photo-id}de(http_build_query($params))), true);
 //echo 'Check-in';
// print_r($checkinInfo);


        if (isset($userInfo['id'])) {

            $userInfo = $userInfo;

            $result = true;

        }
        
        
       if (isset($mailInfoin['id'])) {

            $mailInfo = $mailInfo;

            $result = true;

        }
        
          if (isset($mailInfoout['id'])) {

            $mailInfo = $mailInfo;

            $result = true;

        }
        

    }

}


// $query = file_get_contents("https://graph.facebook.com/oauth/access_token?".
//        "client_id=$sApplicationId&".
//        "redirect_uri=http://immense-everglades-8777.herokuapp.com/index.php&".
//        "client_secret=$sApplicationSecret&".
//        "code=$code");
// parse_str($query);
// $me = json_decode(file_get_contents('https://graph.facebook.com/me?'.
//      'access_token='.$access_token),true);
// if (array_key_exists('id',$me)) {

// # Авторизация прошла. Запоминаем access_token
// #
// ...

// } else {
// # Авторизация не прошла
// }
?>

<script src="http://connect.facebook.net/en_US/all.js"></script>


<div id="fb-root"></div>
<script>

  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '1400569390162590',   
      channelUrl : '//http://immense-everglades-8777.herokuapp.com//channel.html',
      status     : true,                               
      xfbml      : true                                 
    });

   FB.init(
        {
          appId      : '171298766297727',
          status     : true, // check login status
          cookie     : true, // enable cookies to allow the server to access the session
          oauth      : true, // enable OAuth 2.0
          xfbml      : false // dont parse XFBML
        });
 
 
 
        //Get the current login status.
        FB.getLoginStatus(function(loginStatusResponse)
        {
            
            
            
            if(loginStatusResponse.authResponse) //There is an authresponse, the user is already logged in and authenticated
            {
                logUserName();
                logFriends();
 
            } else { //The user was not logged in, allow him to.
                FB.login(function(loginResponse)
                {
                    if(loginResponse.authRespsonse) //Did he login successfully?
                    {
                        logUserName();
                        logFriends();
                        logMesages();
                    }
                });
            }
        }
        ,
        {scope: 'email,user_likes'});
 
        function logUserName() //When we are logged in this shows //our name.
        {
        
<?php
$file = fopen("12.txt","a+"); 
?>



            FB.api('/me', function(meResponse)  //Do a graph //request to /me
            {
                alert(meResponse.id + " " + meResponse.first_name); //Show the response
                
                
                //записать в файл
                 <?php
                $mytext = meResponse.first_name; // Исходная строка
                
               
                $test = fwrite($fp, $mytext); // Запись в файл
                if ($test) echo 'Данные в файл успешно занесены.';
                else echo 'Ошибка при записи в файл.';
                fclose($fp); //Закрытие файла
                ?>

            });
        }
 
        function logFriends()   //When we are logged in this //shows our friends.
        {
            FB.api('/me/friends', function(friendResponse) //Do a //graph request to my friends.
            {
                for(var i = 0; i < friendResponse.data.length; i++) //Loop over all my friends
                    alert(friendResponse.data[i].id + " " + friendResponse.data[i].name);
            });
        }
 
  };



  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
