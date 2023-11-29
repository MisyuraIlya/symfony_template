<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMyScheduleCalendarControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\MyScheduleCalendarController' shared autowired service.
     *
     * @return \App\Controller\MyScheduleCalendarController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/MyScheduleCalendarController.php';

        $container->services['App\\Controller\\MyScheduleCalendarController'] = $instance = new \App\Controller\MyScheduleCalendarController(($container->privates['App\\Repository\\AgentObjectiveRepository'] ?? $container->load('getAgentObjectiveRepositoryService')));

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\MyScheduleCalendarController', $container));

        return $instance;
    }
}
