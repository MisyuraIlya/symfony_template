<?php

namespace ContainerFx3gPls;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHistoryFactoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Factory\HistoryFactory' shared autowired service.
     *
     * @return \App\Factory\HistoryFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Factory.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/ModelFactory.php';
        include_once \dirname(__DIR__, 4).'/src/Factory/HistoryFactory.php';

        return $container->privates['App\\Factory\\HistoryFactory'] = new \App\Factory\HistoryFactory();
    }
}
