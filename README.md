Show all images in a folder with PHP
------------------------------------

A simple webpage to display all images in a folder with PHP.

This project is an evolution of https://github.com/lthr/show-all-images-in-a-folder-with-php.

It requires PHP.


Images will display up to a max width of 900 pixels. Images larger than 900 pixels will show their full size if you click it.

You can link to a specific image as they're link anchored. Just click on the specific image and copy the browser URL.

You can use pagination and specify a number of images per pages.

[Demo](https://images-in-a-folder-with-php.herokuapp.com/) (might take up to 30 seconds to activate)

### Setup
#### The easy way
This works out of the box, so you can either [download the zip](https://github.com/dvdn/show-all-images-in-a-folder-with-php/archive/master.zip) or Git clone the repository.

#### The other way
Add [`ins-imgs.php`](https://github.com/dvdn/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.php) and [`ins-imgs.css`](https://github.com/dvdn/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.css) in your root folder (or wherever your index file is).

In your index HTML, insert this:

```html
    <!-- images insertion -->
    <?php include "ins-imgs.php"; ?>
```

### Settings
In [`ins-imgs.php`](https://github.com/dvdn/show-all-images-in-a-folder-with-php/blob/master/ins-imgs.php#L15) you can find the following settings:

    *   folderPath : path to image folder,
    *   types : Supported images file types
    *   pagination : [usePagination : true/false, imagesPerPage : number of images per pages]

Make the changes needed for your setup.

### Help, bugs, pull requests, etc.
Very welcomed.

### Customized implementations
[Easy Folio](https://github.com/mikelothar/easy-folio)
