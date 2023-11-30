<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_Maker_Factory_FactoryClassMapService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.zenstruck_foundry.maker.factory.factory_class_map' shared service.
     *
     * @return \Zenstruck\Foundry\Bundle\Maker\Factory\FactoryClassMap
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Bundle/Maker/Factory/FactoryClassMap.php';

        return $container->privates['.zenstruck_foundry.maker.factory.factory_class_map'] = new \Zenstruck\Foundry\Bundle\Maker\Factory\FactoryClassMap(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['App\\Factory\\AttributeMainFactory'] ??= new \App\Factory\AttributeMainFactory());
            yield 1 => ($container->privates['App\\Factory\\CategoryFactory'] ??= new \App\Factory\CategoryFactory());
            yield 2 => ($container->privates['App\\Factory\\HistoryDetailedFactory'] ??= new \App\Factory\HistoryDetailedFactory());
            yield 3 => ($container->privates['App\\Factory\\HistoryFactory'] ??= new \App\Factory\HistoryFactory());
            yield 4 => ($container->privates['App\\Factory\\MigvanFactory'] ??= new \App\Factory\MigvanFactory());
            yield 5 => ($container->privates['App\\Factory\\PriceListDetailedFactory'] ??= new \App\Factory\PriceListDetailedFactory());
            yield 6 => ($container->privates['App\\Factory\\PriceListFactory'] ??= new \App\Factory\PriceListFactory());
            yield 7 => ($container->privates['App\\Factory\\ProductFactory'] ??= new \App\Factory\ProductFactory());
            yield 8 => ($container->privates['App\\Factory\\ProductImagesFactory'] ??= new \App\Factory\ProductImagesFactory());
            yield 9 => ($container->privates['App\\Factory\\ProductInfoFactory'] ??= new \App\Factory\ProductInfoFactory());
            yield 10 => ($container->privates['App\\Factory\\SubAttributeFactory'] ??= new \App\Factory\SubAttributeFactory());
            yield 11 => ($container->privates['App\\Factory\\UserFactory'] ??= new \App\Factory\UserFactory());
            yield 12 => ($container->privates['App\\Factory\\UserInfoFactory'] ??= new \App\Factory\UserInfoFactory());
        }, 13));
    }
}
