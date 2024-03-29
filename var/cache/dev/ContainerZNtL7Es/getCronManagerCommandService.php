<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCronManagerCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Command\CronManagerCommand' shared autowired service.
     *
     * @return \App\Command\CronManagerCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/src/Command/CronManagerCommand.php';

        $container->privates['App\\Command\\CronManagerCommand'] = $instance = new \App\Command\CronManagerCommand(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['App\\Repository\\CategoryRepository'] ?? $container->load('getCategoryRepositoryService')), ($container->privates['App\\Repository\\ProductRepository'] ?? $container->load('getProductRepositoryService')), ($container->privates['App\\Repository\\PriceListRepository'] ?? $container->load('getPriceListRepositoryService')), ($container->privates['App\\Repository\\PriceListDetailedRepository'] ?? $container->load('getPriceListDetailedRepositoryService')), ($container->privates['App\\Repository\\MigvanRepository'] ?? $container->load('getMigvanRepositoryService')), ($container->privates['App\\Repository\\AttributeMainRepository'] ?? $container->load('getAttributeMainRepositoryService')), ($container->privates['App\\Repository\\SubAttributeRepository'] ?? $container->load('getSubAttributeRepositoryService')), ($container->privates['App\\Repository\\ErrorRepository'] ?? $container->load('getErrorRepositoryService')), ($container->privates['App\\Repository\\ProductAttributeRepository'] ?? $container->load('getProductAttributeRepositoryService')), ($container->privates['App\\Repository\\PriceListUserRepository'] ?? $container->load('getPriceListUserRepositoryService')));

        $instance->setName('CronManager');
        $instance->setDescription('Add a short description for your command');

        return $instance;
    }
}
