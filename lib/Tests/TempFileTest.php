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

use Badcow\Common\TempFile;

class TempFileTest extends \PHPUnit_Framework_TestCase
{
    const PREFIX = 'badcow_common_test_';

    private $twoCities = <<<TEXT
It was the best of times,
it was the worst of times,
it was the age of wisdom,
it was the age of foolishness...
TEXT;

    public function testConstructor()
    {
        $tmpFile = new TempFile(static::PREFIX);
        $this->assertTrue(file_exists($tmpFile->getPath()));
    }

    public function testWrite()
    {
        $tmpFile = new TempFile(static::PREFIX);
        $tmpFile->write($this->twoCities);
        $this->assertEquals($this->twoCities, file_get_contents($tmpFile->getPath()));
    }

    public function testRead()
    {
        $tmpFile = new TempFile(static::PREFIX);
        file_put_contents($tmpFile->getPath(), $this->twoCities);
        $this->assertEquals($this->twoCities, $tmpFile->read());
    }

    public function testDelete()
    {
        $tmpFile = new TempFile(static::PREFIX);
        $this->assertTrue(file_exists($tmpFile->getPath()));
        $tmpFile->delete();
        $this->assertFalse(file_exists($tmpFile->getPath()));
    }

    public function testDestruct()
    {
        $tmpFile = new TempFile(static::PREFIX);
        $tmpFile->write($this->twoCities);
        $path = $tmpFile->getPath();
        $tmpFile->__destruct();
        $this->assertFalse(file_exists($path));
    }

    public function testDoNotDestroy()
    {
        $tmpFile = new TempFile(static::PREFIX);
        $tmpFile->write($this->twoCities);
        $path = $tmpFile->getPath();
        $tmpFile->doNotDestroy();
        $tmpFile->__destruct();
        $this->assertTrue(file_exists($path));
    }
}
 