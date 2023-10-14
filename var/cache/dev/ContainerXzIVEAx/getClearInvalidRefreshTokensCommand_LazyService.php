<?php

namespace ContainerXzIVEAx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getClearInvalidRefreshTokensCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.Gesdinet\JWTRefreshTokenBundle\Command\ClearInvalidRefreshTokensCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('gesdinet:jwt:clear', [], 'Clear invalid refresh tokens.', false, #[\Closure(name: 'Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand')] fn (): \Gesdinet\JWTRefreshTokenBundle\Command\ClearInvalidRefreshTokensCommand => ($container->privates['Gesdinet\\JWTRefreshTokenBundle\\Command\\ClearInvalidRefreshTokensCommand'] ?? $container->load('getClearInvalidRefreshTokensCommandService')));
    }
}
