<?php

namespace EMS\ClientHelperBundle\EMSTwigListBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        /* @var $rootNode ArrayNodeDefinition */
        $rootNode = $treeBuilder->root('ems_twig_list');
        $rootNode
            ->children()
                ->arrayNode('templates')
                    ->defaultValue($this->getTemplatesDefaultValues())
                    ->prototype('array')
                        ->cannotBeEmpty()
                        ->children()
                            ->scalarNode('resource')->cannotBeEmpty()->end()
                            ->scalarNode('base_path')->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                ->end()
                ->booleanNode('app_enabled')->defaultFalse()->end()
                ->arrayNode('app_base_path')
                    ->prototype('scalar')
                ->end()
            ->end();

        return $treeBuilder;
    }
    
    /**
     * Returns default values for profile menu (to avoid BC Break)
     *
     * @return array
     */
    protected function getTemplatesDefaultValues()
    {
    	return [
            [
                'resource'  => 'EMSTwigListBundle',
                'base_path'  => 'Resources/views/Pages',
            ],
    	];
    }
}
