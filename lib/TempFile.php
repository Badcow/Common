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

class TempFile
{
    private $tmpFile;
    private $tmpDir;
    private $isDeleted = false;
    private $doNotDestroy = false;

    public function __construct($prefix = '')
    {
        $this->tmpDir = sys_get_temp_dir();
        $this->tmpFile = tempnam($this->tmpDir, $prefix);
    }

    /**
     * @param $string
     * @param string $mode
     */
    public function write($string, $mode = 'w')
    {
        $handle = fopen($this->tmpFile, $mode);
        fwrite($handle, $string);
        fclose($handle);
    }

    /**
     * @return string
     */
    public function read()
    {
        return file_get_contents($this->tmpFile);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->tmpFile;
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
     * Delete the file
     */
    public function delete()
    {
        if ($this->isDeleted) {
            return;
        }

        unlink($this->tmpFile);
        $this->isDeleted = true;
    }

    public function __destruct()
    {
        if ($this->doNotDestroy) {
            return;
        }
        
        $this->delete();
    }
}