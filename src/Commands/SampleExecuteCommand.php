<?php
declare(strict_types=1);

namespace ConsoleApp\Commands;

use ConsoleApp\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SampleExecuteCommand
 */
class SampleExecuteCommand extends Command
{
    /** @var string  command name */
    protected $command = 'sample:process';

    /** @var string  command description */
    protected $description = 'try di containers!';

    /** @var User */
    protected $user;

    /**
     * SampleExecuteCommand constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct(null);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $rows = 10;
        $progressBar = new ProgressBar($output, $rows);
        $progressBar->setBarCharacter('<fg=magenta>=</>');
        $progressBar->setProgressCharacter("\xF0\x9F\x8D\xBA");
        for ($i = 0; $i < $rows; $i++) {
            usleep(300000);
            $progressBar->advance();
        }

        $progressBar->finish();
        $output->writeln(' <bg=yellow;options=bold>' . get_class($this->user) . '</>');
        $output->writeln(
            sprintf('name: %s / url: %s', $this->user->getName(), $this->user->getUrl())
        );
    }

    /**
     * command interface configure
     */
    protected function configure(): void
    {
        $this->setName($this->command);
        $this->setDescription($this->description);
    }
}
