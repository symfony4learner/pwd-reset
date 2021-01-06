<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\Exception;

/**
 * @author Ryan Weaver <ryan@maestrojosiah.com>
 */
final class InvalidResetPasswordTokenException extends \Exception implements ResetPasswordExceptionInterface
{
    public function getReason(): string
    {
        return 'The reset password link is invalid. Please try to reset your password again.';
    }
}
