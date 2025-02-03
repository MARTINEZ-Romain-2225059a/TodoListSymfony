<?php

namespace ContainerOlLZDLI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_StateProvider_BackedEnumService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.state_provider.backed_enum' shared service.
     *
     * @return \ApiPlatform\State\Provider\BackedEnumProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/state/Provider/BackedEnumProvider.php';

        return $container->privates['api_platform.state_provider.backed_enum'] = new \ApiPlatform\State\Provider\BackedEnumProvider();
    }
}
