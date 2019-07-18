<?php

namespace App\Console\Commands;
use Artisan;
use Illuminate\Console\Command;

class TestCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'myproject:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This custom Commend can Be refreh My Project ';

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
     * @return mixed
     */
    public function handle()
    {
       Artisan::call('view:clear');
    }
}
