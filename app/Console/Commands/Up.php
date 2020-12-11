<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Task\Infrastructure\Seeds\TaskSeeder;

/**
 * Class Up
 * @package App\Console\Commands
 */
class Up extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'up';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'up project';

    /**
     * @var string[]
     */
    private $seeders = [
        TaskSeeder::class
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate');
        $this->seeds();
        $this->call('clear-compiled');
        $this->call('config:cache');
        $this->call('cache:clear');
        $this->call('route:cache');
    }

    /**
     *
     */
    private function seeds()
    {
        $this->info('Start seeds');
        foreach ($this->seeders as $seeder) {
            $this->call('db:seed', ['--class' => $seeder]);
        }
        $this->info('End seeds');
    }
}
