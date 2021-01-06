<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\Exception;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 */
final class FakeRepositoryException extends \Exception implements ResetPasswordExceptionInterface
{
    public function getReason(): string
    {
        return 'Please update the request_password_repository configuration in config/packages/reset_password.yaml to point to your "request password repository` service.';
    }
}
