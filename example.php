<?php
require_once('Image.php');
$thumb = new Image($argv[1]); 
$thumb->resize(50); 
$thumb->save();

