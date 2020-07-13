<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include("header.php");
?>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({ cache: true });
            $.getScript('https://connect.facebook.net/en_US/sdk.js', function(){
                FB.init({
                    appId: '<?php echo $_ENV["FB_APP_ID"]; ?>',
                    version: 'v7.0'
                });     
                $('#loginbutton, #feedbutton').removeAttr('disabled');
                FB.getLoginStatus(updateStatusCallback);
            });

            function updateStatusCallback(){
                alert('Status updated!!');
            }
        });
    </script>

    <button id="loginbutton">Login via FB</button>
<?php
include("footer.php");
