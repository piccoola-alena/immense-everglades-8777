<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');

echo "Hello World";

echo "Hello World";
echo "Hello World";


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


echo 'USERINFO';
print_r($userInfo);


 $mailInfo = json_decode(file_get_contents('https://graph.facebook.com/me/inbox' . '?' . urldecode(http_build_query($params))), true);

echo 'INBOX';
print_r($mailInfo);

        if (isset($userInfo['id'])) {

            $userInfo = $userInfo;

            $result = true;

        }
        
        
       if (isset($mailInfo['id'])) {

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
