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

use Badcow\Common\File\Mode;

class File implements FileInterface
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
     * @param $path
     * @throws \ErrorException
     */
    public function __construct($path)
    {
        $this->path = $path;

        if (file_exists($this->path)) {
            return;
        }

        if (!touch($this->path)) {
            throw new \ErrorException(sprintf('Cannot create file with path "%s"', $this->path));
        }
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
    public function write($string, $mode = Mode::OVERWRITE)
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
            return;
        }

        if (!unlink($this->path)) {
            throw new \ErrorException(sprintf('File with path "%s" could not be deleted.', $this->path));
        }

        unset($this->path);
        $this->isDeleted = true;
    }
}