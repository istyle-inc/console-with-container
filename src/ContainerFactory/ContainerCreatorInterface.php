<?php
declare(strict_types=1);

namespace ConsoleApp\ContainerFactory;

use Psr\Container\ContainerInterface;

/**
 * Interface ContainerCreatorInterface
 */
interface ContainerCreatorInterface
{
    /**
     * @return ContainerInterface
     */
    public function __invoke(): ContainerInterface;
}
