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

class HelperTest extends \PHPUnit_Framework_TestCase
{
    public function testRandom()
    {
        $str = Helper::random(256);
        $this->assertEquals(256, strlen($str));

        $str = Helper::random(512, str_split('~!@#$%^&*()_+'));
        $this->assertEquals(0, preg_match_all('/[a-zA-Z0-9]/', $str));
    }
}
 