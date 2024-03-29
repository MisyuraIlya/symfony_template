<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDocumentsProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\DocumentsProvider' shared autowired service.
     *
     * @return \App\State\DocumentsProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/State/DocumentsProvider.php';

        return $container->privates['App\\State\\DocumentsProvider'] = new \App\State\DocumentsProvider(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), ($container->privates['api_platform.pagination'] ?? $container->load('getApiPlatform_PaginationService')), ($container->privates['App\\Repository\\ErrorRepository'] ?? $container->load('getErrorRepositoryService')));
    }
}
