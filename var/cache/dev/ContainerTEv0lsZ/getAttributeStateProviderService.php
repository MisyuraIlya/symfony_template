<?php

namespace ContainerTEv0lsZ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAttributeStateProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\AttributeStateProvider' shared autowired service.
     *
     * @return \App\State\AttributeStateProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/State/AttributeStateProvider.php';

        $a = ($container->privates['api_platform.doctrine.orm.state.collection_provider'] ?? $container->load('getApiPlatform_Doctrine_Orm_State_CollectionProviderService'));

        if (isset($container->privates['App\\State\\AttributeStateProvider'])) {
            return $container->privates['App\\State\\AttributeStateProvider'];
        }

        return $container->privates['App\\State\\AttributeStateProvider'] = new \App\State\AttributeStateProvider(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), ($container->privates['App\\Repository\\AttributeMainRepository'] ?? $container->load('getAttributeMainRepositoryService')), $a, ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')));
    }
}