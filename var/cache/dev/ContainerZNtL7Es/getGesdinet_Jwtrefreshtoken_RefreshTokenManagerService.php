<?php

namespace ContainerZNtL7Es;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'gesdinet.jwtrefreshtoken.refresh_token_manager' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Doctrine\RefreshTokenManager
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/Model/RefreshTokenManagerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/gesdinet/jwt-refresh-token-bundle/Doctrine/RefreshTokenManager.php';

        $a = ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container));

        if (isset($container->services['gesdinet.jwtrefreshtoken.refresh_token_manager'])) {
            return $container->services['gesdinet.jwtrefreshtoken.refresh_token_manager'];
        }

        return $container->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] = new \Gesdinet\JWTRefreshTokenBundle\Doctrine\RefreshTokenManager($a, 'App\\Entity\\RefreshToken');
    }
}
