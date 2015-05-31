<?php
/*
 * This file is part of badcow-common.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Badcow\Common\Tests;

use Badcow\Common\File;
use Badcow\Common\Helper;

class FileTest extends TestCase
{
    private $twoCities = <<<TEXT
It was the best of times,
it was the worst of times,
it was the age of wisdom,
it was the age of foolishness...
TEXT;

    public function testConstructor()
    {
        $filename = $this->createTestFile();
        $this->assertFalse(file_exists($filename));
        $file = new File($filename);
        $this->assertTrue(file_exists($filename));
        $this->assertEquals($filename, $file->getPath());
        $file->delete();
    }

    public function testWrite()
    {
        $file = new File($this->createTestFile());
        $file->write($this->twoCities);
        $this->assertEquals($this->twoCities, file_get_contents($file->getPath()));
        $file->delete();
    }

    public function testRead()
    {
        $file = new File($this->createTestFile());
        file_put_contents($file->getPath(), $this->twoCities);
        $this->assertEquals($this->twoCities, $file->read());
        $file->delete();
    }

    public function testDelete()
    {
        $file = new File($this->createTestFile());
        $path = $file->getPath();
        $this->assertTrue(file_exists($path));
        $file->delete();
        $this->assertFalse(file_exists($path));
    }

    public function testGetName()
    {
        $filename = 'badcow_file_test.txt';
        $path = $this->tmp_dir . DIRECTORY_SEPARATOR . $filename;
        $file = new File($path);
        $this->assertEquals($filename, $file->getName());
        $file->delete();
    }

    public function testGetSize()
    {
        $size = 1024;
        $data = Helper::random($size);
        $file = new File($this->createTestFile());
        $file->write($data);
        $this->assertEquals($size, $file->getSize());
        $file->delete();
    }
}
 