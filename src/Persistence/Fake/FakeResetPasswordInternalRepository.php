<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\Persistence\Fake;

use maestrojosiah\Bundle\ResetPassword\Exception\FakeRepositoryException;
use maestrojosiah\Bundle\ResetPassword\Model\ResetPasswordRequestInterface;
use maestrojosiah\Bundle\ResetPassword\Persistence\ResetPasswordRequestRepositoryInterface;

/**
 * Class is only used as a placeholder for the bundle configuration on new installs.
 *
 * The value of reset_request_repository should be changed to your
 * request password repository service in reset_password.yaml.
 *
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 *
 * @internal
 */
final class FakeResetPasswordInternalRepository implements ResetPasswordRequestRepositoryInterface
{
    public function createResetPasswordRequest(object $user, \DateTimeInterface $expiresAt, string $selector, string $hashedToken): ResetPasswordRequestInterface
    {
        throw new FakeRepositoryException();
    }

    public function getUserIdentifier(object $user): string
    {
        throw new FakeRepositoryException();
    }

    public function persistResetPasswordRequest(ResetPasswordRequestInterface $resetPasswordRequest): void
    {
        throw new FakeRepositoryException();
    }

    public function findResetPasswordRequest(string $selector): ?ResetPasswordRequestInterface
    {
        throw new FakeRepositoryException();
    }

    public function getMostRecentNonExpiredRequestDate(object $user): ?\DateTimeInterface
    {
        throw new FakeRepositoryException();
    }

    public function removeResetPasswordRequest(ResetPasswordRequestInterface $resetPasswordRequest): void
    {
        throw new FakeRepositoryException();
    }

    public function removeExpiredResetPasswordRequests(): int
    {
        throw new FakeRepositoryException();
    }
}
