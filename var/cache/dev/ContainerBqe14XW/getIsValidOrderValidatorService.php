<?php

namespace ContainerBqe14XW;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIsValidOrderValidatorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Validator\IsValidOrderValidator' shared autowired service.
     *
     * @return \App\Validator\IsValidOrderValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/validator/ConstraintValidatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/validator/ConstraintValidator.php';
        include_once \dirname(__DIR__, 4).'/src/Validator/IsValidOrderValidator.php';

        return $container->privates['App\\Validator\\IsValidOrderValidator'] = new \App\Validator\IsValidOrderValidator();
    }
}
