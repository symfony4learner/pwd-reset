<?php

/*
 * This file is part of the maestrojosiah ResetPasswordBundle package.
 * Copyright (c) maestrojosiah <https://maestrojosiah.com/>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace maestrojosiah\Bundle\ResetPassword\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Jesse Rushlow <jr@rushlow.dev>
 * @author Ryan Weaver   <ryan@maestrojosiah.com>
 */
final class maestrojosiahResetPasswordExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(\dirname(__DIR__).'/Resources/config'));
        $loader->load('reset_password_services.xml');

        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        $helperDefinition = $container->getDefinition('maestrojosiah.reset_password.helper');
        $helperDefinition->replaceArgument(2, new Reference($config['request_password_repository']));
        $helperDefinition->replaceArgument(3, $config['lifetime']);
        $helperDefinition->replaceArgument(4, $config['throttle_limit']);

        $cleanerDefinition = $container->getDefinition('maestrojosiah.reset_password.cleaner');
        $cleanerDefinition->replaceArgument(0, new Reference($config['request_password_repository']));
        $cleanerDefinition->replaceArgument(1, $config['enable_garbage_collection']);
    }

    public function getAlias()
    {
        return 'maestrojosiah_reset_password';
    }
}
