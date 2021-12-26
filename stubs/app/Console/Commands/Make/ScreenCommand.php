<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ScreenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:screen {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new screens for given resource';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function getNameInput()
    {
        return Str::of($this->argument('name'))
            ->trim()
            ->studly();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('make:controller', [
            'name' => $this->getNameInput().'Controller',
            '--resource' => true,
        ]);
        $this->call('make:view', [
            'name' => $this->getNameInput(),
            '--all' => true,
        ]);
        $this->call('make:route', [
            'name' => $this->getNameInput(),
            '--resource' => '\App\Http\Controllers\\'.$this->getNameInput().'Controller',
        ]);
        $this->call('make:breadcrumb', [
            'name' => $this->getNameInput(),
            '--resource' => true,
        ]);
        $this->call('make:datatable', [
            'name' => $this->getNameInput().'Datatable',
        ]);
        $this->call('make:screen-test', [
            'name' => $this->getNameInput() . 'Screen',
        ]);

        return Command::SUCCESS;
    }
}
