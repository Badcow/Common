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

class File
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var bool
     */
    private $isDeleted = false;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $path = realpath($path);
        if (!file_exists($path)) {
            touch($path);
        }

        $this->path = $path;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return filesize($this->path);
    }

    /**
     * @param string $string
     * @param string $mode
     */
    public function write($string, $mode = 'w')
    {
        $handle = fopen($this->path, $mode);
        fwrite($handle, $string);
        fclose($handle);
    }

    /**
     * @return string
     */
    public function read()
    {
        return file_get_contents($this->path);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return basename($this->path);
    }

    /**
     * Delete the file
     */
    public function delete()
    {
        if ($this->isDeleted) {
            return true;
        }

        if (!unlink($this->path)) {
            return false;
        }

        unset($this->path);
        return $this->isDeleted = true;
    }
}