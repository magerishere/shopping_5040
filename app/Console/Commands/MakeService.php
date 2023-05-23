<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate New Service';
    /**
     * @var Filesystem
     */
    protected Filesystem $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $serviceFile = $this->argument('service');

        if ($serviceFile === '' || is_null($serviceFile) || empty($serviceFile)) {
            return $this->error('Service Name Invalid..!');
        }

        $contents =
            '<?php
namespace App\Services;


class ' . $serviceFile . '
{

    /**
    * Create a new ' . $serviceFile . ' service.
    *
    * @return void
    */
    public function __construct()
    {
        //
    }


}';
        if ($this->confirm('Do you wish to create ' . $serviceFile . ' Service file?')) {
            $file = "${serviceFile}.php";
            $path = app_path();

            $file = $path . "/Services/$file";
            $serviceDir = $path . "/Services";

            if ($this->filesystem->isDirectory($serviceDir)) {
                if ($this->filesystem->isFile($file))
                    return $this->error($serviceFile . ' File Already exists!');

                if (!$this->filesystem->put($file, $contents))
                    return $this->error('Something went wrong!');
                $this->info("$serviceFile generated!");
            } else {
                $this->filesystem->makeDirectory($serviceDir, 0777, true, true);

                if (!$this->filesystem->put($file, $contents))
                    return $this->error('Something went wrong!');
                $this->info("$serviceFile generated!");
            }

        }
    }
}
