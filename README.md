exp1) resize width 100px<br> 
$imgObj = new Image('exp.jpg');<br> 
$imgObj->width(100);<br>
$imgObj->save();<br><br>

exp2) resize 20%<br>
$imgObj = new Image('exp.jpg'); <br>
$imgObj->resize(25);<br>
$imgObj->save();<br><br>

exp3) cut (0,30,32,32)<br>
$imgObj = new Image('exp.jpg');<br> 
$imgObj->name('exp2');<br> 
$imgObj->width(32);<br> 
$imgObj->height(32);<br> 
$imgObj->crop(0,30);<br> 
$imgObj->save();<br><br>

exp4) rename<br>
$imgObj = new Image('exp.jpg'); <br>
$imgObj->name('exp2');<br>
$imgObj->width(200); <br>
$imgObj->save();<br><br>

sample)<br>
$ php example.php example.jpg
