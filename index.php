<?php
echo '<link href="style.css" rel="stylesheet">';
require 'instagram.class.php';
require 'config.php';
    $instagram = new Instagram(array(
    'apiKey'      => "2d5c374181fc4727a1254b694af6249d",
    'apiSecret'   => "3d796e21bf3e4cc5a7724404ac7e10f7",
    'apiCallback' => "http://localhost/instagram/redirect.php"
));

?>

<div id="login-page">

  <?php
    $loginUrl   = $instagram->getLoginUrl();
    echo "<a class=\"button\" href=\"$loginUrl\">Sign in with Instagram !</a>";
	
	?>
	
</div>