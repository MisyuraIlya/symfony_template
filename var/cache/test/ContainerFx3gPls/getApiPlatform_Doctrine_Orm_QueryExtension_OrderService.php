<?php

namespace ContainerFx3gPls;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Doctrine_Orm_QueryExtension_OrderService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'api_platform.doctrine.orm.query_extension.order' shared service.
     *
     * @return \ApiPlatform\Doctrine\Orm\Extension\OrderExtension
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Orm/Extension/QueryCollectionExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Orm/Extension/OrderExtension.php';

        return $container->privates['api_platform.doctrine.orm.query_extension.order'] = new \ApiPlatform\Doctrine\Orm\Extension\OrderExtension('ASC');
    }
}
