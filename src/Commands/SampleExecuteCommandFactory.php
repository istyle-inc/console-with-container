<?php
declare(strict_types=1);

namespace ConsoleApp\Commands;

use ConsoleApp\User;
use Psr\Container\ContainerInterface;

/**
 * Class SampleExecuteCommandFactory
 *
 * for zend servicemanager factory
 */
class SampleExecuteCommandFactory
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container): SampleExecuteCommand
    {
        return new SampleExecuteCommand($container->get(User::class));
    }
}
