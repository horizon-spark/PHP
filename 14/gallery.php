<?php 
    echo "<style>
            .gallery {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
            }
            img {
                width: 200px;
            }
        </style>";

    function get_images($filename) {
        $fullpath = "uploads/" . $filename;

        return $filename != '.' &&
        $filename != '..' &&
        (exif_imagetype($fullpath) === IMAGETYPE_JPEG ||
        exif_imagetype($fullpath) === IMAGETYPE_PNG || 
        exif_imagetype($fullpath) === IMAGETYPE_GIF);
    }

    $files = scandir("uploads");
    
    $images = array_filter($files, 'get_images');

    echo "<div class='gallery'>";
    foreach ($images as $imagename) {
        echo "<img src='uploads/$imagename'>";
    }
    echo "</div>";
?>