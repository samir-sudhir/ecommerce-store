<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakePipeline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pipe {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new pipeline class';

    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the class name from the command argument
        $name = $this->argument('name');

        // Define the target path for the new pipeline
        $path = app_path("Pipelines/{$name}.php");

        // Check if the file already exists
        if ($this->files->exists($path)) {
            $this->error("Pipeline {$name} already exists!");
            return Command::FAILURE;
        }

        // Create the directory if it doesn't exist
        $this->makeDirectory(dirname($path));

        // Generate the pipeline class content
        $stub = $this->getStub();
        $content = str_replace('{{ class }}', $name, $stub);

        // Write the file to the target path
        $this->files->put($path, $content);

        // Notify the user
        $this->info("Pipeline {$name} created successfully!");

        return Command::SUCCESS;
    }

    /**
     * Create the directory for the pipeline if it doesn't exist.
     *
     * @param string $path
     * @return void
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0755, true);
        }
    }

    /**
     * Get the pipeline stub file content.
     *
     * @return string
     */
    protected function getStub()
    {
        return <<<EOT
<?php

namespace App\Pipelines;

use Closure;

class {{ class }}
{
    /**
     * Handle the pipeline task.
     *
     * @param \$request
     * @param Closure \$next
     * @return mixed
     */
    public function handle(\$request, Closure \$next)
    {
        // Perform the pipeline's action here

        return \$next(\$request);
    }
}

EOT;
    }
}
