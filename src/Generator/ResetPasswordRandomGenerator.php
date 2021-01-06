<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\Generator;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 *
 * @internal
 * @final
 */
class ResetPasswordRandomGenerator
{
    /**
     * Original credit to Laravel's Str::random() method.
     *
     * String length is 20 characters
     */
    public function getRandomAlphaNumStr(): string
    {
        $string = '';

        while (($len = \strlen($string)) < 20) {
            $size = 20 - $len;

            $bytes = \random_bytes($size);

            $string .= \substr(
                \str_replace(['/', '+', '='], '', \base64_encode($bytes)), 0, $size);
        }

        return $string;
    }
}
