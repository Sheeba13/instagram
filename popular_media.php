<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<?php
include('header.php');
?>
<body>
<div id="page">	
	<div id="head">
	   <div id="dp"><?php echo "<img src='".$_SESSION['profile_picture']."' />";?></div>
		 <div id="name"><p><?php echo $_SESSION['full_name'] ?></p></div>
		 <div id="logout"><a href="logout.php">logout</a></div>

	 </div>
     <div class="clear"></div>
 <?php
function get_instagram($user_id=966848152,$count=-1,$width=291,$height=291){

    $url = 'https://api.instagram.com/v1/users/'.$user_id.'/media/recent/?access_token='.$_SESSION['token'] .'&count='.$count;
    $jsonData = json_decode((file_get_contents($url)));
    $result = '<ul class="images">'.PHP_EOL;
    foreach ($jsonData->data as $key=>$value) {
        $result .= "\t".'<li><a href="'.$value->link.'"><img class="lazy" src="'.$value->images->standard_resolution->url.'" width="'.$width.'" height="'.$height.'" /></a></li>'.PHP_EOL;
    }
    $result .= '</ul>'.PHP_EOL;
    return $result;
}

echo get_instagram();
  ?>
  
</div>
</body>
</html>