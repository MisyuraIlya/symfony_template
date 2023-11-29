<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVichUploader_Form_Type_FileService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'vich_uploader.form.type.file' shared service.
     *
     * @return \Vich\UploaderBundle\Form\Type\VichFileType
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->services['vich_uploader.form.type.file'] = new \Vich\UploaderBundle\Form\Type\VichFileType(($container->privates['vich_uploader.storage.file_system'] ?? self::getVichUploader_Storage_FileSystemService($container)), ($container->services['vich_uploader.upload_handler'] ?? $container->load('getVichUploader_UploadHandlerService')), ($container->privates['vich_uploader.property_mapping_factory'] ?? self::getVichUploader_PropertyMappingFactoryService($container)), ($container->privates['property_accessor'] ?? self::getPropertyAccessorService($container)));
    }
}
