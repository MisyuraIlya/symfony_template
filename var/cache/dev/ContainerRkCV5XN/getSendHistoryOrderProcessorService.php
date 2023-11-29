<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSendHistoryOrderProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\SendHistoryOrderProcessor' shared autowired service.
     *
     * @return \App\State\SendHistoryOrderProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/src/State/SendHistoryOrderProcessor.php';

        return $container->privates['App\\State\\SendHistoryOrderProcessor'] = new \App\State\SendHistoryOrderProcessor(($container->privates['App\\Repository\\HistoryRepository'] ?? $container->load('getHistoryRepositoryService')), ($container->privates['App\\Repository\\HistoryDetailedRepository'] ?? $container->load('getHistoryDetailedRepositoryService')), ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')));
    }
}
