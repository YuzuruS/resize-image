exp1) resize width 100px 
$imgObj = new Image('exp.jpg'); 
$imgObj->width(100); 
$imgObj->save();

exp2) resize 20%
$imgObj = new Image('exp.jpg'); 
$imgObj->resize(25); 
$imgObj->save();

exp3) cut (0,30,32,32)
$imgObj = new Image('exp.jpg'); 
$imgObj->name('exp2'); 
$imgObj->width(32); 
$imgObj->height(32); 
$imgObj->crop(0,30); 
$imgObj->save();

exp4) rename
$imgObj = new Image('exp.jpg'); 
$imgObj->name('exp2');
$imgObj->width(200); 
$imgObj->save();

sample)
$ php example.php example.jpg
