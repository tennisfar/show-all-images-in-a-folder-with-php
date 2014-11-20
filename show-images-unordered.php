<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<title>Show images in folder</title>
<link rel="stylesheet" type="text/css" href="show-images-unordered.css">
</head>
<body>
 
<div class="container">
	<div class="row">

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


foreach ($sortedArray as $filename) {
	echo '<img src="'.$filename.'" title="' . substr($filename,strlen($folder),strpos($filename, '.')-strlen($folder)) . '" />';
}
?>

	</div>
</div>

</body>
</html>
