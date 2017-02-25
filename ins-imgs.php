<?php
/**
*
* Images management
*
*/

echo('<link rel="stylesheet" type="text/css" href="ins-imgs.css">');

# Path to image folder
$imageFolder = 'img/';

# Supported images file types
$imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

# Images array list generation
$images = glob($imageFolder . $imageTypes, GLOB_BRACE);

/**
 *
 * Sort images list
 *
 * @param    array $imagesList to sort
 * @param    bool  $sortByName to sort by date. Default false, images will be sorted by date
 * @param    bool  $newestsFirst if sorted by date, orderer by newests
 * @return    array $sortedImages
 *
 */
function sortImagesList(Array $imagesList, $sortByName = false, $newestsFirst = true){
    $sortedImages = array();
   if ($sortByName) {
        $sortedImages = natsort($imagesList);
    } else {
        # sort by 'last modified' time stamp
        $count = count($imagesList);
        for ($i = 0; $i < $count; $i++) {
            $sortedImages[date('YmdHis', filemtime($imagesList[$i])) . $i] = $imagesList[$i];
        }
        if ($newestsFirst) {
            krsort($sortedImages);
        } else {
            ksort($sortedImages);
        }
    }
    return $sortedImages;
}


# Generate the HTML output
echo('<ul class="ins-imgs">');
foreach (sortImagesList($images) as $image) {

    # Get the name of the image, stripped from image folder path and file type extension
    $name = 'Image name: ' . substr($image, strlen($imageFolder), strpos($image, '.') - strlen($imageFolder));

    # Get the 'last modified' time stamp, make it human readable
    $lastModified = '(last modified: ' . date('F d Y H:i:s', filemtime($image)) . ')';

    # Begin adding
    echo('<li class="ins-imgs-li">');
    echo('<div class="ins-imgs-img" onclick=this.classList.toggle("zoom");><a name="' . $image . '" href="#' . $image . '">');
    echo('<img src="' . $image . '" alt="' . $name . '" title="' . $name . '">');
    echo('</a></div>');
    echo('<div class="ins-imgs-label">' . $name . ' ' . $lastModified . '</div>');
    echo('</li>');
}
echo('</ul>');

?>
