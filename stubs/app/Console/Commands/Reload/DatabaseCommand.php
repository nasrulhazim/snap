<?php

namespace App\Console\Commands\Reload;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reload:db
                                {--m|demo : Seed demo data}
                                {--d|dev : Seed development data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reload Database';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (app()->environment() == 'production') {
            $this->comment('Nothing need to be done here. Bye.');

            return 0;
        }
        $this->call('migrate:fresh', ['--quiet' => true]);
        $this->call('seed:prepare', ['--quiet' => true]);
        
        if ($this->option('demo')) {
            $this->call('seed:demo');
        }

        if ($this->option('dev')) {
            $this->call('seed:dev');
        }

        $this->info('Successfully reload database.');
    }
}
