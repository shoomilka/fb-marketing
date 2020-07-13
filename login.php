<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include("header.php");
?>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '<?php echo $_ENV["FB_APP_ID"]; ?>',
                cookie     : true,
                xfbml      : true,
                version    : 'v7.0'
            });
            FB.AppEvents.logPageView();   
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    console.log(response.authResponse.accessToken);
                }
            });
        }
    </script>

    <fb:login-button 
        scope="public_profile, email"
        onlogin="checkLoginState();">
    </fb:login-button>

<?php
include("footer.php");
