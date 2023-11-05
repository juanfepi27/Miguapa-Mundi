<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // app()->call('App\Http\Controllers\Api\NewsApiController@generator');
    }
}
