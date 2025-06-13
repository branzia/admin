<?php
namespace Branzia\Admin\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'administrator:install';
    protected $description = 'Install the Branzia Administrator plugin';

    public function handle()
    {
        $this->info('Running migrations...');
        $this->call('migrate');

        $this->info('Publishing config...');
        $this->call('vendor:publish', ['--tag' => 'config']);

        $this->info('Branzia Catalog Administrator successfully.');
    }
}
