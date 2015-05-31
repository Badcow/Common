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

class Helper
{
    /**
     * Generates the default characters
     *
     * @return array
     */
    private static function defaultCharacters()
    {
        return array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
    }

    /**
     * @param int $len
     * @param array $chars Use custom characters. Defaults to upper and lower case alphanumeric characters.
     * @return string
     */
    public static function random($len = 32, array $chars = null)
    {
        $chars = $chars ?: self::defaultCharacters();
        $output = '';

        for ($i = 0; $i < $len; $i++) {
            $output .= $chars[array_rand($chars)];
        }

        return $output;
    }
}