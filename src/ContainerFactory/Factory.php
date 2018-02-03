<?php
declare(strict_types=1);

namespace ConsoleApp\ContainerFactory;

use Psr\Container\ContainerInterface;

/**
 * Class Factory
 */
final class Factory
{
    /**
     * @param string $name
     *
     * @return ContainerInterface
     */
    public function build(string $name): ContainerInterface
    {
        $containerName = ucfirst(strtolower($name));
        $method = 'create' . $containerName . 'Container';
        $creator = $this->$method();
        return $creator();
    }

    /**
     * @return ContainerCreatorInterface
     */
    protected function createZendContainer(): ContainerCreatorInterface
    {
        return new ServiceManagerCreator();
    }

    /**
     * @return ContainerCreatorInterface
     */
    protected function createAuraContainer(): ContainerCreatorInterface
    {
        return new AuraDiCreator();
    }

    /**
     * @return ContainerCreatorInterface
     */
    protected function createLeagueContainer(): ContainerCreatorInterface
    {
        return new LeagueContainerCreator();
    }

    /**
     * @return  ContainerCreatorInterface
     */
    protected function createIlluminateContainer(): ContainerCreatorInterface
    {
        return new IlluminateContainerCreator();
    }
}
