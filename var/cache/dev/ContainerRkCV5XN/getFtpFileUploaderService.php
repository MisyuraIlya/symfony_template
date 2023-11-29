<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFtpFileUploaderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\FtpFileUploader' shared autowired service.
     *
     * @return \App\Controller\FtpFileUploader
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/FtpFileUploader.php';

        $container->services['App\\Controller\\FtpFileUploader'] = $instance = new \App\Controller\FtpFileUploader();

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\FtpFileUploader', $container));

        return $instance;
    }
}
