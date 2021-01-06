<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use maestrojosiah\Bundle\ResetPassword\Util\ResetPasswordCleaner;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 */
class ResetPasswordRemoveExpiredCommand extends Command
{
    protected static $defaultName = 'reset-password:remove-expired';

    private $cleaner;

    public function __construct(ResetPasswordCleaner $cleaner)
    {
        $this->cleaner = $cleaner;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setDescription('Remove expired reset password requests from persistence.');
    }

    /**
     * {@inheritdoc}
     *
     * @psalm-suppress InvalidReturnType
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Removing expired reset password requests...');

        $intRemoved = $this->cleaner->handleGarbageCollection(true);

        $output->writeln(\sprintf('Garbage collection successful. Removed %s reset password request object(s).', $intRemoved));

        return 0;
    }
}
