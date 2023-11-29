<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCategoriesStateProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\State\CategoriesStateProvider' shared autowired service.
     *
     * @return \App\State\CategoriesStateProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/State/CategoriesStateProvider.php';

        $a = ($container->privates['api_platform.doctrine.orm.state.collection_provider'] ?? $container->load('getApiPlatform_Doctrine_Orm_State_CollectionProviderService'));

        if (isset($container->privates['App\\State\\CategoriesStateProvider'])) {
            return $container->privates['App\\State\\CategoriesStateProvider'];
        }

        return $container->privates['App\\State\\CategoriesStateProvider'] = new \App\State\CategoriesStateProvider(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), $a, ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->privates['App\\Repository\\CategoryRepository'] ?? $container->load('getCategoryRepositoryService')), ($container->privates['App\\Repository\\ErrorRepository'] ?? $container->load('getErrorRepositoryService')));
    }
}
