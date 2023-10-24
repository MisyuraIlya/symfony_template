<?php

namespace ContainerBqe14XW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Listener_View_WriteService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.listener.view.write' shared service.
     *
     * @return \ApiPlatform\Symfony\EventListener\WriteListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/EventListener/WriteListener.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/CallableProcessor.php';

        return $container->privates['api_platform.listener.view.write'] = new \ApiPlatform\Symfony\EventListener\WriteListener(new \ApiPlatform\State\CallableProcessor(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'ApiPlatform\\Doctrine\\Common\\State\\PersistProcessor' => ['privates', 'api_platform.doctrine.orm.state.persist_processor', 'getApiPlatform_Doctrine_Orm_State_PersistProcessorService', true],
            'ApiPlatform\\Doctrine\\Common\\State\\RemoveProcessor' => ['privates', 'api_platform.doctrine.orm.state.remove_processor', 'getApiPlatform_Doctrine_Orm_State_RemoveProcessorService', true],
            'App\\State\\PdfDocumentProcessor' => ['privates', 'App\\State\\PdfDocumentProcessor', 'getPdfDocumentProcessorService', true],
            'App\\State\\SendOrderProcessor' => ['privates', 'App\\State\\SendOrderProcessor', 'getSendOrderProcessorService', true],
            'App\\State\\XlDocumentProcessor' => ['privates', 'App\\State\\XlDocumentProcessor', 'getXlDocumentProcessorService', true],
            'api_platform.doctrine.orm.state.persist_processor' => ['privates', 'api_platform.doctrine.orm.state.persist_processor', 'getApiPlatform_Doctrine_Orm_State_PersistProcessorService', true],
            'api_platform.doctrine.orm.state.remove_processor' => ['privates', 'api_platform.doctrine.orm.state.remove_processor', 'getApiPlatform_Doctrine_Orm_State_RemoveProcessorService', true],
        ], [
            'ApiPlatform\\Doctrine\\Common\\State\\PersistProcessor' => 'ApiPlatform\\Doctrine\\Common\\State\\PersistProcessor',
            'ApiPlatform\\Doctrine\\Common\\State\\RemoveProcessor' => 'ApiPlatform\\Doctrine\\Common\\State\\RemoveProcessor',
            'App\\State\\PdfDocumentProcessor' => 'App\\State\\PdfDocumentProcessor',
            'App\\State\\SendOrderProcessor' => 'App\\State\\SendOrderProcessor',
            'App\\State\\XlDocumentProcessor' => 'App\\State\\XlDocumentProcessor',
            'api_platform.doctrine.orm.state.persist_processor' => 'ApiPlatform\\Doctrine\\Common\\State\\PersistProcessor',
            'api_platform.doctrine.orm.state.remove_processor' => 'ApiPlatform\\Doctrine\\Common\\State\\RemoveProcessor',
        ])), ($container->privates['api_platform.symfony.iri_converter'] ?? self::getApiPlatform_Symfony_IriConverterService($container)), ($container->privates['api_platform.resource_class_resolver'] ?? self::getApiPlatform_ResourceClassResolverService($container)), ($container->privates['api_platform.metadata.resource.metadata_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_MetadataCollectionFactory_CachedService($container)), ($container->privates['api_platform.uri_variables.converter'] ?? self::getApiPlatform_UriVariables_ConverterService($container)));
    }
}
