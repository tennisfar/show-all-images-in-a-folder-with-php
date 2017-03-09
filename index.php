<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show images in folder</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- images insertion -->
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once "Pagination.php";
    include "ins-imgs.php";
    ?>

</body>
</html>
