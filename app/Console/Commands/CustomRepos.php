<?php

namespace App\Console\Commands;

use App\Helpers\CustomRepoPHPFileGenerator;
use Illuminate\Console\Command;

class CustomRepos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:mycustomrepos {modelname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Repository PHP classes and interfaces';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $modelname = $this->argument('modelname');

        CustomRepoPHPFileGenerator::genarateInterfacePHPFile($modelname);

        CustomRepoPHPFileGenerator::genarateEloquentPHPFile($modelname);


    }
}
