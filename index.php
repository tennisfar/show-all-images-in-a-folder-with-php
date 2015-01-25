<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<title>Show images in folder</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
<?php
date_default_timezone_set("Europe/Copenhagen");
$imagefolder = 'img/';
$imagetypes = '{*.jpg,*.JPG,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';
$images = glob($imagefolder.$imagetypes, GLOB_BRACE);
$count = count($images);
 
$sortedImages = array();
for ($i = 0; $i < $count; $i++) {
    $sortedImages[date ('YmdHis', filemtime($images[$i])) . $i] = $images[$i];
}
 
#ksort($sortedImages);
krsort($sortedImages);

echo '<table>';
foreach ($sortedImages as $image) {
    echo '<tr><td>';
    echo '<a name="'.$image.'" href="#'.$image.'"><img src="'.$image.'" /></a>';
    echo substr($image,strlen($imagefolder),strpos($image, '.')-strlen($imagefolder));
    echo '</td></tr>';
}
echo '</table>';
?>
</body>
</html>
