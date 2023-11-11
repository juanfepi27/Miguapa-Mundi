<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NewsController;

class newsGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:news-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected $newsController;
    /**
     * Execute the console command.
     */
    public function __construct(NewsController $newsController)
    {
        parent::__construct();
        $this->newsController = $newsController;
    }

    public function handle()
    {
        $this->newsController->create();
    }
}
