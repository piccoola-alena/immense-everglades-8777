<?php

echo "Hello World";

echo "Hello World";
echo "Hello World";


$sApplicationId = '1400569390162590';
$sApplicationSecret = '905279329d9655c570a3f35e14b0113a';
$iLimit = 99;


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
        });
 
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
