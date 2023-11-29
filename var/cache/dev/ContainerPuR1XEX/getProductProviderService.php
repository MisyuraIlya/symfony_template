<?php

namespace ContainerPuR1XEX;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\ProductProvider' shared autowired service.
     *
     * @return \App\State\ProductProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/State/ProductProvider.php';

        $a = ($container->privates['api_platform.doctrine.orm.state.collection_provider'] ?? $container->load('getApiPlatform_Doctrine_Orm_State_CollectionProviderService'));

        if (isset($container->privates['App\\State\\ProductProvider'])) {
            return $container->privates['App\\State\\ProductProvider'];
        }

        return $container->privates['App\\State\\ProductProvider'] = new \App\State\ProductProvider(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), $a, ($container->privates['api_platform.doctrine.orm.state.item_provider'] ?? $container->load('getApiPlatform_Doctrine_Orm_State_ItemProviderService')), ($container->privates['App\\Repository\\ProductRepository'] ?? $container->load('getProductRepositoryService')), ($container->privates['App\\Repository\\ErrorRepository'] ?? $container->load('getErrorRepositoryService')));
    }
}
