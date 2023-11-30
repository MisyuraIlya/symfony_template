<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVichUploader_UploadHandlerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'vich_uploader.upload_handler' shared service.
     *
     * @return \Vich\UploaderBundle\Handler\UploadHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Handler/AbstractHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Handler/UploadHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Injector/FileInjectorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Injector/FileInjector.php';

        $a = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->services['vich_uploader.upload_handler'])) {
            return $container->services['vich_uploader.upload_handler'];
        }
        $b = ($container->privates['vich_uploader.storage.file_system'] ?? self::getVichUploader_Storage_FileSystemService($container));

        return $container->services['vich_uploader.upload_handler'] = new \Vich\UploaderBundle\Handler\UploadHandler(($container->privates['vich_uploader.property_mapping_factory'] ?? self::getVichUploader_PropertyMappingFactoryService($container)), $b, new \Vich\UploaderBundle\Injector\FileInjector($b), $a);
    }
}
