<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRestoreCartStateProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\RestoreCartStateProvider' shared autowired service.
     *
     * @return \App\State\RestoreCartStateProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/State/RestoreCartStateProvider.php';

        return $container->privates['App\\State\\RestoreCartStateProvider'] = new \App\State\RestoreCartStateProvider(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->privates['App\\Repository\\HistoryRepository'] ?? $container->load('getHistoryRepositoryService')), ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['App\\Repository\\ProductRepository'] ?? $container->load('getProductRepositoryService')), ($container->privates['App\\Repository\\ErrorRepository'] ?? $container->load('getErrorRepositoryService')));
    }
}
