<?php

namespace Container83x3oIp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHttpClient_TransportService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'http_client.transport' shared service.
     *
     * @return \Symfony\Contracts\HttpClient\HttpClientInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-client-contracts/HttpClientInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-client/HttpClient.php';

        $container->privates['http_client.transport'] = $instance = \Symfony\Component\HttpClient\HttpClient::create([], 6);

        $instance->setLogger(($container->privates['logger'] ?? self::getLoggerService($container)));

        return $instance;
    }
}
