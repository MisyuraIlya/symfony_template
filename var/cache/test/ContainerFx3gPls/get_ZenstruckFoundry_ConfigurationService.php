<?php

namespace ContainerFx3gPls;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_ConfigurationService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public '.zenstruck_foundry.configuration' shared service.
     *
     * @return \Zenstruck\Foundry\Configuration
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Configuration.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/ChainManagerRegistry.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/StoryManager.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/ModelFactoryManager.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Instantiator.php';
        include_once \dirname(__DIR__, 4).'/vendor/fakerphp/faker/src/Faker/Generator.php';
        include_once \dirname(__DIR__, 4).'/vendor/fakerphp/faker/src/Faker/Factory.php';

        $container->services['.zenstruck_foundry.configuration'] = $instance = new \Zenstruck\Foundry\Configuration([], [], 'schema', []);

        $instance->setManagerRegistry(new \Zenstruck\Foundry\ChainManagerRegistry([($container->services['doctrine'] ?? self::getDoctrineService($container))]));
        $instance->setStoryManager(new \Zenstruck\Foundry\StoryManager(new RewindableGenerator(fn () => new \EmptyIterator(), 0)));
        $instance->setModelFactoryManager(new \Zenstruck\Foundry\ModelFactoryManager(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['App\\Factory\\AgentFactory'] ??= new \App\Factory\AgentFactory());
            yield 1 => ($container->privates['App\\Factory\\AttributeMainFactory'] ??= new \App\Factory\AttributeMainFactory());
            yield 2 => ($container->privates['App\\Factory\\AttributeSubFactory'] ??= new \App\Factory\AttributeSubFactory());
            yield 3 => ($container->privates['App\\Factory\\CategoryFactory'] ??= new \App\Factory\CategoryFactory());
            yield 4 => ($container->privates['App\\Factory\\HistoryDetailedFactory'] ??= new \App\Factory\HistoryDetailedFactory());
            yield 5 => ($container->privates['App\\Factory\\HistoryFactory'] ??= new \App\Factory\HistoryFactory());
            yield 6 => ($container->privates['App\\Factory\\MigvanFactory'] ??= new \App\Factory\MigvanFactory());
            yield 7 => ($container->privates['App\\Factory\\PriceListDetailedFactory'] ??= new \App\Factory\PriceListDetailedFactory());
            yield 8 => ($container->privates['App\\Factory\\PriceListFactory'] ??= new \App\Factory\PriceListFactory());
            yield 9 => ($container->privates['App\\Factory\\ProductFactory'] ??= new \App\Factory\ProductFactory());
            yield 10 => ($container->privates['App\\Factory\\ProductImagesFactory'] ??= new \App\Factory\ProductImagesFactory());
            yield 11 => ($container->privates['App\\Factory\\ProductInfoFactory'] ??= new \App\Factory\ProductInfoFactory());
            yield 12 => ($container->privates['App\\Factory\\UserFactory'] ??= new \App\Factory\UserFactory());
            yield 13 => ($container->privates['App\\Factory\\UserInfoFactory'] ??= new \App\Factory\UserInfoFactory());
        }, 14)));
        $instance->setInstantiator(new \Zenstruck\Foundry\Instantiator());
        $instance->setFaker(\Faker\Factory::create());
        $instance->enableDefaultProxyAutoRefresh();

        return $instance;
    }
}
