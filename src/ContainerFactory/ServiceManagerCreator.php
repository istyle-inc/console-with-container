<?php
declare(strict_types=1);

namespace ConsoleApp\ContainerFactory;

use ConsoleApp\User;
use Psr\Container\ContainerInterface;
use Zend\ServiceManager\ServiceManager;
use ConsoleApp\Commands\SampleExecuteCommand;
use ConsoleApp\Commands\SampleExecuteCommandFactory;

/**
 * Class ServiceManagerCreator
 */
final class ServiceManagerCreator implements ContainerCreatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(): ContainerInterface
    {
        return new ServiceManager([
            'factories' => [
                SampleExecuteCommand::class => SampleExecuteCommandFactory::class,
                User::class => function (ContainerInterface $container) {
                    return new User(
                        'zendframework/zend-servicemanager',
                        'https://github.com/zendframework/zend-servicemanager'
                    );
                },
            ],
        ]);
    }
}
