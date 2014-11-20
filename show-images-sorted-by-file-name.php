<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<title>Show images in folder</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
<?php
$folder = 'img/';
$filetype = '*.*';
$files = glob($folder.$filetype);
$count = count($files);
echo '<table>';
for ($i = 0; $i < $count; $i++) {
    echo '<tr><td>';
    echo '<a name="'.$i.'" href="#'.$i.'"><img src="'.$files[$i].'" /></a>';
    echo substr($files[$i],strlen($folder),strpos($files[$i], '.')-strlen($folder));
    echo '</td></tr>';
}
echo '</table>';
?>
</body>
</html>
