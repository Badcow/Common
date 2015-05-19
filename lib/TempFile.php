<?php
/*
 * This file is part of badcow-common.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Badcow\Common;

class TempFile extends File
{
    private $doNotDestroy = false;

    /**
     * @param string $prefix
     */
    public function __construct($prefix = '')
    {
        $this->path = tempnam(sys_get_temp_dir(), $prefix);
    }

    /**
     * Do not destroy the file on exit.
     * 
     * @param bool $val
     */
    public function doNotDestroy($val = true)
    {
        $this->doNotDestroy = (bool) $val;
    }

    /**
     * The destructor
     */
    public function __destruct()
    {
        if ($this->doNotDestroy) {
            return;
        }
        
        $this->delete();
    }
}