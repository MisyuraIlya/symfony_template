<?php

namespace Container80ngvzI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCronManagerCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\CronManagerCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.App\\Command\\CronManagerCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('CronManager', [], 'Add a short description for your command', false, #[\Closure(name: 'App\\Command\\CronManagerCommand')] fn (): \App\Command\CronManagerCommand => ($container->privates['App\\Command\\CronManagerCommand'] ?? $container->load('getCronManagerCommandService')));
    }
}
