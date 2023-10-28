<?php

namespace ContainerYCiQ0rq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGesdinet_JwtrefreshtokenService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'gesdinet.jwtrefreshtoken' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Service\RefreshToken
     *
     * @deprecated Since gesdinet/jwt-refresh-token-bundle 1.0: The "gesdinet.jwtrefreshtoken" service is deprecated.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('gesdinet/jwt-refresh-token-bundle', '1.0', 'The "gesdinet.jwtrefreshtoken" service is deprecated.');

        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationFailureHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/Security/Http/Authentication/AuthenticationFailureHandler.php';

        $a = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        return $container->services['gesdinet.jwtrefreshtoken'] = new \Gesdinet\JWTRefreshTokenBundle\Service\RefreshToken($container->load('getGesdinet_Jwtrefreshtoken_AuthenticatorService'), $container->load('getGesdinet_Jwtrefreshtoken_UserProviderService'), ($container->privates['lexik_jwt_authentication.handler.authentication_success'] ?? $container->load('getLexikJwtAuthentication_Handler_AuthenticationSuccessService')), new \Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationFailureHandler($a, NULL), ($container->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] ?? $container->load('getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService')), 2592000, 'api', false, $a);
    }
}