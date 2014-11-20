<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<title>Show images in folder</title>
<link rel="stylesheet" type="text/css" href="show-images-unordered.css">
</head>
<body>
 
<?php
date_default_timezone_set("Europe/Copenhagen");
$folder = 'img/';
$filetype = '*.*';
$files = glob($folder.$filetype);
$count = count($files);
 
$sortedArray = array();
for ($i = 0; $i < $count; $i++) {
    $sortedArray[date ('YmdHis', filemtime($files[$i])) . $i] = $files[$i];
}
 
ksort($sortedArray);
# krsort($sortedArray);

/*
echo '<table>';
foreach ($sortedArray as $filename) {
    echo '<tr><td>';
    echo '<a name="'.$filename.'" href="#'.$filename.'"><img src="'.$filename.'" /></a>';
    echo substr($filename,strlen($folder),strpos($filename, '.')-strlen($folder));
    echo '</td></tr>';
}
echo '</table>';
*/
?>

<div class="container">
	<div class="row">
		<img src="img/john315.jpg">
		<img src="img/john318.jpg">
		<img src="img/john319.jpg">
		<img src="img/john324.jpg">
		<img src="img/john337.jpg">
		<img src="img/john315.jpg">
		<img src="img/john318.jpg">
		<img src="img/john319.jpg">
		<img src="img/john324.jpg">
		<img src="img/john337.jpg">
		<img src="img/john337.jpg">
		<img src="img/john315.jpg">
		<img src="img/john318.jpg">
		<img src="img/john319.jpg">
		<img src="img/john324.jpg">
		<img src="img/john337.jpg">
	</div>
</div>

</body>
</html>
