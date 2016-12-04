The PHP library can easily resize images.
=============================
[![Coverage Status](https://coveralls.io/repos/github/YuzuruS/resize-image/badge.svg?branch=master)](https://coveralls.io/github/YuzuruS/resize-image?branch=master)
[![Build Status](https://travis-ci.org/YuzuruS/resize-image.png?branch=master)](https://travis-ci.org/YuzuruS/resize-image)
[![Stable Version](https://poser.pugx.org/yuzuru-s/resize-image/v/stable)](https://packagist.org/packages/yuzuru-s/resize-image)
[![Download Count](https://poser.pugx.org/yuzuru-s/resize-image/downloads.png)](https://packagist.org/packages/yuzuru-s/resize-image)
[![License](https://poser.pugx.org/yuzuru-s/resize-image/license)](https://packagist.org/packages/yuzuru-s/resize-image)

The PHP library can easily resize images and allows you to adjust the height and width of the image and clip it.

Examples
-----------------------------
![example-org](https://cloud.githubusercontent.com/assets/1485195/20863745/c67e3700-ba18-11e6-958c-520e763aae43.jpg)

![example-20percent-test](https://cloud.githubusercontent.com/assets/1485195/20863749/d3341a6e-ba18-11e6-960d-d78cce54a082.jpg)



Requirements
-----------------------------
- PHP
  - >=5.5 >=5.6, >=7.0
- Composer



Installation
----------------------------

* Using composer

```
{
    "require": {
       "yuzuru-s/resize-image": "1.0.*"
    }
}
```

```
$ php composer.phar update yuzuru-s/resize-image --dev
```

How to use
----------------------------
Please check [sample code](https://github.com/YuzuruS/resize-image/blob/master/sample/usecase.php)



How to run unit test
----------------------------

Run with default setting.
```
% vendor/bin/phpunit -c phpunit.xml.dist
```

Currently tested with PHP 7.0.0


History
----------------------------




License
----------------------------
Copyright (c) 2016 YUZURU SUZUKI. See MIT-LICENSE for further details.

Copyright
-----------------------------
- Yuzuru Suzuki
  - http://yuzurus.hatenablog.jp/
