<?php

namespace Container9DGxXPa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getXlDocumentProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\XlDocumentProcessor' shared autowired service.
     *
     * @return \App\State\XlDocumentProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/src/State/XlDocumentProcessor.php';

        return $container->privates['App\\State\\XlDocumentProcessor'] = new \App\State\XlDocumentProcessor();
    }
}
