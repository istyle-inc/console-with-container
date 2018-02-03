<?php
declare(strict_types=1);

namespace ConsoleApp\ContainerFactory;

use Aura\Di\ContainerBuilder;
use ConsoleApp\User;
use Psr\Container\ContainerInterface;
use ConsoleApp\Commands\SampleExecuteCommand;
use ConsoleApp\Commands\SampleExecuteCommandFactory;

/**
 * Class AuraDiCreator
 */
final class AuraDiCreator implements ContainerCreatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(): ContainerInterface
    {
        $builder = new ContainerBuilder();
        $container = $builder->newInstance();
        $container->set(
            SampleExecuteCommandFactory::class,
            $container->lazyNew(SampleExecuteCommandFactory::class)
        );
        $container->params[User::class]['name'] = 'aura/di';
        $container->params[User::class]['url'] = 'https://github.com/auraphp/Aura.Di';
        $container->set(User::class, $container->lazyNew(User::class));
        $container->set(
            SampleExecuteCommand::class,
            $container->lazyGetCall(
                SampleExecuteCommandFactory::class,
                '__invoke',
                $container
            )
        );

        return $container;
    }
}
