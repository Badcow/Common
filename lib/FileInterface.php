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

interface FileInterface
{
    /**
     * @return string
     */
    public function read();

    /**
     * Write to the file
     *
     * @param string $string
     * @param string $mode
     */
    public function write($string, $mode = Mode::OVERWRITE);

    /**
     * The full path of the file. This should be an absolute path.
     *
     * @return string
     */
    public function getPath();

    /**
     * The size of the file in bytes
     *
     * @return int
     */
    public function getSize();

    /**
     * Get the name of the file without the pull path
     *
     * @return string
     */
    public function getName();

    /**
     * Delete the file
     */
    public function delete();
}