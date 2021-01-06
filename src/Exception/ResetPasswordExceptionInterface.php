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
interface ResetPasswordExceptionInterface extends \Throwable
{
    public function getReason(): string;
}
