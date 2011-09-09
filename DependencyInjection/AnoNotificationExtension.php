<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\DependencyInjection;

use Ano\Bundle\SystemBundle\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

/**
 * Initializes extension
 *
 * @author Benjamin Dulau <benjamin.dulau@anonymation.com>
 */
class AnoNotificationExtension extends Extension
{
    /**
     * Loads configuration
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        foreach (array('model', 'notifier', 'repository') as $basename) {
            $loader->load(sprintf('%s.xml', $basename));
        }
    }
}