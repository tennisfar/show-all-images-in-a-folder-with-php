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
$folder = 'img/';
$filetype = '{*.jpg,*.JPG,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';
$files = glob($folder.$filetype, GLOB_BRACE);
$count = count($files);
 
$sortedArray = array();
for ($i = 0; $i < $count; $i++) {
    $sortedArray[date ('YmdHis', filemtime($files[$i])) . $i] = $files[$i];
}
 
ksort($sortedArray);
#krsort($sortedArray);

echo '<table>';
foreach ($sortedArray as $filename) {
    echo '<tr><td>';
    echo '<a name="'.$filename.'" href="#'.$filename.'"><img src="'.$filename.'" /></a>';
    echo substr($filename,strlen($folder),strpos($filename, '.')-strlen($folder));
    echo '</td></tr>';
}
echo '</table>';
?>
</body>
</html>
