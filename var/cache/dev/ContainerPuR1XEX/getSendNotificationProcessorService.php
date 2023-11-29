<?php

namespace ContainerPuR1XEX;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSendNotificationProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\SendNotificationProcessor' shared autowired service.
     *
     * @return \App\State\SendNotificationProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/src/State/SendNotificationProcessor.php';

        return $container->privates['App\\State\\SendNotificationProcessor'] = new \App\State\SendNotificationProcessor(($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['App\\Repository\\NotificationRepository'] ?? $container->load('getNotificationRepositoryService')));
    }
}
