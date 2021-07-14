<?php

$base = dirname(__DIR__);

function mediaPath($filename) {
    global $base;
    return $base . '/private/media/' . $filename . '.jpeg';
}

$media_list = [
    'resized-image-Promo_1',
    'resized-image-Promo_2',
    'resized-image-Promo',
    'resized-image-Promo-aa',
    'resized-image-Promo',
];
$image_name = $media_list[2];

if (isset($_GET['entrypoint'])) {
    if ($_GET['entrypoint'] == 'media') {
        include $base . "/private/class_media.php";
        $image = new media();

        if (
            isset($_GET['name']) &&
            is_string($_GET['name']) &&
            array_key_exists($_GET['name'], array_flip($media_list))
        ) {
            $image_name = $_GET['name'];
        }
       
        $image->show(mediaPath($image_name));
    }
    elseif ($_GET['entrypoint'] == 'main') {
        include $base. "/private/views/gallery_head.php";
        echo "<h1>Test page</h1>";
        echo '<img src="http://localhost:8877/media/'.$image_name.'" width="200" >';
        include $base. "/private/views/gallery.php";
        include $base. "/private/views/gallery_footer.php";
    }
}

?>

