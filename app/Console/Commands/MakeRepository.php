<?php

// Add custom command to create repository and interface
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository and interface';

    public function handle()
    {
        $name = $this->argument('name');
        $repositoryPath = app_path("Repositories/{$name}Repository.php");
        $interfacePath = app_path("Repositories/{$name}RepositoryInterface.php");

        $filesystem = new Filesystem();

        // Create Repositories directory if not exists
        if (!$filesystem->isDirectory(app_path('Repositories'))) {
            $filesystem->makeDirectory(app_path('Repositories'), 0755, true);
        }

        // Create Interface
        if (!$filesystem->exists($interfacePath)) {
            $filesystem->put($interfacePath, "<?php\n\nnamespace App\Repositories;\n\ninterface {$name}RepositoryInterface\n{\n    // Define methods\n}\n");
        }

        // Create Repository
        if (!$filesystem->exists($repositoryPath)) {
            $filesystem->put($repositoryPath, "<?php\n\nnamespace App\Repositories;\n\nuse App\Repositories\\{$name}RepositoryInterface;\n\nclass {$name}Repository implements {$name}RepositoryInterface\n{\n    // Implement methods\n}\n");
        }

        $this->info("Repository {$name}Repository and Interface {$name}RepositoryInterface are created!");
    }
}
