<?php
session_start();
 ?>
<?php





require 'instagram.class.php';
require 'config.php';

$instagram = new Instagram(array(
    'apiKey'      => "2d5c374181fc4727a1254b694af6249d",
    'apiSecret'   => "3d796e21bf3e4cc5a7724404ac7e10f7",
    'apiCallback' => "http://localhost/instagram/redirect.php"
));

function fetchData($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
  $result = curl_exec($ch);
  curl_close($ch); 
  return $result;
}
$code = $_GET['code'];
if (true === isset($code))
{
    $data = $instagram->getOAuthToken($code);
    $_SESSION['token'] = $data->access_token;
    $_SESSION['profile_picture'] = $data->user->profile_picture;
    $_SESSION['full_name'] = $data->user->full_name;
    
    header('Location: popular_media.php');
}
?>


</body>