<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ZenstruckFoundry_Maker_Factory_OdmDefaultPropertiesGuesserService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.zenstruck_foundry.maker.factory.odm_default_properties_guesser' shared service.
     *
     * @return \Zenstruck\Foundry\Bundle\Maker\Factory\ODMDefaultPropertiesGuesser
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Bundle/Maker/Factory/DefaultPropertiesGuesser.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Bundle/Maker/Factory/AbstractDefaultPropertyGuesser.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Bundle/Maker/Factory/AbstractDoctrineDefaultPropertiesGuesser.php';
        include_once \dirname(__DIR__, 4).'/vendor/zenstruck/foundry/src/Bundle/Maker/Factory/ODMDefaultPropertiesGuesser.php';

        $a = ($container->privates['.zenstruck_foundry.maker.factory.generator'] ?? $container->load('get_ZenstruckFoundry_Maker_Factory_GeneratorService'));

        if (isset($container->privates['.zenstruck_foundry.maker.factory.odm_default_properties_guesser'])) {
            return $container->privates['.zenstruck_foundry.maker.factory.odm_default_properties_guesser'];
        }

        return $container->privates['.zenstruck_foundry.maker.factory.odm_default_properties_guesser'] = new \Zenstruck\Foundry\Bundle\Maker\Factory\ODMDefaultPropertiesGuesser(($container->privates['.zenstruck_foundry.chain_manager_registry'] ?? $container->load('get_ZenstruckFoundry_ChainManagerRegistryService')), ($container->privates['.zenstruck_foundry.maker.factory.factory_class_map'] ?? $container->load('get_ZenstruckFoundry_Maker_Factory_FactoryClassMapService')), $a);
    }
}
