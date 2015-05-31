<?php
/*
 * This file is part of badcow-common.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Badcow\Common\File;

/**
 * @link http://php.net/manual/en/function.fopen.php
 */
class Mode
{
    /**
     * Open for reading only; place the file pointer at the beginning of the file.
     */
    const READ = 'r';

    /**
     * Open for reading and writing; place the file pointer at the beginning of the file.
     */
    const READ_WRITE = 'r+';

    /**
     * Open for writing only; place the file pointer at the beginning of the file and truncate the file to zero length.
     * If the file does not exist, attempt to create it.
     */
    const OVERWRITE = 'w';

    /**
     * Open for reading and writing; place the file pointer at the beginning of the file and truncate the file to zero
     * length. If the file does not exist, attempt to create it.
     */
    const READ_OVERWRITE = 'w+';

    /**
     * Open for writing only; place the file pointer at the end of the file. If the file does not exist, attempt to
     * create it.
     */
    const APPEND = 'a';

    /**
     * Open for reading and writing; place the file pointer at the end of the file. If the file does not exist, attempt
     * to create it.
     */
    const READ_APPEND = 'a+';

    /**
     * Create and open for writing only; place the file pointer at the beginning of the file. If the file already
     * exists, the fopen() call will fail by returning FALSE and generating an error of level E_WARNING. If the file
     * does not exist, attempt to create it. This is equivalent to specifying O_EXCL|O_CREAT flags for the underlying
     * open(2) system call.
     */
    const WRITE_NEW = 'x';

    /**
     * Create and open for reading and writing; otherwise it has the same behavior as 'x'.
     */
    const READ_WRITE_NEW = 'x+';

    /**
     * Open the file for writing only. If the file does not exist, it is created. If it exists, it is neither truncated
     * (as opposed to 'w'), nor the call to this function fails (as is the case with 'x'). The file pointer is
     * positioned on the beginning of the file. This may be useful if it's desired to get an advisory lock (see flock())
     * before attempting to modify the file, as using 'w' could truncate the file before the lock was obtained (if
     * truncation is desired, ftruncate() can be used after the lock is requested).
     */
    const WRITE_C = 'c';

    /**
     * Open the file for reading and writing; otherwise it has the same behavior as 'c'.
     */
    const READ_WRITE_C = 'c+';
}