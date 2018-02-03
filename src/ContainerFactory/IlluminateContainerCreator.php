<?php
declare(strict_types=1);

namespace ConsoleApp\ContainerFactory;

use ConsoleApp\Commands\SampleExecuteCommand;
use ConsoleApp\Commands\SampleExecuteCommandFactory;
use ConsoleApp\User;
use Illuminate\Container\Container as IlluminateContainer;
use Psr\Container\ContainerInterface;

/**
 * Class IlluminateContainerCreator
 */
final class IlluminateContainerCreator implements ContainerCreatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(): ContainerInterface
    {
        $container = new IlluminateContainer();
        $container->instance(ContainerInterface::class, $container);
        $container->bind(User::class, function () {
            return new User(
                'illuminate/container',
                'https://github.com/illuminate/container'
            );
        });
        $container->bind(SampleExecuteCommand::class, function (IlluminateContainer $container) {
            return $container->call([
                $container->make(SampleExecuteCommandFactory::class),
                '__invoke',
            ], [$container]);
        });
        return $container;
    }
}
