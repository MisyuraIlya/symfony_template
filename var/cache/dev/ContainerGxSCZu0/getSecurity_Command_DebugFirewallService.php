<?php

namespace ContainerGxSCZu0;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Command_DebugFirewallService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.command.debug_firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Command\DebugFirewallCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Command/DebugFirewallCommand.php';

        $container->privates['security.command.debug_firewall'] = $instance = new \Symfony\Bundle\SecurityBundle\Command\DebugFirewallCommand($container->parameters['security.firewalls'], ($container->privates['.service_locator.JYo.9Ts'] ?? self::get_ServiceLocator_JYo_9TsService($container)), ($container->privates['.service_locator.im8QGPA'] ?? $container->load('get_ServiceLocator_Im8QGPAService')), ['api' => [($container->privates['security.authenticator.jwt.api'] ?? $container->load('getSecurity_Authenticator_Jwt_ApiService')), ($container->privates['security.authenticator.json_login.api'] ?? $container->load('getSecurity_Authenticator_JsonLogin_ApiService')), ($container->privates['security.authenticator.refresh_jwt.api'] ?? $container->load('getSecurity_Authenticator_RefreshJwt_ApiService'))], 'main' => []], false);

        $instance->setName('debug:firewall');
        $instance->setDescription('Display information about your security firewall(s)');

        return $instance;
    }
}
