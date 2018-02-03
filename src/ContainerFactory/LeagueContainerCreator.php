<?php
declare(strict_types=1);

namespace ConsoleApp\ContainerFactory;

use ConsoleApp\Commands\SampleExecuteCommand;
use ConsoleApp\Commands\SampleExecuteCommandFactory;
use ConsoleApp\User;
use League\Container\Container as LeagueContainer;
use Psr\Container\ContainerInterface;

/**
 * Class LeagueContainerCreator
 */
final class LeagueContainerCreator implements ContainerCreatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(): ContainerInterface
    {
        $container = new LeagueContainer();
        $container->add(ContainerInterface::class, $container);
        $container->add(SampleExecuteCommandFactory::class, SampleExecuteCommandFactory::class);
        $container->add(User::class, function () {
            return new User(
                'league/container',
                'https://github.com/thephpleague/container'
            );
        });
        $container->add(SampleExecuteCommand::class, function () use ($container) {
            return $container->call(
                $container->get(SampleExecuteCommandFactory::class),
                [$container]
            );
        });

        return $container;
    }
}
