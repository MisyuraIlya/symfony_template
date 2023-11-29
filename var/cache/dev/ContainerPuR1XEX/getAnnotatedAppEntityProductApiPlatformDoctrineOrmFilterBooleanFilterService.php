<?php

namespace ContainerPuR1XEX;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAnnotatedAppEntityProductApiPlatformDoctrineOrmFilterBooleanFilterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'annotated_app_entity_product_api_platform_doctrine_orm_filter_boolean_filter' shared autowired service.
     *
     * @return \ApiPlatform\Doctrine\Orm\Filter\BooleanFilter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Metadata/FilterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Api/FilterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Orm/Filter/FilterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Orm/PropertyHelperTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Common/PropertyHelperTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Orm/Filter/AbstractFilter.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Common/Filter/BooleanFilterTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Doctrine/Orm/Filter/BooleanFilter.php';

        return $container->privates['annotated_app_entity_product_api_platform_doctrine_orm_filter_boolean_filter'] = new \ApiPlatform\Doctrine\Orm\Filter\BooleanFilter(($container->services['doctrine'] ?? self::getDoctrineService($container)), ($container->privates['logger'] ?? self::getLoggerService($container)), ['isPublished' => NULL], ($container->privates['serializer.name_converter.metadata_aware'] ?? self::getSerializer_NameConverter_MetadataAwareService($container)));
    }
}
