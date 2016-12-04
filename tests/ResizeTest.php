<?php
require __DIR__ . '/../vendor/autoload.php';
/**
 * ResizeTest
 *
 * @version $id$
 * @copyright Yuzuru Suzuki
 * @author Yuzuru Suzuki <navitima@gmail.com>
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
use YuzuruS\Image\Resize;
class ResizeTest extends \PHPUnit_Framework_TestCase
{

	public function testSize()
	{
		// resize width 100px
		$image = new Resize(__DIR__ . '/../sample/example-org.jpg');
		$image->dir(__DIR__ . '/../sample/output/');
		$image->name('example-width-height-test');
		$image->quality(80);
		$image->width(100);
		$image->height(100);
		$image->save();
		$this->assertTrue(file_exists(__DIR__ . '/../sample/output/example-width-height-test.jpg'));
	}

	public function testResize()
	{
		// resize 20%
		$image = new Resize(__DIR__ . '/../sample/example-org.jpg');
		$image->dir(__DIR__ . '/../sample/output/');
		$image->name('example-20percent-test');
		$image->resize(25);
		$image->save();
		$this->assertTrue(file_exists(__DIR__ . '/../sample/output/example-20percent-test.jpg'));
	}

	public function testCrop()
	{
		$image = new Resize(__DIR__ . '/../sample/example-org.jpg');
		$image->dir(__DIR__ . '/../sample/output/');
		$image->name('example-cut-test');
		$image->width(320);
		$image->height(320);
		$image->crop(0,300);
		$image->resize(80);
		$image->save();
		$this->assertTrue(file_exists(__DIR__ . '/../sample/output/example-cut-test.jpg'));
	}

	public function testPng()
	{
		// resize width 100px
		$image = new Resize(__DIR__ . '/../sample/example-org.png');
		$image->dir(__DIR__ . '/../sample/output/');
		$image->name('example-png');
		$image->width(100);
		$image->height(100);
		$image->save();
		$this->assertTrue(file_exists(__DIR__ . '/../sample/output/example-png.png'));
	}

	public function testGif()
	{
		// resize width 100px
		$image = new Resize(__DIR__ . '/../sample/example-org.gif');
		$image->dir(__DIR__ . '/../sample/output/');
		$image->name('example-gif');
		$image->width(100);
		$image->height(100);
		$image->show();
		$image->save();
		$this->assertTrue(file_exists(__DIR__ . '/../sample/output/example-gif.gif'));
	}

	public function tearDown()
	{
	}
}
