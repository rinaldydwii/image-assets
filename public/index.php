<?php
header("content-type: image/jpg");

// IMAGE MUST SQUARE

$newWidth = isset($_GET['w']) ? $_GET['w'] : '';
$newHeight = isset($_GET['h']) ? $_GET['h'] : '';

$pathUrl = explode('?', $_SERVER['REQUEST_URI'])[0];
$file = file_get_contents('..'.$pathUrl);
echo $file;


[$width, $height] = getimagesize('../users/avatars/avatar.jpg');

// dprintr($size);