<?php

declare(strict_types=1);

namespace Augustash\CaptainHookie\Pantheon;

use CaptainHook\App\Config;
use CaptainHook\App\Console\IO;
use CaptainHook\App\Exception\ActionFailed;
use CaptainHook\App\Hook\Action;
use CaptainHook\App\Config\Action as ConfigAction;
use SebastianFeldmann\Git\Repository;

class PreventPush implements Action
{
    /**
     * Executes the action.
     *
     * @param \CaptainHook\App\Config $config
     * @param \CaptainHook\App\Console\IO $io
     * @param \SebastianFeldmann\Git\Repository $repository
     * @param \CaptainHook\App\Config\Action $action
     * @return void
     * @throws \Exception
     */
    public function execute(Config $config, IO $io, Repository $repository, ConfigAction $action): void
    {
        if ($this->isPantheonRepository($io)) {
            $this->errorOutput($io, 'The remote repository appears to be a Pantheon repository.');
            throw new ActionFailed('Pushing to Pantheon is not allowed!');
        }

        if ($this->isRemoteTarget($io, 'upstream')) {
            $this->errorOutput($io, 'The remote target might be a Pantheon repository.');
            throw new ActionFailed('Pushing to Pantheon is not allowed!');
        }
    }

    /**
     * Output error messages to STDOUT.
     *
     * @param \CaptainHook\App\Console\IO $io
     * @param string $message
     * @return void
     */
    private function errorOutput(IO $io, string $message): void
    {
        $io->write('');
        $io->write('<error>' . $message . '</error>');
        $io->write('');
    }

    /**
     * Check if the target repository URL is a Pantheon URL.
     *
     * @param \CaptainHook\App\Console\IO $io
     * @return bool
     */
    private function isPantheonRepository(IO $io): bool
    {
        $remoteUrl = $io->getArgument('url', '');
        return \str_contains($remoteUrl, '.drush.in:2222');
    }

    /**
     * Check if the target origin matches the passed option.
     *
     * @param \CaptainHook\App\Console\IO $io
     * @param string $target
     * @return bool
     */
    private function isRemoteTarget(IO $io, string $target = 'upstream'): bool
    {
        $remoteTarget = $io->getArgument('target', '');
        return \strtolower($remoteTarget) === \strtolower($target);
    }
}
