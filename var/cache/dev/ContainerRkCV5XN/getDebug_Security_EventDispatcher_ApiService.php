<?php

namespace ContainerRkCV5XN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDebug_Security_EventDispatcher_ApiService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'debug.security.event_dispatcher.api' shared service.
     *
     * @return \Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['debug.security.event_dispatcher.api'] = $instance = new \Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\EventDispatcher(), ($container->privates['debug.stopwatch'] ??= new \Symfony\Component\Stopwatch\Stopwatch(true)), ($container->privates['logger'] ?? self::getLoggerService($container)), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()));

        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [#[\Closure(name: 'security.listener.user_checker.api', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserCheckerListener')] fn () => ($container->privates['security.listener.user_checker.api'] ?? $container->load('getSecurity_Listener_UserChecker_ApiService')), 'preCheckCredentials'], 256);
        $instance->addListener('security.authentication.success', [#[\Closure(name: 'security.listener.user_checker.api', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserCheckerListener')] fn () => ($container->privates['security.listener.user_checker.api'] ?? $container->load('getSecurity_Listener_UserChecker_ApiService')), 'postCheckCredentials'], 256);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [#[\Closure(name: 'security.listener.user_provider', class: 'Symfony\\Component\\Security\\Http\\EventListener\\UserProviderListener')] fn () => ($container->privates['security.listener.user_provider'] ?? $container->load('getSecurity_Listener_UserProviderService')), 'checkPassport'], 1024);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LogoutEvent', [#[\Closure(name: 'Gesdinet\\JWTRefreshTokenBundle\\EventListener\\LogoutEventListener')] fn () => ($container->privates['Gesdinet\\JWTRefreshTokenBundle\\EventListener\\LogoutEventListener'] ?? $container->load('getLogoutEventListenerService')), 'onLogout'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [#[\Closure(name: 'security.listener.check_authenticator_credentials', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CheckCredentialsListener')] fn () => ($container->privates['security.listener.check_authenticator_credentials'] ?? $container->load('getSecurity_Listener_CheckAuthenticatorCredentialsService')), 'checkPassport'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LoginSuccessEvent', [#[\Closure(name: 'security.listener.password_migrating', class: 'Symfony\\Component\\Security\\Http\\EventListener\\PasswordMigratingListener')] fn () => ($container->privates['security.listener.password_migrating'] ?? $container->load('getSecurity_Listener_PasswordMigratingService')), 'onLoginSuccess'], 0);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\CheckPassportEvent', [#[\Closure(name: 'security.listener.csrf_protection', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CsrfProtectionListener')] fn () => ($container->privates['security.listener.csrf_protection'] ?? $container->load('getSecurity_Listener_CsrfProtectionService')), 'checkPassport'], 512);
        $instance->addListener('Symfony\\Component\\Security\\Http\\Event\\LogoutEvent', [#[\Closure(name: 'security.logout.listener.csrf_token_clearing', class: 'Symfony\\Component\\Security\\Http\\EventListener\\CsrfTokenClearingLogoutListener')] fn () => ($container->privates['security.logout.listener.csrf_token_clearing'] ?? $container->load('getSecurity_Logout_Listener_CsrfTokenClearingService')), 'onLogout'], 0);

        return $instance;
    }
}
