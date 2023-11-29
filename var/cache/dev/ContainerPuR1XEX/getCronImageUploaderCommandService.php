<?php

namespace ContainerPuR1XEX;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCronImageUploaderCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Command\CronImageUploaderCommand' shared autowired service.
     *
     * @return \App\Command\CronImageUploaderCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/src/Command/CronImageUploaderCommand.php';

        $container->privates['App\\Command\\CronImageUploaderCommand'] = $instance = new \App\Command\CronImageUploaderCommand(($container->privates['App\\Repository\\ProductRepository'] ?? $container->load('getProductRepositoryService')), ($container->privates['App\\Repository\\ProductImagesRepository'] ?? $container->load('getProductImagesRepositoryService')), ($container->privates['App\\Repository\\MediaObjectRepository'] ?? $container->load('getMediaObjectRepositoryService')));

        $instance->setName('CronImageUploader');
        $instance->setDescription('Add a short description for your command');

        return $instance;
    }
}
