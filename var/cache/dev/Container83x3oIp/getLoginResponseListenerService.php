<?php

namespace Container83x3oIp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLoginResponseListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\EventListener\LoginResponseListener' shared autowired service.
     *
     * @return \App\EventListener\LoginResponseListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/EventListener/LoginResponseListener.php';

        return $container->privates['App\\EventListener\\LoginResponseListener'] = new \App\EventListener\LoginResponseListener(($container->privates['security.token_storage'] ?? self::getSecurity_TokenStorageService($container)));
    }
}
