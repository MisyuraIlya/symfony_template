<?php

namespace Container83x3oIp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVichUploader_DownloadHandlerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'vich_uploader.download_handler' shared service.
     *
     * @return \Vich\UploaderBundle\Handler\DownloadHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Handler/AbstractHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/vich/uploader-bundle/src/Handler/DownloadHandler.php';

        return $container->services['vich_uploader.download_handler'] = new \Vich\UploaderBundle\Handler\DownloadHandler(($container->privates['vich_uploader.property_mapping_factory'] ?? self::getVichUploader_PropertyMappingFactoryService($container)), ($container->privates['vich_uploader.storage.file_system'] ?? self::getVichUploader_Storage_FileSystemService($container)));
    }
}
