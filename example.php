<?php
require_once('Image.php');
$thumb = new Image($argv[1]); 
$thumb->resize(640); 
$thumb->save();

