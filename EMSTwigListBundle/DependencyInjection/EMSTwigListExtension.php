<?php

namespace EMS\ClientHelperBundle\EMSTwigListBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class EMSTwigListExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('ems_twig_list.templates', $config['templates']);
        $container->setParameter('ems_twig_list.app_enabled', $config['app_enabled']);
        $container->setParameter('ems_twig_list.app_base_path', $config['app_base_path']);
    }
}
