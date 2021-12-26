<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view file';

    /**
     * The type of view being generated.
     *
     * @var string
     */
    protected $type;

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param string $stub
     *
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
                        ? $customPath
                        : __DIR__.$stub;
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        $name = trim($name);
        $name = str_replace($this->rootNamespace(), '', $name);
        $name = str_replace('\\', '/', $name);

        $directory = Str::of($this->getNameInput())->kebab();
        if ($this->option('feature')) {
            $feature = Str::of($this->getFeatureInput())->kebab();
            $directory = $directory . '/' . $feature;
        }

        return resource_path('views/'.$directory.'/'.Str::kebab($name).'.blade.php');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/view-'.$this->type.'.stub');
    }

    private function getFeatureInput()
    {
        return $this->option('feature');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('all')) {
            $this->input->setOption('index', true);
            $this->input->setOption('create', true);
            $this->input->setOption('edit', true);
            $this->input->setOption('show', true);
        }

        if ($this->option('index')) {
            $this->createViewFor('index');
        }

        if ($this->option('create')) {
            $this->createViewFor('create');
        }

        if ($this->option('edit')) {
            $this->createViewFor('edit');
        }

        if ($this->option('show')) {
            $this->createViewFor('show');
        }
    }

    protected function createViewFor($name)
    {
        $this->type = $name;

        $path = $this->getPath($name);

        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        $this->info('View for '.$this->getNameInput().' - '.$name.' created successfully.');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a all standard views - index, create, edit, show'],
            ['force', null, InputOption::VALUE_NONE, 'Create the file even if the file already exists'],
            ['index', null, InputOption::VALUE_NONE, 'Create the index view file'],
            ['create', null, InputOption::VALUE_NONE, 'Create the create view file'],
            ['edit', null, InputOption::VALUE_NONE, 'Create the edit view file'],
            ['show', null, InputOption::VALUE_NONE, 'Create the show view file'],
            ['feature', null, InputOption::VALUE_REQUIRED, 'Create view for domain feature'],
        ];
    }
}
