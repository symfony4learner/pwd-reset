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
final class TooManyPasswordRequestsException extends \Exception implements ResetPasswordExceptionInterface
{
    private $availableAt;

    public function __construct(\DateTimeInterface $availableAt, string $message = '', int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->availableAt = $availableAt;
    }

    public function getAvailableAt(): \DateTimeInterface
    {
        return $this->availableAt;
    }

    public function getRetryAfter(): int
    {
        return $this->getAvailableAt()->getTimestamp() - (new \DateTime('now'))->getTimestamp();
    }

    public function getReason(): string
    {
        return 'You have already requested a reset password email. Please check your email or try again soon.';
    }
}
