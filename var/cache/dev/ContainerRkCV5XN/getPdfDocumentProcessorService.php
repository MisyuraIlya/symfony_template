<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getPdfDocumentProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\PdfDocumentProcessor' shared autowired service.
     *
     * @return \App\State\PdfDocumentProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/src/State/PdfDocumentProcessor.php';

        return $container->privates['App\\State\\PdfDocumentProcessor'] = new \App\State\PdfDocumentProcessor(($container->privates['App\\Repository\\ErrorRepository'] ?? $container->load('getErrorRepositoryService')));
    }
}
