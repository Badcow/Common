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

use Badcow\Common\Helper;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $tmp_dir;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->tmp_dir = realpath(__DIR__ . '/../../tmp');
    }

    protected function createTestFile($exists = false, $suffix = '')
    {
        $filename = $this->tmp_dir . DIRECTORY_SEPARATOR . Helper::random() . $suffix;

        if (!file_exists($filename) && $exists) {
            touch($filename);
        }

        if (file_exists($filename) && !$exists) {
            unlink($filename);
        }

        return $filename;
    }
} 