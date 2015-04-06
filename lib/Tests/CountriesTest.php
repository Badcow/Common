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

use Badcow\Common\Countries;

class CountriesTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValid()
    {
        $this->assertTrue(Countries::isValid('AU'));
        $this->assertFalse(Countries::isValid('XX'));
    }

    public function testGetCountryName()
    {
        $this->assertEquals('Qatar', Countries::getCountryName('QA'));
        $this->assertNull(Countries::getCountryName('XX'));
    }
}
 