<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
create_image();
print "<img src=image.gif>";

function  create_image(){
	$my_img = @imagecreate(200, 80) or die("Cannot generate image stream");
	$background = imagecolorallocate( $my_img, 0, 0, 255 );
	$text_colour = imagecolorallocate( $my_img, 255, 255, 0 );
	$background_color = imagecolorallocate($my_img, 255, 255, 0);  // yellow
	$text_colour = imagecolorallocate( $my_img, 255, 255, 0 );
	imagestring( $my_img, 4, 30, 25, "westudyathome.com", $text_colour );
	imagepng($my_img,"image.gif");
	imagedestroy($my_img);
}
?>

</body>
</html>
