<?php
require __DIR__ . '/../vendor/autoload.php';
use YuzuruS\Image\Resize;

// resize width 100px
$image = new Resize('example-org.jpg');
$image->name('output/example-width-test');
$image->width(100);
$image->save();

// resize 20%
$image = new Resize('example-org.jpg');
$image->name('output/example-20percent-test');
$image->resize(25);
$image->save();

// cut (0,30,32,32)
$image = new Resize('example-org.jpg');
$image->name('output/example-cut-test');
$image->width(320);
$image->height(320);
$image->crop(0,300);
$image->save();