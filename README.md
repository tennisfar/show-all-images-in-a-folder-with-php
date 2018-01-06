Show all images in a folder with PHP
------------------------------------

A simple webpage to display all images in a folder. It requires PHP.

Images will display up to a max width of 900 pixels. Images larger than 900 pixels will show their full size if you click it.

You can link to a specific image as they're link anchored. Just click on the specific image and copy the browser URL.

[Demo](http://ngu.in/show-all-images-in-a-folder-with-php/)

### Setup
#### The easy way
This works out of the box, so you can either Git clone the repository, or [download the zip](https://github.com/lthr/show-all-images-in-a-folder-with-php/archive/master.zip).

#### The other way
Add [`ins-imgs.php`](https://github.com/lthr/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.php) and [`ins-imgs.css`](https://github.com/lthr/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.css) in your root folder (or wherever your index file is).

In your index HTML, insert this:

```html
<!-- insert images here -->
<script src="ins-imgs.php"></script>
```

### Settings
In [`ins-imgs.php`](https://github.com/lthr/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.php#L5-L17) you can find the following settings:

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

### Help, bugs, pull requests, etc.
Very welcomed.

### Customized implementations
[Easy Folio](https://github.com/mikelothar/easy-folio) ([Demo](http://www.lukasspieker.com/hebrides/)) by [Lukas Spieker](https://twitter.com/lukasspieker)
