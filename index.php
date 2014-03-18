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

    'scope'         => 'email,offline_access,read_mailbox'

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

print_r($tokenInfo);

   if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {

        $params = array('access_token' => $tokenInfo['access_token']);



        $userInfo = json_decode(file_get_contents('https://graph.facebook.com/me' . '?' . urldecode(http_build_query($params))), true);
      //  if (isset($userInfo)) {
	           // $userInfo = $userInfo['response'][0];
	      //      $userinfo_flag = true;
	       // }


echo 'USERINFO';
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
	        
	        
	        print_r($userInfo['work'])
     foreach ($userInfo['work'] as $work)
 	         echo "Работа: " ;  print_r($work['name']);  echo '<br />';
	         
// 	          echo "Website: " . $userInfo['website'] . '<br />';
// 	         //  foreach ($userInfo['education'] as $education)
// 	       //   echo "Образование: ";  print_r($education['education']); echo '<br />';
	          
	          
// 	      //  echo '<img src="' . $userInfo['photo_big'] . '" />'; echo "<br />";
// 	 //   }

// print_r($userInfo);

// $statusInfo = json_decode(file_get_contents('https://graph.facebook.com/me/statuses' . '?' . urldecode(http_build_query($params))), true);
// echo 'STATUS';
// print_r($statusInfo);

// echo "Статус: " . $userInfo['message'] . '<br />';
// echo "Дата обновления: " . $userInfo['updated_time'] . '<br />';


// $noteInfo = json_decode(file_get_contents('https://graph.facebook.com/me/note' . '?' . urldecode(http_build_query($params))), true);
// echo 'NOTE';
// print_r($noteInfo);
// echo "Заголовок: " . $userInfo['subject'] . '<br />';
// echo "Текст: " . $userInfo['message'] . '<br />';
// echo "Дата создания: " . $userInfo['created_time'] . '<br />';


// $friendInfo = json_decode(file_get_contents('https://graph.facebook.com/me/friends' . '?' . urldecode(http_build_query($params))), true);
// echo 'FRIENDS';
// print_r($friendInfo);
// echo "Социальный ID пользователя: " . $userInfo['id'] . '<br />';
// echo "Имя пользователя: " . $userInfo['name'] . '<br />';



// $albumsInfo = json_decode(file_get_contents('https://graph.facebook.com/me/albums' . '?' . urldecode(http_build_query($params))), true);
// echo 'ALBUMS';
// print_r($albumsInfo);

// foreach ( $albumsInfo as $album)
// {
// 	echo "Название: " . $album['name'] . '<br />';
// 	echo "Описание: " . $album['description'] . '<br />';
// 	echo "Количество фотографий: " . $album['count'] . '<br />';
// 	echo "Ссыдка: " . $album['link'] . '<br />';
// 	echo "Конфиденциальность: " . $album['privacy'] . '<br />';

// 		echo 'COMMENTS';	
// 		foreach ($album['comments'] as $comment)
// 		{
			
// 			echo "Автор: " . $comment['from']['name'] . $comment['from']['name'] . '<br />';
// 			echo "Дата: " . $comment['created_time'] . '<br />';
// 			echo "Текст: " . $comment['message'] . '<br />';
// 		}
		
// 		echo 'LIKES';	
// 		foreach ($album['likes'] as $like)
// 		echo "Автор: " . $like['from']['name'] . $like['from']['name'] . '<br />';

// }


// $mailInfoin = json_decode(file_get_contents('https://graph.facebook.com/me/inbox' . '?' . urldecode(http_build_query($params))), true);

// echo 'INBOX';
// print_r($mailInfoin);


// $mailInfoout = json_decode(file_get_contents('https://graph.facebook.com/me/inbox' . '?' . urldecode(http_build_query($params))), true);

// echo 'OUTBOX';
// print_r($mailInfoout);


// $postsInfo = json_decode(file_get_contents('https://graph.facebook.com/me/posts' . '?' . urldecode(http_build_query($params))), true);
// echo 'POSTS';
// print_r($albumsInfo);

// $linksInfo = json_decode(file_get_contents('https://graph.facebook.com/me/links' . '?' . urldecode(http_build_query($params))), true);
// echo 'LINKS';
// print_r($linksInfo);

// $picturesInfo = json_decode(file_get_contents('https://graph.facebook.com/me/picture' . '?' . urldecode(http_build_query($params))), true);
// echo 'PICTURE';
// print_r($picturesInfo);

// $photosInfo = json_decode(file_get_contents('https://graph.facebook.com/me/photo' . '?' . urldecode(http_build_query($params))), true);
// echo 'PHOTO';
// print_r($$photosInfo);


// $outboxInfo = json_decode(file_get_contents('https://graph.facebook.com/me/outbox' . '?' . urldecode(http_build_query($params))), true);
// echo 'OUTBOX';
// print_r($outboxInfo);

// foreach ( $outboxInfo as $outbox)
// {
// echo "От кого: " . $outbox['from']['name'] . $outbox['from']['id'] . '<br />';

// foreach ( $outbox['to'] as $tomess)
// echo "Кому: " . $tomess['name'] . $tomess['id'] . '<br />';
// echo "Текст: " . $outbox['message'] . '<br />';
// echo "Дата: " . $outbox['created_time'] . '<br />';

// foreach ( $outbox['comments'] as $comment)
// echo "Автор: " . $comment['from']['name'] . $comment['from']['name'] . '<br />';
// echo "Дата: " . $comment['created_time'] . '<br />';
// echo "Текст: " . $comment['message'] . '<br />';
// }
// }

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
