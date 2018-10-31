<?php
header("content-type: image/jpg");

// Get Path URL
$pathUrl = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
// Get Image File
$file = file_get_contents($pathUrl);

if ($file) {
    // Image Size
    [$width, $height] = getimagesize($pathUrl);
    // New Image Size
    $newWidth = isset($_GET['w']) ? $_GET['w'] : $width;
    $newHeight = isset($_GET['h']) ? $_GET['h'] : $height;
    // New Image Width or Height if Width or Height is null
    if ($newWidth) {
        $scale = $newWidth / $width;
        $newHeight = $height * $scale;
    } else if ($newHeight) {
        $scale = $newHeight / $height;
        $newWidth = $width * $scale;
    }
    // Load Image
    $imagick = new \Imagick(realpath($pathUrl));
    // Resize Image
    $imagick -> resizeImage($newWidth, $newHeight, Imagick::FILTER_POINT, 1);
    // Return Image
    echo $imagick->getImageBlob();
}