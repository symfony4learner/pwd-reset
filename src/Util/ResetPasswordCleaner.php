<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\Util;

use maestrojosiah\Bundle\ResetPassword\Persistence\ResetPasswordRequestRepositoryInterface;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 *
 * @internal
 * @final
 */
class ResetPasswordCleaner
{
    /**
     * @var bool Enable/disable garbage collection
     */
    private $enabled;

    private $repository;

    public function __construct(ResetPasswordRequestRepositoryInterface $repository, bool $enabled = true)
    {
        $this->repository = $repository;
        $this->enabled = $enabled;
    }

    /**
     * Clears expired reset password requests from persistence.
     *
     * Enable/disable in configuration. Calling with $force = true
     * will attempt to remove expired requests regardless of
     * configuration setting.
     */
    public function handleGarbageCollection(bool $force = false): int
    {
        if ($this->enabled || $force) {
            return $this->repository->removeExpiredResetPasswordRequests();
        }

        return 0;
    }
}
