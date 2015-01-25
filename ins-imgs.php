<?php
    # To prevent browser error output
    header('Content-Type: text/javascript; charset=UTF-8');

    # Path to image folder
    $imagefolder = 'img/';

    # Show only these file types in the image folder
    $imagetypes = '{*.jpg,*.JPG,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

    # Add images to array
    $images = glob($imagefolder.$imagetypes, GLOB_BRACE);

    # Sort the images based on its 'last modified' time stamp
    $sortedImages = array();
    $count = count($images);
    for ($i = 0; $i < $count; $i++) {
        $sortedImages[date ('YmdHis', filemtime($images[$i])).$i] = $images[$i];
    }

    # Set to 'false' if you want the oldest images to appear first
    $newest_images_first = true;

    # Sort images in array
    if($newest_images_first) {
        krsort($sortedImages);
    } else {
        ksort($sortedImages);
    }

    # Generate the HTML output
    writeHtml('<ul class="ins-imgs">');
    foreach ($sortedImages as $image) {

        # Get the name of the image, stripped from image folder path and file type extension
        $name = 'Image name: '.substr($image,strlen($imagefolder),strpos($image, '.')-strlen($imagefolder));

        # Get the 'last modified' time stamp, make it human readable
        $last_modified = '(last modified: '.date('F d Y H:i:s', filemtime($image)).')';

        # Begin adding
        writeHtml('<li class="ins-imgs-li">');
        writeHtml('<div class="ins-imgs-img"><a name="'.$image.'" href="#'.$image.'">');
        writeHtml('<img src="'.$image.'" alt="'. $name.'" title="'. $name.'">');
        writeHtml('</a></div>');
        writeHtml('<div class="ins-imgs-label">'.$name.' '.$last_modified.'</div>');
        writeHtml('</li>');
    }
    writeHtml('</ul>');

    writeHtml('<link rel="stylesheet" type="text/css" href="ins-imgs.css">');

    # Convert HTML to JS
    function writeHtml($html) {
        echo "document.write('".$html."');\n";
    }
?>