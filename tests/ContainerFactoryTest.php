<?php
declare(strict_types=1);

use Illuminate\Container\Container as IlluminateContainer;
use League\Container\Container as LeagueContainer;
use Aura\Di\Container as AuraContainer;
use ConsoleApp\ContainerFactory\Factory;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;

final class ContainerFactoryTest extends TestCase
{
    /** @var Factory */
    private $factory;

    protected function setUp()
    {
        $this->factory = new Factory();
    }

    public function testShouldReturnInstanceOfZendServiceManager(): void
    {
        $container = $this->factory->build('zend');
        $this->assertInstanceOf(ServiceManager::class, $container);
        $this->assertInstanceOf(
            \ConsoleApp\Commands\SampleExecuteCommand::class,
            $container->get(\ConsoleApp\Commands\SampleExecuteCommand::class)
        );

    }

    public function testShouldReturnInstanceOfAuraDi(): void
    {
        $container = $this->factory->build('aura');
        $this->assertInstanceOf(AuraContainer::class, $container);
        $this->assertInstanceOf(
            \ConsoleApp\Commands\SampleExecuteCommand::class,
            $container->get(\ConsoleApp\Commands\SampleExecuteCommand::class)
        );
    }

    public function testShouldReturnInstanceOfLeagueContainer(): void
    {
        $container = $this->factory->build('league');
        $this->assertInstanceOf(LeagueContainer::class, $container);
        $this->assertInstanceOf(
            \ConsoleApp\Commands\SampleExecuteCommand::class,
            $container->get(\ConsoleApp\Commands\SampleExecuteCommand::class)
        );
    }

    public function testShouldReturnInstanceOfIlluminateContainer(): void
    {
        $container = $this->factory->build('illuminate');
        $this->assertInstanceOf(IlluminateContainer::class, $container);
        $this->assertInstanceOf(
            \ConsoleApp\Commands\SampleExecuteCommand::class,
            $container->get(\ConsoleApp\Commands\SampleExecuteCommand::class)
        );
    }
}
