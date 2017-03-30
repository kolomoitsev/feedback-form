<?php
	session_start();
 
$string = "";
 
for ($i = 0; $i < 2; $i++) {
		$string .= chr(rand(97, 122)) . rand(1, 99);
	} 
$_SESSION['capcha_code'] = $string; 
$image = imagecreatetruecolor(200, 60); 
$black = imagecolorallocate($image, 10, 110, 0);
$color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255)); 
$bg = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255)); 
imagefilledrectangle($image,0,0,399,99,$bg); 
imagettftext ($image, 20, rand(-15, 15), 50, 40, $color, "verdana.ttf", $_SESSION['capcha_code']); 
header("Content-type: image/png");
imagepng($image);

?>