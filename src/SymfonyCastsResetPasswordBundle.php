<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use maestrojosiah\Bundle\ResetPassword\DependencyInjection\maestrojosiahResetPasswordExtension;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 */
class maestrojosiahResetPasswordBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new maestrojosiahResetPasswordExtension();
        }

        return $this->extension ?: null;
    }
}
