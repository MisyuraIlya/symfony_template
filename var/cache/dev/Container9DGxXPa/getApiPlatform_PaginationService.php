<?php

namespace Container9DGxXPa;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_PaginationService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.pagination' shared service.
     *
     * @return \ApiPlatform\State\Pagination\Pagination
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Pagination/Pagination.php';

        return $container->privates['api_platform.pagination'] = new \ApiPlatform\State\Pagination\Pagination($container->parameters['api_platform.collection.pagination'], $container->parameters['api_platform.graphql.collection.pagination']);
    }
}
