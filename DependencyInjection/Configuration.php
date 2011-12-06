<?php

/**
 * This file is part of the AnoNotificationBundle
 *
 * (c) anonymation <contact@anonymation.com>
 *
 */

namespace Ano\Bundle\NotificationBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration processer.
 * Parses/validates the extension configuration and sets default values.
 *
 * @author Benjamin Dulau <benjamin.dulau@anonymation.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ano_notification');

        $this->addClassSection($rootNode);

        return $treeBuilder;
    }

    /**
     * Parses the ano_notification.class config section
     * Example for yaml driver:
     * ano_notification:
     *     class:
     *         model:
     *
     * @param ArrayNodeDefinition $node
     * @return void
     */
    private function addClassSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('class')
                    ->isRequired()
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('model')
                            ->isRequired()
                            ->children()
                                ->scalarNode('notification')->isRequired()->cannotBeEmpty()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}