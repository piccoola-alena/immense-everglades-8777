<?php





  echo "Hello World";

<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject.js"></script>
<div id="fb-root"></div> <!-- Required by Facebook -->
 
<script type='text/javascript'>
 
    //Fired when the facebook sdk has loaded
    window.fbAsyncInit = function()
    {
        FB.init(
        {
          appId      : '1400569390162590',
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
                    }
                });
            }
        });
 
        function logUserName() //When we are logged in this shows our name.
        {
            FB.api('/me', function(meResponse)  //Do a graph request to /me
            {
                alert(meResponse.id + " " + meResponse.first_name); //Show the response
            });
        }
 
        function logFriends()   //When we are logged in this shows our friends.
        {
            FB.api('/me/friends', function(friendResponse) //Do a graph request to my friends.
            {
                for(var i = 0; i < friendResponse.data.length; i++) //Loop over all my friends
                    alert(friendResponse.data[i].id + " " + friendResponse.data[i].name);
            });
        }
 
    };
 
    //Load the Facebook JS SDK
    (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
    }(document));
 
</script>

  echo "Hello World";


?>