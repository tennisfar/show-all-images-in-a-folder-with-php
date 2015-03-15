Show all images in a folder with PHP
------------------------------------

##### A simple PHP tool to list all images in a folder.

[Live demo](http://pe.ngu.in/show-all-images-in-a-folder-with-php/)

When I work on homepage or mobile layouts, or anything like that, i prefer to first sketch things up on a piece of paper, or in Photoshop. Then after I have a couple of ideas, I take photos of my paper-sketches, make png files of my PSD ideas, and show it all to the client. After receiving feedback I make any changes required, and show everything to the client again. Sometimes it turns out to be a lot of images.

The way I use to show it to the client is by giving them a link to a place where i keep this one PHP file, and a ‘img’ folder where i keep all the images in. The PHP file automatically shows all the images in this folder, and I don’t have to manually update anything, just upload to the folder.

Images will display up to a max width of 900 pixels. Images larger than 900 pixels will show their full size if you click and hold on it.

You can link to a specific image as they're link anchored. Just click on the specific image and copy the browser URL.

You'll need PHP on your server in order for this to work.

#### Setup
##### The easy way
This works out of the box, so you can either Git clone the repository, or download the zip.

##### The <del>hard</del> <i>other</i> way
Add [`ins-imgs.php`](https://github.com/mikelothar/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.php) and [`ins-imgs.css`](https://github.com/mikelothar/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.css) in your root folder (or wherever your index file is).

In your index HTML, insert this:

```html
<!-- insert images here -->
<script src="ins-imgs.php"></script>
```

#### Settings
In [`ins-imgs.php`](https://github.com/mikelothar/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.php#L5-L17) you can find the following settings:

```php
    # Path to image folder
    $imageFolder = 'img/';

    # Show only these file types from the image folder
    $imageTypes = '{*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.gif,*.GIF}';

    # Set to true if you prefer sorting images by name
    # If set to false, images will be sorted by date
    $sortByImageName = false;

    # Set to false if you want the oldest images to appear first
    # This is only used if images are sorted by date (see above)
    $newestImagesFirst = true;
```

Make the changes needed for your setup.

#### Help, bugs, pull requests, etc.
Very welcomed.
